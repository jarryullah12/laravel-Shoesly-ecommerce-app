-- Create products table
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text,
  `category` varchar(255) NOT NULL,
  `gallery` varchar(255) DEFAULT NULL,
  `gallery2` varchar(255) DEFAULT NULL,
  `gallery3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert products
INSERT INTO `products` (`name`, `price`, `description`, `category`, `gallery`, `gallery2`, `gallery3`) VALUES
('Nike Air Max', 12000.00, 'Comfortable running shoes with air cushioning technology', 'shoes', 'nike-air-max-1.jpg', 'nike-air-max-2.jpg', 'nike-air-max-3.jpg'),
('Adidas Ultraboost', 15000.00, 'Premium running shoes with responsive boost cushioning', 'shoes', 'adidas-ultraboost-1.jpg', 'adidas-ultraboost-2.jpg', 'adidas-ultraboost-3.jpg'),
('Puma RS-X', 8000.00, 'Stylish casual sneakers with chunky design', 'shoes', 'puma-rsx-1.jpg', 'puma-rsx-2.jpg', 'puma-rsx-3.jpg'),
('Reebok Classic Leather', 6000.00, 'Iconic casual shoes with timeless design', 'shoes', 'reebok-classic-1.jpg', 'reebok-classic-2.jpg', 'reebok-classic-3.jpg'),
('New Balance 574', 9000.00, 'Comfortable lifestyle shoes with classic design', 'shoes', 'new-balance-574-1.jpg', 'new-balance-574-2.jpg', 'new-balance-574-3.jpg'),
('Asics Gel-Lyte III', 11000.00, 'Premium lifestyle shoes with gel cushioning', 'shoes', 'asics-gel-lyte-1.jpg', 'asics-gel-lyte-2.jpg', 'asics-gel-lyte-3.jpg');
