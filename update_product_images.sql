-- SVG इमेजेज को PNG इमेजेज में बदलने के लिए SQL क्वेरी

-- gallery फील्ड अपडेट करें
UPDATE products
SET gallery = REPLACE(gallery, '.svg', '.png')
WHERE gallery LIKE '%.svg';

-- gallery2 फील्ड अपडेट करें
UPDATE products
SET gallery2 = REPLACE(gallery2, '.svg', '.png')
WHERE gallery2 LIKE '%.svg';

-- gallery3 फील्ड अपडेट करें
UPDATE products
SET gallery3 = REPLACE(gallery3, '.svg', '.png')
WHERE gallery3 LIKE '%.svg';

-- परिवर्तन देखने के लिए क्वेरी
SELECT id, name, gallery, gallery2, gallery3 FROM products;