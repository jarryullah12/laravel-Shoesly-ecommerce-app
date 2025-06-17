-- Drop the products table if it exists
DROP TABLE IF EXISTS `products`;

-- Create the products table
CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `gallery` varchar(255) NOT NULL,
  `gallery2` varchar(255) DEFAULT NULL,
  `gallery3` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert test data
INSERT INTO `products` (`name`, `price`, `category`, `description`, `gallery`, `gallery2`, `gallery3`) VALUES
('Nike Air Max', '12000', 'shoes', 'Comfortable running shoes with air cushioning technology', 'nike-air-max-1.jpg', 'nike-air-max-2.jpg', 'nike-air-max-3.jpg'),
('Adidas Ultraboost', '15000', 'shoes', 'Premium running shoes with responsive boost cushioning', 'adidas-ultraboost-1.jpg', 'adidas-ultraboost-2.jpg', 'adidas-ultraboost-3.jpg'),
('Puma RS-X', '8000', 'shoes', 'Stylish casual sneakers with chunky design', 'puma-rsx-1.jpg', 'puma-rsx-2.jpg', 'puma-rsx-3.jpg'),
('Reebok Classic Leather', '6000', 'shoes', 'Iconic casual shoes with timeless design', 'reebok-classic-1.jpg', 'reebok-classic-2.jpg', 'reebok-classic-3.jpg'),
('New Balance 574', '9000', 'shoes', 'Comfortable lifestyle shoes with classic design', 'new-balance-574-1.jpg', 'new-balance-574-2.jpg', 'new-balance-574-3.jpg'),
('Asics Gel-Lyte III', '11000', 'shoes', 'Premium lifestyle shoes with gel cushioning', 'asics-gel-lyte-1.jpg', 'asics-gel-lyte-2.jpg', 'asics-gel-lyte-3.jpg');
