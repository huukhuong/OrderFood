-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2021 lúc 03:09 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `order_food`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pizza', NULL, NULL),
(2, 'Hamburger', NULL, NULL),
(3, 'Gà Rán', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reply` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_27_195754_update_tbl_users', 1),
(6, '2021_11_27_200020_create_tbl_roles', 1),
(7, '2021_11_27_200123_create_tbl_orders', 1),
(8, '2021_11_27_200238_create_tbl_order_detail', 1),
(9, '2021_11_27_200358_create_tbl_comments', 1),
(10, '2021_11_27_200539_create_tbl_categories', 1),
(11, '2021_11_27_200620_create_tbl_products', 1),
(12, '2021_11_27_200905_create_tbl_purchases', 1),
(13, '2021_11_27_200953_create_tbl_purchase_detail', 1),
(14, '2021_11_27_201055_create_tbl_partners', 1),
(15, '2021_12_04_102840_drop_tbl_roles', 1),
(16, '2021_12_07_172226_update_tbl_products__status', 1),
(17, '2021_12_07_172617_update_tbl_products_status_column', 1),
(18, '2021_12_07_203535_add_img_and_status_tbl_users', 1),
(19, '2021_12_07_215724_add_column_phone_to_orders_tbl', 1),
(20, '2021_12_08_190820_id_partner_in_order', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `id_partner` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `total`, `created_at`, `updated_at`, `status`, `phone`, `description`, `id_partner`) VALUES
(1, 3, 'Quận 8', 40000, NULL, NULL, 1, 'no', 'no', 0),
(2, 4, 'Quận 9', 40000, NULL, NULL, 1, 'no', 'no', 0),
(3, 5, 'Quận 3', 70000, NULL, NULL, 1, 'no', 'no', 0),
(4, 1, 'Long An', 20000, '2021-12-11 14:31:41', '2021-12-11 14:50:51', 2, '0396527908', 'Không', 1),
(5, 1, 'Long An', 20000, '2021-12-11 14:51:56', '2021-12-11 14:51:56', 0, '0396527908', 'Không', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `amount`, `price`) VALUES
(1, 1, 1, 10000),
(1, 2, 1, 10000),
(1, 3, 1, 10000),
(2, 1, 2, 10000),
(2, 2, 2, 10000),
(3, 2, 3, 10000),
(3, 3, 4, 10000),
(4, 1, 1, 10000),
(4, 11, 1, 10000),
(5, 3, 1, 10000),
(5, 4, 1, 10000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `partners`
--

INSERT INTO `partners` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'GRAPFOOD', 'grapfood@gmail.com', '0396527908', 'Đặng chất ,Quận 8', NULL, NULL),
(2, 'BEAMIN', 'beaming@gmail.com', '0396527908', 'Đặng chất ,Quận 8', NULL, NULL),
(3, 'AHAMOVE', 'ahamove@gmail.com', '0396527908', 'Đặng chất ,Quận 8', NULL, NULL),
(4, 'GOFOOD', 'gofood@gmail.com', '0396527908', 'Đặng chất ,Quận 8', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `price`, `image`, `category_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Pizza Hải Sản Pesto Xanh', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'pizza0.png', 1, NULL, NULL, 1),
(2, 'Pizza Hải Sản Nhiệt Đới', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'pizza1.png', 1, NULL, NULL, 1),
(3, 'Pizza Hải Sản Cocktail', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'pizza2.png', 1, NULL, NULL, 1),
(4, 'Pizza Tôm Cocktail', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'pizza3.png', 1, NULL, NULL, 1),
(5, 'Pizza Aloha', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'pizza4.png', 1, NULL, NULL, 1),
(6, 'Pizza Thịt Xông Khói', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'pizza5.png', 1, NULL, NULL, 1),
(7, 'Pizza Thịt Nguội', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'pizza6.png', 1, NULL, NULL, 1),
(8, 'Pizza Gà Nướng 3 Vị', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'pizza7.png', 1, NULL, NULL, 1),
(9, 'Hamburger gà nướng 3 vị', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'hamburger0.jpg', 2, NULL, NULL, 1),
(10, 'Hamburger tôm', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'hamburger1.jpg', 2, NULL, NULL, 1),
(11, 'Hamburger bò lúc lắc', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'hamburger2.jpg', 2, NULL, NULL, 1),
(12, 'Gà Rán truyền thống', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'ga-ran1.jpg', 3, NULL, NULL, 1),
(13, 'Gà Rán giòn cay kèm khoai tây', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'ga-ran2.jpg', 3, NULL, NULL, 1),
(14, 'Gà Rán không cay kèm khoai tây size lớn', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?', 100, 10000, 'ga-ran3.jpg', 3, NULL, NULL, 1),
(15, 'alola', 'sdadadadad', 23231, 23124, 'admin.png', 1, '2021-12-11 14:59:16', '2021-12-11 14:59:36', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `role` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `address`, `role`, `img`, `status`) VALUES
(1, 'Võ Hoàng Kiệt', 'admin6@test.com', '2021-12-07 12:38:36', '$2y$10$Jj8XhwRH5TgztmZXZXILXOXcpBwCG/rrocRL7lCmay1qpTR2.eu8O', 'test', NULL, NULL, '0396527908', 'Long An', 1, 'default.png', 1),
(2, 'Trần Hữu Khương', 'admin2@test.com', '2021-12-07 12:38:36', '$2y$10$U9GzoGOoLL1YpuuSz8lqVetTlGQdejBoT3e4MPiayNuyZYZhpPdgK', 'test', NULL, NULL, '0396527908', 'Long An', 0, 'default.png', 1),
(3, 'Lê Thái Thanh Sơn', 'user@test.com', '2021-12-07 12:38:36', '$2y$10$Rfz5bjzSyASb8SILrxGgEeZh4iRhxKbo71MxgHWIfv58IstMP7zii', 'test', NULL, NULL, '0396527908', 'Long An', 0, 'default.png', 1),
(4, 'Võ Hoàng Quỳnh Như', 'user2@test.com', '2021-12-07 12:38:36', '$2y$10$F22wl2CFlpQRrnejY6oMJekIba72g.KUHRC3n/Cf8jDmGYDicdcfy', 'test', NULL, NULL, '0396527908', 'Long An', 0, 'default.png', 1),
(5, 'Lê Nhân', 'user3@test.com', '2021-12-07 12:38:36', '$2y$10$lZNcNiRPYpL/ci9G.hfSAuk8.VZ4lgvRwHV1/zFpIjmDkd3vQsiOS', 'test', NULL, NULL, '0396527908', 'Long An', 0, 'default.png', 1),
(6, 'Trần Văn Khang', 'user4@test.com', '2021-12-07 12:38:36', '$2y$10$MoMg3wyT1Xt9TFvddIQ8COg3HVKo.xKPdtFarWCPQQ3qms2ozP4D6', 'test', NULL, NULL, '0396527908', 'Long An', 0, 'default.png', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `reply` (`reply`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_partner` (`id_partner`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_id` (`partner_id`);

--
-- Chỉ mục cho bảng `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`reply`) REFERENCES `comments` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`);

--
-- Các ràng buộc cho bảng `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD CONSTRAINT `purchase_detail_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`),
  ADD CONSTRAINT `purchase_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
