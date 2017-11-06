INSERT INTO `users` VALUES 
(3,'Admin','vitor-01@teste.com','$2y$10$sfYplnY0mImBAPhuxOY6cO33z09pRqx1eBJswk8ziwnRRYZfRMa3a', 1, NULL,'2017-05-25 02:57:32','2017-06-02 01:30:02',1),
(10,'tadeu oliveira','tadeu@tadeu.me','$2y$10$5H36rXFre7bQQp6hv.rxvOrlw/WpRo8XKuy.txXOUFTEygEVzuapy', 1, 'iQ9nVSRXwCxJ8YPmmARsisTP0c9wljlPNQgBwRiBv3ZJi7ASTMZHvgn1sUZo','2017-06-01 14:09:07','2017-06-01 14:09:07',2),
(13,'Felipe Breda','felipe@teste.com','$2y$10$99Sn19cU8ROpDdYdPUOFxePXfH0ueO3NNWSlOM313qxvNIi.5FkqW', 1, NULL,'2017-06-02 02:42:20','2017-06-02 02:42:20',1),
(14,'vitor afonso','vitor@alecrim.com','$2y$10$qXGWSpcBJ/ndfl3XoPEBeuLyy8NTTMCPmfslEm/Ob12Oa.jkcbv2W', 1, NULL,'2017-08-20 00:29:14','2017-08-20 00:29:14',1);

INSERT INTO `products` (product_name, product_description, product_quantity, product_price, created_at, product_packing, product_purchase_price, product_acceptable_minimum_quantity, status) VALUES 
('Coca-cola','Refrigerante coca sabor coca',100,2.00,'2017-06-01 14:29:59','caixa', 2.00, 1, 1), 
('Salgadinho Fofura','sabor queijo',100,3.00,'2017-06-01 14:30:45','caixa', 2.00, 1, 1),
('Fanta Laranja','Refrigerante lata',10,4.50,'2017-06-02 01:28:17','caixa', 2.00, 1, 1),
('Pão Hamburguer','Pao para hamburguer',10,10.00,'2017-06-02 02:43:19','caixa', 2.00, 1, 1);

INSERT INTO `items` (`id`, `item_name`, `item_description`, `item_category`, `item_price`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Combo de refrigerantes I', 'Combo de refrigerantes, contendo: 2 Fanta Laranja lata 300ml e 4 Coca-cola lata 300ml', 'Bebidas não alcoólicas', 17.00, '2017-10-22 01:42:45', '2017-10-22 01:42:45', 1),
(2, 'Coca-cola lata 300 ml', 'Refrigerante de cola 300ml', 'Bebidas alcoólicas', 2.00, '2017-10-22 15:46:53', '2017-10-22 15:46:53', 1),
(3, 'Fanta Laranja 300ml', 'Refrigerante de Laranja 300ml', 'Bebidas não alcoólicas', 4.50, '2017-10-22 15:47:45', '2017-10-22 15:47:45', 1);

INSERT INTO `item_product` (`product_id`, `item_id`, `product_quantity`) VALUES
(1, 1, 4),
(3, 1, 2),
(1, 2, 1),
(3, 3, 1);