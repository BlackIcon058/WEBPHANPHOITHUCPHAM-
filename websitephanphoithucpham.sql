-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2024 lúc 05:19 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websitephanphoithucpham1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id_admin_roles` int(11) NOT NULL,
  `admin_admin_id` int(11) NOT NULL,
  `roles_id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_roles`
--

INSERT INTO `admin_roles` (`id_admin_roles`, `admin_admin_id`, `roles_id_roles`) VALUES
(8, 2, 2),
(69, 9, 2),
(70, 9, 3),
(75, 3, 3),
(76, 1, 1),
(80, 17, 3),
(81, 18, 3),
(82, 19, 3),
(87, 21, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_dang`
--

CREATE TABLE `bai_dang` (
  `id_bai_dang` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `ngay_dang` datetime NOT NULL DEFAULT current_timestamp(),
  `het_han` datetime NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `id_nguoi_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bai_dang`
--

INSERT INTO `bai_dang` (`id_bai_dang`, `id_san_pham`, `ngay_dang`, `het_han`, `trang_thai`, `id_nguoi_ban`) VALUES
(6, 94, '2024-05-19 16:58:28', '2024-07-01 22:00:00', 1, 2),
(7, 95, '2024-05-17 11:19:07', '2024-07-01 21:53:00', 1, 2),
(8, 96, '2024-05-22 23:02:25', '2024-07-01 23:10:00', 1, 3),
(11, 98, '2024-05-21 17:09:48', '2024-07-01 18:00:00', 1, 12),
(12, 99, '2024-05-21 22:23:05', '2024-07-01 22:20:00', 1, 13),
(17, 104, '2024-06-19 09:31:27', '2024-06-21 09:30:00', 0, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('028b0a32-8ad7-4237-9389-30a2692861ed', 2, 2, 'shop c&ograve;n b&aacute;n sản phẩm abc kh&ocirc;ng ạ?', NULL, 1, '2024-05-13 09:42:33', '2024-05-13 09:43:47'),
('04c99473-bda1-4fd1-8740-846f6b2e7433', 4, 3, 'adafdfd', '{\"new_name\":\"33a10186-f641-4638-bd04-2b485858a653.png\",\"old_name\":\"tiec-teabreak-1-1.png\"}', 0, '2024-05-24 02:23:59', '2024-05-24 02:23:59'),
('0695d7b0-7e1d-4f6f-bb81-7f52b035a3cc', 2, 1, 'helooo!', NULL, 1, '2024-05-13 09:44:49', '2024-05-13 09:44:50'),
('0f27b131-6be8-405c-a63e-26d2c82040b0', 7, 3, 'alo', NULL, 1, '2024-05-18 11:17:05', '2024-05-18 11:17:14'),
('211d54ac-8e29-4952-8dc2-88b5c384fd46', 7, 3, 'sản phẩm n&agrave;y c&ograve;n kh&ocirc;ng ạ', NULL, 1, '2024-05-20 10:07:11', '2024-05-20 10:07:13'),
('230c61cb-a567-4fb8-889a-2e108820438b', 4, 3, 'hi', NULL, 1, '2024-05-23 23:51:03', '2024-05-23 23:51:24'),
('2508f311-bc1c-47f7-ad3e-801854287164', 14, 13, '', '{\"new_name\":\"31cb7502-7a1a-40ff-a39a-1dfa4009e43e.jpg\",\"old_name\":\"tr&aacute;i c&acirc;y th\\u1eeba.jpg\"}', 0, '2024-06-18 20:07:42', '2024-06-18 20:07:42'),
('28004ec8-64d8-43d0-8737-3f3dfd9d8139', 2, 1, 'e m', NULL, 1, '2024-05-13 09:44:37', '2024-05-13 09:44:39'),
('287ccaa5-fb04-4ad6-99d6-74b8c952e54d', 13, 14, 'c&oacute; nha', NULL, 1, '2024-06-18 19:29:15', '2024-06-18 19:29:17'),
('2e65e0a9-58ed-432a-b136-07a595ebeef9', 7, 13, 'hi', NULL, 1, '2024-06-12 01:32:56', '2024-06-12 01:33:01'),
('325c8671-b10e-4bb8-96b1-f5657975de3d', 13, 7, 'B&ecirc;n m&igrave;nh c&ograve;n 15 phần nha.', NULL, 1, '2024-06-12 01:35:53', '2024-06-12 01:36:09'),
('39ff78c9-99a7-4ae3-ab36-e7f76f769050', 3, 2, '😀', NULL, 1, '2024-05-13 21:46:26', '2024-05-13 21:46:28'),
('3a3e0870-a314-450e-b94f-7f50bc6b5f54', 3, 7, 'Dạ. Xin ch&agrave;o ạ', NULL, 1, '2024-05-20 10:06:24', '2024-05-20 10:06:25'),
('41572bbd-9ee8-40aa-b1f6-c6cb6df83817', 7, 3, '.', NULL, 1, '2024-05-20 10:05:55', '2024-05-20 10:06:18'),
('41ff9c50-fe62-4a55-8610-f91c7d070b60', 2, 1, 'với lại l&agrave;m lại t&iacute;nh năng ph&acirc;n quyền', NULL, 1, '2024-05-13 10:05:21', '2024-05-13 10:06:23'),
('45fd35fb-e1f5-46c0-ab69-e8b3f6e53e5c', 2, 3, 'ok', NULL, 1, '2024-05-13 21:46:33', '2024-05-13 21:46:35'),
('49677f12-26e2-4d8a-978f-c089f5ea9a18', 2, 3, '??????????', NULL, 1, '2024-05-13 21:46:18', '2024-05-13 21:46:20'),
('4e865313-5ea2-4a27-8e18-84bace417903', 1, 2, 'dang l&agrave;m n&egrave; m&aacute;', NULL, 1, '2024-05-13 09:45:32', '2024-05-13 09:45:34'),
('545fbf3c-cd32-4d7d-8317-05cba9bc3105', 7, 13, 'Sản phẩm n&agrave;y c&ograve;n bao nhi&ecirc;u phần thừa ạ', NULL, 1, '2024-06-12 01:33:17', '2024-06-12 01:34:29'),
('563c5465-8cde-400d-a701-a5ad33211ed6', 2, 1, 'chứ kh thể n&agrave;o coppy c&aacute;i n&agrave;y qua được', NULL, 1, '2024-05-13 10:05:36', '2024-05-13 10:06:23'),
('5b616064-3bbe-403e-9a95-2e5a497da285', 4, 3, '........', NULL, 1, '2024-05-23 23:51:17', '2024-05-23 23:51:24'),
('63001c5c-141f-4346-a24e-ee624eb2aa14', 7, 3, 'xin ch&agrave;o ạ!', NULL, 1, '2024-05-20 10:05:13', '2024-05-20 10:06:18'),
('63734f91-499f-4607-bc33-dc84ddb6aa10', 3, 2, '..............', NULL, 1, '2024-05-13 21:46:08', '2024-05-13 21:46:11'),
('6a4a1fec-d332-4025-94f3-4b5dd14f7c9f', 3, 13, 'conf a', NULL, 1, '2024-05-21 08:58:07', '2024-05-21 08:58:17'),
('70b8b7af-91b5-43a1-97fc-1a9cb2f2b155', 7, 13, '', '{\"new_name\":\"7bd458be-712e-4708-b8cd-e078ba2960f7.png\",\"old_name\":\"tiec-teabreak-1-1.png\"}', 1, '2024-06-12 01:35:30', '2024-06-12 01:35:40'),
('72ec73ac-b120-4f1e-aea8-ca69150778a3', 2, 1, 'hiểu kh&ocirc;ng', NULL, 1, '2024-05-13 10:05:43', '2024-05-13 10:06:23'),
('74d27230-112e-4a69-929a-c9da10abde7d', 3, 2, 'mặt h&agrave;ng n&agrave;y c&ograve;n kh&ocirc;ng shop?', NULL, 1, '2024-05-13 21:41:15', '2024-05-13 21:41:17'),
('80a4cdd7-ef3b-4107-b4a7-743d52c84502', 3, 7, 'Dạ c&ograve;n', NULL, 1, '2024-05-20 10:07:17', '2024-05-20 10:07:18'),
('8b5cc92c-cda3-477c-82fa-5dae920704c4', 2, 1, 'c&aacute;i n&agrave;y quan trọng hơn', NULL, 1, '2024-05-13 10:05:39', '2024-05-13 10:06:23'),
('8cc07b95-3d20-4e0e-a4c0-989e4c053d61', 2, 1, 'shop cho em hỏi l&agrave;, cửa h&agrave;ng m&igrave;nh c&ograve;n b&aacute;n sản phẩm abc kh&ocirc;ng ạ?', NULL, 1, '2024-05-13 21:20:15', '2024-05-13 22:54:30'),
('99d671df-c0ef-4106-a52a-7e5ae3d8cc7f', 13, 3, '', '{\"new_name\":\"6501896a-dda4-47f8-b468-3a0803534471.jpg\",\"old_name\":\"tr&aacute;i c&acirc;y th\\u1eeba.jpg\"}', 1, '2024-05-21 08:57:43', '2024-05-21 08:57:56'),
('9d10d484-77b6-43ba-8344-6921e2bad768', 7, 3, '', '{\"new_name\":\"4a120b75-f556-4ddd-8795-2ae5b866482e.jpg\",\"old_name\":\"tr&aacute;i c&acirc;y th\\u1eeba.jpg\"}', 1, '2024-05-20 09:16:01', '2024-05-20 10:06:18'),
('b0d24c1f-8301-4961-bf8c-53420fd88485', 2, 1, 'm code được chức năng chat chưa?', NULL, 1, '2024-05-13 09:45:06', '2024-05-13 09:45:08'),
('b213c1eb-037f-4d7a-b8ce-6ff658e1b431', 7, 3, '', '{\"new_name\":\"90b1874c-6ec4-4f16-9981-e9318b7603e4.jpg\",\"old_name\":\"rau cu qua.jpg\"}', 1, '2024-05-20 10:07:05', '2024-05-20 10:07:13'),
('b7d9ff7b-b3f2-44b4-9ed5-0b56e2f471ca', 3, 7, 'h&igrave;', NULL, 1, '2024-05-18 11:17:42', '2024-05-18 11:17:49'),
('b8d03c1a-efae-41a3-92ca-c24fa0d9d74e', 1, 1, 'hi', NULL, 1, '2024-05-13 09:38:58', '2024-05-13 09:39:08'),
('bb7fabab-dfa0-4775-97c9-202ed89c7bde', 7, 3, 'trời ơi, l&agrave;m g&igrave; m&agrave; b&acirc;y giờ mới trl vậy!', NULL, 1, '2024-05-18 11:17:37', '2024-05-18 11:17:40'),
('bf41bd81-16a3-4476-a41d-ad5a5e339e86', 7, 3, 'hhihi', NULL, 1, '2024-05-20 09:06:51', '2024-05-20 10:06:18'),
('c195367e-de1d-408c-9a12-2aeff2500ba8', 1, 2, '😁', NULL, 1, '2024-05-13 09:45:41', '2024-05-13 09:45:42'),
('c5c0409c-f1ad-40f4-bd5f-6de777beb4a1', 13, 2, 'xin ch&agrave;o ạ', NULL, 0, '2024-06-12 01:28:34', '2024-06-12 01:28:34'),
('c5c89d11-6e5f-4cff-bcfd-1add47198e1f', 14, 13, 'alo', NULL, 1, '2024-06-18 19:28:44', '2024-06-18 19:29:10'),
('c6cab766-61bf-4228-a94a-0c1f58fd2514', 14, 13, 'c&oacute; nhận được tin nhắn kh&ocirc;ng?', NULL, 1, '2024-06-18 19:29:03', '2024-06-18 19:29:10'),
('cca4ecd4-5d85-46cb-85b2-e3d41ff83a55', 2, 1, 'giờ c&ograve;n vướn ở chỗ l&agrave; l&agrave;m sao để m&agrave; coppy nguy&ecirc;n c&aacute;i web kia qua', NULL, 1, '2024-05-13 10:05:14', '2024-05-13 10:06:23'),
('ccb0def6-70ea-4441-9d8f-932c267d9bf7', 2, 1, 't c&agrave;i được chat v&agrave;o rồi n&egrave;', NULL, 1, '2024-05-13 10:04:18', '2024-05-13 10:06:23'),
('ccfe1e1f-30f1-4fe8-b769-4a1c170eb3ff', 7, 3, 'aloo', NULL, 1, '2024-05-18 11:17:51', '2024-05-18 11:17:54'),
('d022ef92-966c-4c35-af32-2e1fad84a8bd', 13, 3, 'Sản phẩm c&ograve;n kh&ocirc;ng ạ!', NULL, 1, '2024-05-21 08:57:54', '2024-05-21 08:57:56'),
('d52dc0c2-d2d8-480e-a754-56f9287515e5', 3, 7, 'dạ, xin ch&agrave;o ạ', NULL, 1, '2024-05-18 11:17:19', '2024-05-18 11:17:27'),
('d9283656-b92c-46b5-8a9b-eba77933f791', 7, 3, '', NULL, 1, '2024-05-18 11:14:28', '2024-05-18 11:17:14'),
('dabc0a0b-87b4-4061-9456-a04cb8443b94', 7, 3, 'hi ạ', NULL, 1, '2024-05-18 11:12:26', '2024-05-18 11:13:18'),
('dbbf0c3f-96d7-4bbb-bb5a-481b97752200', 3, 1, 'Shop c&ograve;n b&aacute;n mặt h&agrave;ng n&agrave;y kh&ocirc;ng ạ?', NULL, 0, '2024-05-13 21:39:35', '2024-05-13 21:39:35'),
('de126ef2-63a1-4a24-b72b-537b8f339b75', 2, 1, 'oh mg', NULL, 1, '2024-05-13 10:04:11', '2024-05-13 10:06:23'),
('e10a3039-1731-46a9-92a5-d42d2a5093b9', 2, 1, 't&igrave;nh h&igrave;nh sao rồi?', NULL, 1, '2024-05-13 09:44:58', '2024-05-13 09:44:59'),
('e609712d-7cb6-4602-b433-10fd86f2edd9', 2, 3, 'C&ograve;n nha!', NULL, 1, '2024-05-13 21:41:23', '2024-05-13 21:41:25'),
('e7403729-dd15-4717-9f5f-316758818e6a', 7, 3, 'xin ch&agrave;o', NULL, 1, '2024-05-20 10:06:15', '2024-05-20 10:06:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_nguoidung` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `gia` float NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`id_nguoidung`, `id_sanpham`, `gia`, `soluong`) VALUES
(2, 96, 20000, 1),
(7, 96, 20000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2024_05_13_999999_add_active_status_to_users', 1),
(6, '2024_05_13_999999_add_avatar_to_users', 1),
(7, '2024_05_13_999999_add_dark_mode_to_users', 1),
(8, '2024_05_13_999999_add_messenger_color_to_users', 1),
(9, '2024_05_13_999999_create_chatify_favorites_table', 1),
(10, '2024_05_13_999999_create_chatify_messages_table', 1),
(11, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(12, '2024_05_13_162823_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0VJD29HOYxiVrng3cFfHjVYOOqeH24S0NkycE3j8', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWZKSEZaN3FRUzhSUkpPdlNBYTIzcHhiOGFORWl2emZPc2FpeGxwUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763937),
('3yvZMd9Xs7ZrFpgehRPSldFnpnuZzdzXD8AFIZn5', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWhKdGtJemlJSnRQd3J3WVljdXA0UmZLak5iUmhBdWYzMlRwaThIUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764404),
('44rRl7MMeg19b0z628SrzgV0CyALxRzUCfZ8UVcg', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiam9CZ3hNajVMc2RhS3I5MlNJUGFYTlVlVlRWekpnQjRoWVhxdEVQYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9wcm9maWxlL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718764026),
('4M9ZSZKrqMkcPGtSTAytq3LMD4G7cvM79nSsRkz5', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0cyUUc3RmQyM01jR0ljWkdjQVVVUkpMaW9HWTA2WTJ5N3N0OVpqdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9zaG9wLWRldGFpbHMvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763778),
('54bGFFMSFCNinqHefjEs5EHz8z7ZaQGGMc6EmOWu', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVG5BV0ZkbWc0YWV6aEg3YUg4cHpXMVFVbUNYbDZXQ0o2ZDZuaFVlaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764031),
('5DhmeE6dZ9oROQP6JjZ4tjRy8ebcAta3t3xGFoLL', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoxMTA6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS90aW0ta2llbT9fdG9rZW49YmRLWjZZOTVRdXlybjd3U290SUFaRVpTV0pmUzc4a3BTTXV4WFBiSiZrZXl3b3Jkc19zdWJtaXQ9Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6ImJkS1o2WTk1UXV5cm43d1NvdElBWkVaU1dKZlM3OGtwU011eFhQYkoiO3M6MTA6ImFkbWluX3JvbGUiO2k6MTt9', 1718765557),
('68H7dL22nJ6FeesQspgaFRD8PX2xMS2Y1ABLr7RJ', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXRzY1poYUFJc3RITFVCeDQ3WlRDaG1Rdml4UVZSVVhPTDZZSDJISCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764397),
('6wEXFHaa8uynTLUqFrECbV7r28TOinNtrqZ2o9sV', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlA2RDBvU2x4VXgxZVdXZU52b2hJalU3SnBvWVNqeFRqdG10MUY0OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9wcm9maWxlL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718763968),
('7qyQfOLFuf3zzWV4VCaW1bjX9Kwkr0OXlQlX9Wc3', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickhUTmhPZE1HU0EzdmM1V1YyaXF6Y04yZDE5aFA0UURKNnEwNmdtVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9lZGl0LXByb2ZpbGUvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763946),
('8uayg3js2NRROGGPMNWubmga6T3PjMOIOhBL8wyZ', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiek5laXkzcUM4ZURhQ28ySkZoRnZpUUxxNDhQa1lxMmtsaXVlN0pLRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9kZXRhaWwvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763759),
('9HZ3qoU7pV8jZOiqbGb3HGD4DiHrkmhIJBJuSqd2', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUW5wOUpOMGtrbHNJUUtia0IwMmdtQ2lLalhuTG41Q3ZSVnNWTkx0NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjQ6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9saXN0LW9yZGVyL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718764326),
('9kb3KYe9x7NAIRhcxsUBTvcP7ICKeUy5LnnV0ekF', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2lkTHpOSXl4aExIdEFSaHc5YXhpanRqUEFCSUk1V0Z5bUUxZmFXWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9zaG9wLWRldGFpbHMvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763783),
('A0Gb8W2KsAZZXlocUNHxKMF4NB1zXF5IMgEzFdl5', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSzZIMmhiUjNmTjZCR1lFNTFoVkoyWkhlblFqWGFCOHR6Qzk1U0xCbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9zaG9wLWRldGFpbHMvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763786),
('AXrOwVOGutlkDkOc9Tn55KI45zfby2NhQvjDtZw2', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkh2RTRzcFhHTjRWMG9Pd0pxSXFwRGVENUtpaHBOWW42c2NFcVVBayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9wcm9maWxlL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718765432),
('bciHnf9H7g3YemJQc03CJcwSBmEYkLrtnqnMhOcr', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1JsbWd3N2Q5UFFZSktpTE9DTlBnTXBtUmtYdzZqRjBmd2lmY3dmQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9zaG9wLWRldGFpbHMvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718766691),
('D12ssY71JLQvO3iknVo8U4q0gtzKMZp8H97VUtWg', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3V5RU9Ld05VaEhnQmdLYlJQbDcyN0lPWEx4YThOaDF0Sktyck1VNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718767131),
('DB6MVQE9XF8BHNf4KiQgWrNIZQh1IlEx4ZNYgtB2', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia29udmJwbUR6cmNTaHdwNGUxT0N2UThpZm5iMDlyMDYyb1p4ZGV2TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763932),
('dfwRxOh3DlgYeiXCE4t7W7C3UFo8sYwFUhzSyvr9', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0ZNZG5OTEpvajNST0E3d0lwd0hIMnh2R1lxcmJSTlhZUnZDQ1EwYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9kZXRhaWwvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718766677),
('du1Mzb5j6RLe8576ZFQKz4aea6zH74FRrwAAciFw', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2Q3U1R5VDBzOG5WRWMwTXc2N3owOG5kdFlEd1hSR1NoRlVXR2ZpNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9wcm9maWxlL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718764194),
('EAOaV5te7rWpSKEeXZsIuHLfVSDjEMQ8VX8tcoEQ', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibmxSU0Rsa2E0bVNsb2pHUVh0V2ZHeXFXaVB5MHF6M3laS3cyd3o5VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9kZXRhaWwvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763980),
('eM6xPRLN8rAo0gAUcjR9LCisso5ERT2WmgA33SkY', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3FPUlEyZEZBU0hMRDVnSTVlTFM1S1ByZ3Z4ZjhzbHExekRicW5ZVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9wcm9maWxlL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718764176),
('FeGrveVm1fNODHmnQGdMUrRjMw6i4GWqFmcxnYc3', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWkp6YzkyNXdVZmlQZXBhU2hJQjY4ZmhuOEM5eWFUMFF4b1VwSXRaRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODA6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS92aWV3ZGV0YWlscy1vcmRlci1jdXN0b21lci9zaXRlLndlYm1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718764418),
('Gkhjs3exWNK29dGTjVWVq7P4mGRKVI6uvWER07PG', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidHA0VEppdHFSOXJhN2FnUVdXdnRyOTFpOVZONkh2T0dCUDZvakhLcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9wcm9maWxlL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718767130),
('hBdROmEqSDflo9O1p78g7RXGIQ5J6QDDoUSZfBqk', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTh3Y2dmV2dhRzZSNzRsZXFQN2FrVXVGUVN1MUZ5TTUwdzM1ZVZONSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764327),
('HyjjyBhyVl33jPeqGiE7kJSGMiCNQEQQtRPbMrdw', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQTZ1VmpHYlkxdjdtSG9tOXhjbFAzNURVT3FVZk5Ub2hZaXBWaU9ucSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763946),
('Jjdxk8zinEiJwWvD4bBEl2eDJ7rVFb8E6gc6LXMl', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2tWSFByalBXUW1NZ2dLZ2xscUxSOU5Lakduc0ZGWHU3MU80Z3VWaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODA6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS92aWV3ZGV0YWlscy1vcmRlci1jdXN0b21lci9zaXRlLndlYm1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718764033),
('L7dXP6j230GidQFQyAeU4U91U4zfVsVeitLrfyxl', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cDovL2xvY2FsaG9zdC93ZWJwaGFucGhvaXRodWNwaGFtIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6Ik1GQWZ6c0lmVlV6d0NZVU9nR0JmdzY2MVdjdW5ndzZMZ3ZDWTR4amUiO30=', 1718767137),
('lwB8hDtmvEllS4TrkET9G21IiMUZgaRD2SE44vS3', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY3dQVFo3a0xIaVd5amc3enRDTm5pUVZJSUZscm1TSGJRSjZBU1k3MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764335),
('MMjjHEfkG3gM9TLQ0MfsCFQVKYIF7gqf7HABtxJL', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjlMTXdoaWlndk1Ca0xNYjBsMnI2NVlnVXBneWZ6U1I0QmpDZW5wdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9zaG9wLWRldGFpbHMvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718766762),
('MMrBfxa5BwJknwiN6TkD0y3pDIS80C21MWpCRWg8', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY3FPU1RPTFNzYkI2VDVIUU1WT3VVOEJiUWVqeXd3SXNZNHdWenFKWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763968),
('NZFc1fr9RjioH6dVK72xgb3jRgcq7ITpEj2d1eOs', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmhKMWhmdm5NT0dCRks0b0V4OXd0b0tjeVg2a3NzSGNQNEhZVnA2WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718765432),
('OAbTcwocohJp0ZYSS5pJTnf6k7u8bCP7RdmdFiJC', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielB4N3gzRjZGYjJDOWZwc01CZEtiUTZJRGcxc2l6bWYxSU1MeWozYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9wcm9maWxlL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718763931),
('oSHqXGvA6cLe9hbUNCBMtE5Cghk9UqtyVoPDg6Ct', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlhSREhVcWV0b25SaEt4WHdiU3BmRjVMSDJWekRYckxUMmVhMk1xayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9wcm9maWxlL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718764397),
('PeihWBMqNNGEpcTPprus17iWxHxrNy3k9Tk4px0E', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0pHZDJ2ejhhMEtSSFN2REpiTjJiRTZsdUJvZVdKN2JQN1d6NjZHSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9lZGl0LXByb2ZpbGUvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763936),
('qFj1GQiAx3wux0QzxFvJRIY0wIckE2SZD2mlzzuk', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTdyWnFpWHNHOTFWcXlBT2d2SWZXWXE5YkJ6R1RIVzJTdlVhajNnNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764177),
('r111VGWuSgmY7xE2DY8AcjL3cfsikFCyCN7VfuRv', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWXEyWkc4WWdNZk1tTG1Fa1dkWk1VU1Z5cXR2NnpEYlpOT3djMUtXMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9wcm9maWxlL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718763955),
('R4U4d0Ty3usTNDbfnWUCAO9MbgiKqVcCT0WbKwIU', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmUwR0dycFFNU1RPNWdVRGFlQTBPS3VraUVpa3pjbThvRUlPcUJYQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764419),
('Rc5Bc0zE7EQrh9t8NwDAhd4tc5ULEGKG74S64gVQ', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGJYbTBWNmVRaWo2MTRFMmtFcHUxN0NTSk1BMW5oQmtnS1hyN2RYcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764366),
('rdngyAsxBu7oREYY2YXvClPtKYnLNXDZy7dQAQ1Q', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1Fic1dJRlpUWkFNWW5odnFUR0I3WDFUZWtpRGYwaGNQMHBzempzNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODA6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS92aWV3ZGV0YWlscy1vcmRlci1jdXN0b21lci9zaXRlLndlYm1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718764403),
('RDU8E6eo9Zp3qA0pZpvC1ctG3R82UK7JDDVvGuXU', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWF0OFVOVFBSNVRCU2hPbDk1MXFoOUk5RE1kQW1OVVRXZUFJdHVyNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764345),
('seRxzKI4Jz3sISu70Z7ZvClzDqPCxBYClezt2f8i', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibmtxdFV6ZnM5YjNkS0szOVNCZEswYWpHcEl5Tk1JYVY3VVVrVmJsSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njg6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9hcHByb3ZlLW9yZGVycy9zaXRlLndlYm1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718764344),
('StgIYTqP7eyHanSJrgMqFGDTehXVW10fKkRu3kgK', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1IzSmpMUGVHQURhcmV1bWxQV1BPMFRBZDlRM2VUZU5hR0lDU0t2MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9kZXRhaWwvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764011),
('t1ARbIk4a9iKX80F9dE4zR5QT3sgpP48Z3SzpQbb', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2RqbUR4RGl5aHM5RVNGV0IyZmFHM0NEMGpBUUp2akFtQm8xa0NTYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njg6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9hcHByb3ZlLW9yZGVycy9zaXRlLndlYm1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718764334),
('TIwmKlEKMTwxH2zKTMy1muLI6l9F5ur0jqoISIRR', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieWJFb2Q5S3NkT1J6V3praFZWZmJ3Q2Z0eHA4cVEydkJYYnlySHZvdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764194),
('tXSV3YMxhM3TqnWtgKmEJL1rF1KeLaoYzCMXa2eK', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUJyVGJnQ3pVSTA0QkkxbVRoNVJaNWZMR2pmS2xpS0lxaDVyRWRRSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9wcm9maWxlL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718763896),
('W8DD17vB6LkEnjSeS8BMS1yunK7EiopXSY3LzVoC', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0xBR2NtYm44bk53VnNpWnhUY1Jza2lGZWc1V0pqS3B6N1d1UzRZYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njg6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9hcHByb3ZlLW9yZGVycy9zaXRlLndlYm1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718764365),
('WPBekwTvL2nQ28rQe8XsKSLJ4EoJmgVdqgna4GKm', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMVpwcElkTUFWMWlVdlZEWXlQRUxUZGR1emQ2RnpiY0ozM3BUOFhxciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzI6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS92aWV3b3JkZXItY3VzdG9tZXIvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764400),
('X574CKZ2UWP2TxEmP8V2RWn5PHWNRV1xgmTuJXTt', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieEE5a2NEaHg4MXBSdkcxVGI5UTBTNDJrcFdBSFpjeUpnR0o2RWRNcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763897),
('xkCG6alaTCCPt4jBXwmVFQ1e1rXnpbIA8lnDyx7k', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWVKcFF5b2tpZG41Yks3WEV6WE9Qd3kxOFF5c0pRRVJZNDVsYmJWZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzI6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS92aWV3b3JkZXItY3VzdG9tZXIvc2l0ZS53ZWJtYW5pZmVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764030),
('y7QYxnH5xdKP94yFBqJ0oYJP0meOPLSASE1ZE5db', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2YzQWJ0T01Md2k5QXdLSmF1OGxZeG1yVjBZTmJ5QUVLRWZINzZ1diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764027),
('ye9U40sFEs5PGlPlnGEaLeIPFBJpgvb6MSthgRdS', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkZrQmlMdWRZeG4wenpyZ1liaDEyMjNiYmxucnRUQTB5RlZSSmZlaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764400),
('YmDURGDa3YpL7Xma06ROqNPAVuDPzTsCoHJFIVV3', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiakZ0MXFRdDVMdUNRV0ZYNm0yc0VKY3IwelR0TUdmemRncTFxQjF0OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764324),
('yR83XcjmQa99b2Qz9Ggsn5rcvjeDDleVa2ydmYdX', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHc0WDNYM0Y1WERXWnFxSVdQRDJDSkpZeGNHMFJBYUVNSWNrSkEzYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718763956),
('YwVrgwFV1b1gweFDjHd36YhUNaE4KXVgOTIJdoYH', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUdHNm53Y29aZU1GSmZNRUZGT0dCRVhpWkdxZTBFUklLS2JLQUh1OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbS9wcm9maWxlL3NpdGUud2VibWFuaWZlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718764324),
('zkSFAnx98lGyQN9tDrR4sXCMZzxc9az35UTOXbje', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ1FuY1c1ZlZlRTdXaEI4UUFISlJsMGJIeHRCWlNISjF5VnV6YVA4UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Qvd2VicGhhbnBob2l0aHVjcGhhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718764034);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_amin`
--

CREATE TABLE `tbl_amin` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_amin`
--

INSERT INTO `tbl_amin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin12', '0389938946', NULL, NULL),
(2, 'author12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'author12', '0354481295', NULL, NULL),
(3, 'user12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user12', '0374268055', NULL, NULL),
(9, 'vannam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'VanNam', '0389938945', NULL, NULL),
(17, 'admin15@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin15', '03647588695', NULL, NULL),
(18, 'amin17@gmail.com', '96e79218965eb72c92a549dd5a330112', 'admin17', '036475886', NULL, NULL),
(19, 'admin18@gmail.com', '96e79218965eb72c92a549dd5a330112', 'admin18', '0364758865', NULL, NULL),
(21, 'admin20@gmail.com', '96e79218965eb72c92a549dd5a330112', 'admin20', '0364758864', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(28, 'Thức ăn đã qua sử dụng', 'mtt', 1, NULL, NULL),
(29, 'Rau Củ Quả', 'mt', 1, NULL, NULL),
(30, 'Thực phẩm tái chế', 'mt', 1, NULL, NULL),
(31, 'Đồ hộp', 'mt', 1, NULL, NULL),
(33, 'Nước', 'nước', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comments`
--

INSERT INTO `tbl_comments` (`comment_id`, `user_id`, `post_id`, `comment`, `comment_date`, `comment_status`) VALUES
(1, 1, 8, 'Đã đặt hàng! Giao nhanh! 5 sao!', '2024-05-19 02:56:21', 1),
(2, 7, 8, 'Giao hàng nhanh ghê!', '2024-05-19 02:56:18', 1),
(4, 7, 7, 'Rau củ quả!', '2024-05-19 02:56:23', 1),
(5, 7, 8, 'còn không ạ!', '2024-05-20 17:08:00', 1),
(6, 12, 11, 'Thực phẩm còn đóng hộp!', '2024-05-21 10:23:56', 1),
(7, 7, 11, 'Nhìn có vẻ hấp dẫn!', '2024-05-21 11:08:32', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `id_nguoi_ban` int(11) NOT NULL,
  `address` varchar(400) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `order_total` varchar(100) NOT NULL,
  `order_status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `id_nguoi_ban`, `address`, `payment_method`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(111, 7, 13, '54 Nguyễn Đình Tứ, Hoà An, quận Cẩm Lệ, Đà Nẵng', 'Thanh toán khi nhận hàng', '20000', 2, '2024-06-12 08:37:07', NULL),
(112, 13, 3, '04 Hàn Mặc Tử, Thuận Phước, Hải Châu, Đà Nẵng', 'Thanh toán khi nhận hàng', '20000', 1, '2024-06-12 08:41:43', NULL),
(113, 14, 3, '04 Hàn Mặc Tử, Thuận Phước, Hải Châu, Đà Nẵng', 'Thanh toán khi nhận hàng', '20000', 1, '2024-06-19 02:27:03', NULL),
(114, 14, 13, '54 Nguyễn Đình Tứ, Hoà An, quận Cẩm Lệ, Đà Nẵng', 'Thanh toán khi nhận hàng', '20000', 2, '2024-06-19 02:27:04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `don_vi_sp` varchar(255) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `don_vi_sp`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(128, 111, 99, 'Trái cây thừa', 'Kg', '20000', 1, NULL, NULL),
(129, 112, 96, 'Bắp cải', 'Kg', '20000', 1, NULL, NULL),
(130, 113, 96, 'Bắp cải', 'Kg', '20000', 1, NULL, NULL),
(131, 114, 99, 'Trái cây thừa', 'Kg', '20000', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_sold` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text DEFAULT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_deadline` datetime DEFAULT NULL,
  `id_nguoi_ban` int(11) DEFAULT NULL,
  `don_vi_sp` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `product_qty`, `product_sold`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `product_deadline`, `id_nguoi_ban`, `don_vi_sp`, `created_at`, `updated_at`) VALUES
(94, 31, 'Đồ hộp', 10, 2, 'Đồ hộp chất lượng!', NULL, 20000, 'do hop26.jpg', 1, '2024-05-20 22:00:00', 2, 'Hộp', '2024-05-17 04:03:17', NULL),
(95, 29, 'Rau củ quả', 9, 1, 'Rau củ', NULL, 15000, 'rau cu qua67.jpg', 1, '2024-05-20 15:00:00', 2, 'Kg', '2024-05-17 04:18:58', NULL),
(96, 29, 'Bắp cải', 7, 1, 'Bắp cải trong ngày!', NULL, 20000, 'rau-cu-qua-nhich-gia-vi-troi-lanh75.jpg', 1, '2024-05-22 23:10:00', 3, 'Kg', '2024-05-22 16:02:25', NULL),
(97, 29, 'Trái cây thừa', 10, 0, 'Sản phẩm tốt!', NULL, 30000, 'trái cây thừa38.jpg', 1, '2024-05-20 23:19:00', 3, 'Kg', '2024-05-19 16:19:50', NULL),
(98, 31, '5 phần sau bữa tiệc', 20, 0, 'Thực phẩm sau bữa tiệc!', NULL, 50000, 'tiec-teabreak-1-123.png', 1, '2024-05-22 18:00:00', 12, 'Hộp', '2024-05-21 10:09:48', NULL),
(99, 29, 'Trái cây thừa', 6, 4, 'Trái cây thừa!', NULL, 20000, 'trái cây thừa66.jpg', 1, '2024-05-22 22:20:00', 13, 'Kg', '2024-05-21 15:23:05', NULL),
(104, 31, '20 Phần thực phẩm', 20, 0, 'thực phẩm tốt!', NULL, 100000, 'tiec-teabreak-1-134.png', 1, '2024-06-21 09:30:00', 13, 'Hộp', '2024-06-19 02:31:27', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `customer_id`, `order_id`, `seller_id`, `rating`, `review`) VALUES
(23, 14, 114, 13, 5, 'sản phẩm tốt!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_rating_user`
--

CREATE TABLE `tbl_rating_user` (
  `rating_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_rating_user`
--

INSERT INTO `tbl_rating_user` (`rating_user_id`, `user_id`, `order_id`, `seller_id`, `rating`, `review`) VALUES
(8, 14, 114, 13, 5, 'nhận đúng giờ!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id_roles` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_roles`
--

INSERT INTO `tbl_roles` (`id_roles`, `name`) VALUES
(1, 'admin'),
(2, 'author'),
(3, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_bao`
--

CREATE TABLE `thong_bao` (
  `id_thong_bao` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` timestamp NOT NULL DEFAULT current_timestamp(),
  `trang_thai_thong_bao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_bao`
--

INSERT INTO `thong_bao` (`id_thong_bao`, `tieu_de`, `noi_dung`, `ngay_dang`, `trang_thai_thong_bao`) VALUES
(1, 'Sản phẩm thừa mới về!', 'Hàng loạt sản phẩm thừa chất lượng cao đã được cập nhật trên trang web của chúng tôi. Hãy truy cập ngay để chọn cho mình sản phẩm yêu thích.', '2024-05-19 05:18:58', 1),
(2, 'Chương trình tặng quà', 'Khi mua sản phẩm thừa bất kỳ từ trang web của chúng tôi, bạn sẽ nhận được một phần quà hấp dẫn. Nhanh tay lên!', '2024-05-19 05:20:22', 1),
(3, 'Cập nhật phiên bản web 2.0', 'Nội dung thử nghiệm', '2024-05-19 05:29:45', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `is_seller` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `intro` text DEFAULT NULL,
  `open_time_start` time DEFAULT NULL,
  `open_time_end` time DEFAULT NULL,
  `is_locked` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`, `phone`, `address`, `is_seller`, `fullname`, `intro`, `open_time_start`, `open_time_end`, `is_locked`, `rating`) VALUES
(1, 'quan52022', 'quanhoang52022@gmail.comm', NULL, '$2y$10$PC4QhejKCqG8IOKVUHhYvutx4SRs.Ftk9c..6wnYLY7Rf1knzXRPy', NULL, NULL, NULL, NULL, '2024-05-13 09:36:53', '2024-05-13 09:44:34', 1, 'kinh-nghiem-chon-dia-diem-mo-cua-hang-tap-hoa213.jpg', 0, NULL, '0928957111', '105 Mai Lão Bạng, Thuận Phước, Hải Châu, Đà Nẵng', 1, 'Nguyễn Hoàng Quân', 'Chuyên cung cấp đồ hộp sắp hết hạn. Có thể sử dụng cho gia súc, gia cầm, ..', NULL, NULL, 0, 0),
(2, 'cuahangdohop', 'hoa5202@gmail.com', NULL, '$2y$10$F8utcz0yAJsujV1RX6VHCu1hdp3ElGxqec2aCPL3WDztGr2FScjV2', NULL, NULL, NULL, NULL, '2024-05-13 09:40:33', '2024-05-13 23:25:18', 0, 'kinh-nghiem-chon-dia-diem-mo-cua-hang-tap-hoa222.jpg', 0, NULL, '0928957546', '70 Ngô Gia Tự, Hải Châu 1, Hải Châu, Đà Nẵng', 1, 'Cửa hàng đồ hộp', 'Cửa hàng chuyên cung cấp đồ hộp', '05:00:00', '22:00:00', 0, 0),
(3, 'cuahangraucu', 'quanhoang55@gmail.com', NULL, '$2y$10$ONARQqt/hMGkXFuTsLTanOOxlTO3cDGksX5Fh8fHt.Lhom4jjwqTe', NULL, NULL, NULL, NULL, '2024-05-13 21:34:03', '2024-05-23 23:53:19', 0, 'ch rau cu39.jpg', 0, NULL, '0928957523', '04 Hàn Mặc Tử, Thuận Phước, Hải Châu, Đà Nẵng', 1, 'Cửa hàng rau củ', 'Chuyên cung cấp rau củ.', '13:08:00', '17:08:00', 0, 0),
(4, 'quan1234', 'quanhoang02@gmail.com', NULL, '$2y$10$7iLXErTGTwt4SzO.gPksEuxNHgmz26TYBFn5fobGwtS7eL/IY1nlu', NULL, NULL, NULL, NULL, '2024-05-13 23:15:00', '2024-05-23 23:52:04', 1, 'images41.png', 0, NULL, '0928957332', '15 Phan Đình Phùng, Hải Châu 1, Hải Châu, Đà Nẵng', 1, NULL, NULL, NULL, NULL, 0, 0),
(5, 'quan555', 'quanhoang555@gmail.com', NULL, '$2y$10$X1hJmSh1b/K01BItO0bVjeY9gRRCUtZmbtzNbxDuxIsgXLa/Pqg1W', NULL, NULL, NULL, NULL, '2024-05-13 23:21:40', '2024-05-13 23:21:40', 0, 'avatar.png', 0, NULL, '0928957544', '12 Phan Châu Trinh, Hải Châu 1, Hải Châu, Đà Nẵng', 0, 'Trần Văn Bình', NULL, NULL, NULL, 0, 0),
(6, 'quan666', 'quanhoang66@gmail.com', NULL, '$2y$10$62BxUW2dfvtOmJHpMKMdh.OF9lqo10NuaL9N5Wv0qVLUdi/y8Fg6K', NULL, NULL, NULL, NULL, '2024-05-13 23:24:02', '2024-05-13 23:24:02', 0, 'avatar.png', 0, NULL, '0928957546', NULL, 1, NULL, NULL, NULL, NULL, 1, 0),
(7, 'quan123', 'quanhoang62@gmail.com', NULL, '$2y$10$RdNjPmcz81DLr/fk96XJCu6S.CtxbWV3KMB1sac9Hpxb.dDtoV3.S', NULL, NULL, NULL, NULL, '2024-05-14 07:06:20', '2024-05-21 01:20:29', 0, 'images81.png', 0, NULL, '0928957523', '99 An Duong Vuong, p16, q8, Sài Gòn', 0, 'Nguyen Hoang Quan', NULL, NULL, NULL, 0, 0),
(10, 'quan77', 'quan77@gmail.com', NULL, '$2y$10$BhPqkO4DDhTVWzld8AQedOwh00uZ36OT8f3Asv.yKgMoZ/PIDp5vm', NULL, NULL, NULL, NULL, '2024-05-18 20:26:56', '2024-05-18 20:26:56', 0, 'avatar.png', 0, NULL, '0928957546', '20 Nguyễn Thái Học, Hải Châu 1, Hải Châu, Đà Nẵng', 0, 'Tran Van D', NULL, NULL, NULL, 0, 0),
(11, 'test123', 'test@gmail.com', NULL, '$2y$10$AmKT5fylo5j24FmdM9g.Jujv5RErCBduiuaYAobhvQSOc8UxdhG62', NULL, NULL, NULL, NULL, '2024-05-20 01:50:59', '2024-05-20 01:50:59', 0, 'avatar.png', 0, NULL, '0398488596', '22 Lê Duẩn, Thuận Phước, Hải Châu, Đà Nẵng', 0, 'nguyen van test', NULL, NULL, NULL, 0, 0),
(12, 'dinhtra12', 'dinhtra@gmail.com', NULL, '$2y$10$GEFKgWQc5yV9c0ADhrkqIOcgzTUkmRbEvl4zkZpp9QB7Z8yPEipVS', NULL, NULL, NULL, NULL, '2024-05-21 02:51:03', '2024-05-21 02:51:03', 0, 'quan an dt81.jpg', 0, NULL, '0389938945', '50 Trần Phú, Hải Châu 1, Hải Châu, Đà Nẵng', 1, 'Dinh Tra', 'Cung cấp thực phẩm dư thừa sau các bữa tiệc.', '05:00:00', '17:00:00', 0, 0),
(13, 'dinhtra13', 'dinhtra13@gmail.com', NULL, '$2y$10$/9AHa9a21Q1zgAR2pvzWueQ8g69KwQj28bzSpDqVdNfOvd8b36QWa', NULL, NULL, NULL, NULL, '2024-05-21 07:57:49', '2024-06-12 01:32:51', 1, 'ch dinh tra63.jpg', 0, NULL, '0389948933', '54 Nguyễn Đình Tứ, Hoà An, quận Cẩm Lệ, Đà Nẵng', 1, 'CH Đình Trà', 'Cửa hàng chuyên cung cấp các loại trái cây!', '05:00:00', '17:00:00', 0, 5),
(14, 'dinhtra1515', 'dinhtra1515@gmail.com', NULL, '$2y$10$kAF6QmLKdI1PKLc6zjqiyO2joxSlbMF8XPJJK8.UYOkCgVFkB8CBC', NULL, NULL, NULL, NULL, '2024-06-18 19:24:28', '2024-06-18 19:30:09', 0, 'ch dinh tra4.jpg', 0, NULL, '0928957534', 'Quận 5, Sài Gòn', 2, 'nguyendinhtra', NULL, NULL, NULL, 0, 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id_admin_roles`),
  ADD KEY `admin_admin_id` (`admin_admin_id`),
  ADD KEY `roles_id_roles` (`roles_id_roles`);

--
-- Chỉ mục cho bảng `bai_dang`
--
ALTER TABLE `bai_dang`
  ADD PRIMARY KEY (`id_bai_dang`),
  ADD KEY `id_san_pham` (`id_san_pham`),
  ADD KEY `id_nguoi_ban` (`id_nguoi_ban`);

--
-- Chỉ mục cho bảng `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
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
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `tbl_amin`
--
ALTER TABLE `tbl_amin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `id_nguoi_ban` (`id_nguoi_ban`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `category_id_2` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Chỉ mục cho bảng `tbl_rating_user`
--
ALTER TABLE `tbl_rating_user`
  ADD PRIMARY KEY (`rating_user_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Chỉ mục cho bảng `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Chỉ mục cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`id_thong_bao`);

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
-- AUTO_INCREMENT cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id_admin_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `bai_dang`
--
ALTER TABLE `bai_dang`
  MODIFY `id_bai_dang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_amin`
--
ALTER TABLE `tbl_amin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_rating_user`
--
ALTER TABLE `tbl_rating_user`
  MODIFY `rating_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  MODIFY `id_thong_bao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD CONSTRAINT `admin_roles_ibfk_1` FOREIGN KEY (`admin_admin_id`) REFERENCES `tbl_amin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_roles_ibfk_2` FOREIGN KEY (`roles_id_roles`) REFERENCES `tbl_roles` (`id_roles`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bai_dang`
--
ALTER TABLE `bai_dang`
  ADD CONSTRAINT `bai_dang_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bai_dang_ibfk_2` FOREIGN KEY (`id_nguoi_ban`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`id_nguoidung`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `tbl_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `bai_dang` (`id_bai_dang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`id_nguoi_ban`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD CONSTRAINT `tbl_rating_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_rating_ibfk_3` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_rating_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_rating_user`
--
ALTER TABLE `tbl_rating_user`
  ADD CONSTRAINT `tbl_rating_user_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_rating_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_rating_user_ibfk_3` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
