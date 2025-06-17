<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Session;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //

    function login(Request $req)
    {
        $rules = [
            "email" => "required|email",
            'password' => 'required'
        ];
        
        $validator = Validator::make($req->all(), $rules);
        
        if ($validator->fails()) {
            return view('login')->withErrors($validator);
        }

        $user = User::where('email', $req->email)->first();
        
        // Check if user exists
        if (!$user) {
            return view('login')->with('error', 'Email or password is not correct');
        }
        
        // For users with base64 encoded passwords (legacy)
        if (strlen($user->password) < 60 && base64_decode($user->password) === $req->password) {
            // Update to hashed password
            $user->password = Hash::make($req->password);
            $user->save();
            
            $req->session()->put('user', $user);
            return redirect('/');
        }
        // For users with hashed passwords
        else if (Hash::check($req->password, $user->password)) {
            $req->session()->put('user', $user);
            return redirect('/');
        }
        
        return view('login')->with('error', 'Email or password is not correct');
    }

    function register(Request $req)
    {
        $rules = [
            'name' => 'required|string|max:82|unique:users',
            'email' => 'required|email|unique:users',
            'confirm_password' => 'required',
            'password' => [
                'required_with:confirm_password',
                'same:confirm_password',
                'min:12',
                'max:32',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/'
            ]
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return view('register')->withErrors($validator);
        }

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->gender = $req->gender;
        $user->password = Hash::make($req->password);
        $user->save();

        return view('login', $user);
    }

    function showData($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('/')->with('error', 'User not found');
        }
        return view('profile', ['user' => $user]);
    }

    function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('listupdate');
    }

    function show()
    {
        $userid = Session::get('user')['id'];
        $data = User::where('id', $userid)->get();
        return view('listupdate', ['lists' => $data, 'total' => 0]);
    }

    function update(Request $req)
    {
        $rules = [
            'name' => 'required|string|max:82',
            'email' => 'required|email',
            'gender' => 'required|in:male,female,other',
            'password' => [
                'nullable',
                'min:12',
                'max:32',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/',
                'required_with:confirm_password',
                'same:confirm_password'
            ],
            'confirm_password' => 'nullable|min:12|required_with:password'
        ];

        $validator = Validator::make($req->all(), $rules);
        
        if ($validator->fails()) {
            return redirect('/profile/' . $req->id)
                ->withErrors($validator)
                ->withInput();
        }

        $data = User::find($req->id);
        
        // Check if user exists
        if (!$data) {
            return redirect('/')->with('error', 'User not found');
        }
        
        // Check if email is already taken by another user
        $existingUser = User::where('email', $req->email)
            ->where('id', '!=', $req->id)
            ->first();
            
        if ($existingUser) {
            return redirect('/profile/' . $req->id)
                ->withErrors(['email' => 'This email is already taken'])
                ->withInput();
        }
        
        $data->name = $req->name;
        $data->email = $req->email;
        $data->gender = $req->gender;
        
        if ($req->filled('password')) {
            $data->password = Hash::make($req->password);
        }
        
        $data->save();
        
        // Update session data if the user is updating their own profile
        if (Session::has('user') && Session::get('user')['id'] == $req->id) {
            Session::put('user', $data);
        }
        
        return redirect('/profile/' . $req->id)->with('success', 'Profile updated successfully!');
    }
}
