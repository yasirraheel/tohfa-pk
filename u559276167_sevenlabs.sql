-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2026 at 06:45 PM
-- Server version: 11.8.6-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u559276167_sevenlabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `seo_title` varchar(200) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` text DEFAULT NULL,
  `og_title` varchar(200) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(500) DEFAULT NULL,
  `og_type` varchar(50) NOT NULL DEFAULT 'website',
  `og_site_name` varchar(200) DEFAULT NULL,
  `twitter_card` varchar(50) NOT NULL DEFAULT 'summary_large_image',
  `twitter_site` varchar(100) DEFAULT NULL,
  `twitter_creator` varchar(100) DEFAULT NULL,
  `canonical_url` varchar(500) DEFAULT NULL,
  `robots` varchar(100) NOT NULL DEFAULT 'index,follow',
  `description` text NOT NULL,
  `welcome_text` varchar(200) NOT NULL,
  `welcome_subtitle` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `result_request` int(10) UNSIGNED NOT NULL COMMENT 'The max number of images per request',
  `limit_upload_user` int(10) UNSIGNED NOT NULL,
  `status_page` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 Offline, 1 Online',
  `message_length` int(11) UNSIGNED NOT NULL,
  `comment_length` int(11) UNSIGNED NOT NULL,
  `registration_active` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 No, 1 Yes',
  `email_verification` enum('0','1') NOT NULL COMMENT '0 Off, 1 On',
  `email_no_reply` varchar(200) NOT NULL,
  `email_admin` varchar(200) NOT NULL,
  `captcha` enum('on','off') NOT NULL DEFAULT 'on',
  `file_size_allowed` int(11) UNSIGNED NOT NULL COMMENT 'Size in Bytes',
  `facebook_login` enum('on','off') NOT NULL DEFAULT 'off',
  `google_analytics` text NOT NULL,
  `invitations_by_email` enum('on','off') NOT NULL DEFAULT 'on',
  `twitter` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `googleplus` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `google_adsense` text NOT NULL,
  `auto_approve_images` enum('on','off') NOT NULL DEFAULT 'off',
  `tags_limit` int(10) UNSIGNED NOT NULL,
  `downloads` enum('all','users') NOT NULL DEFAULT 'all',
  `google_ads_index` enum('on','off') NOT NULL DEFAULT 'off',
  `description_length` int(10) UNSIGNED NOT NULL,
  `min_width_height_image` varchar(25) NOT NULL,
  `google_adsense_index` text NOT NULL,
  `link_privacy` varchar(200) NOT NULL,
  `link_terms` varchar(200) NOT NULL,
  `twitter_login` enum('on','off') NOT NULL DEFAULT 'off',
  `paypal_sandbox` enum('true','false') NOT NULL DEFAULT 'true',
  `paypal_account` varchar(200) NOT NULL,
  `fee_commission` int(10) UNSIGNED NOT NULL,
  `stripe_secret_key` varchar(200) NOT NULL,
  `stripe_public_key` varchar(200) NOT NULL,
  `max_deposits_amount` int(10) UNSIGNED NOT NULL,
  `min_deposits_amount` int(10) UNSIGNED NOT NULL,
  `min_sale_amount` int(10) UNSIGNED NOT NULL,
  `max_sale_amount` int(10) UNSIGNED NOT NULL,
  `enable_paypal` enum('0','1') NOT NULL DEFAULT '0',
  `enable_stripe` enum('0','1') NOT NULL DEFAULT '0',
  `currency_position` enum('left','right') NOT NULL DEFAULT 'left',
  `currency_symbol` varchar(200) NOT NULL,
  `currency_code` varchar(200) NOT NULL,
  `amount_min_withdrawal` int(10) UNSIGNED NOT NULL,
  `sell_option` enum('on','off') NOT NULL DEFAULT 'on',
  `show_images_index` enum('latest','featured','both') NOT NULL DEFAULT 'latest',
  `show_watermark` enum('1','0') NOT NULL DEFAULT '1',
  `file_size_allowed_vector` int(10) UNSIGNED NOT NULL DEFAULT 1024,
  `link_license` varchar(200) NOT NULL,
  `decimal_format` enum('comma','dot') NOT NULL DEFAULT 'dot',
  `version` varchar(5) NOT NULL,
  `title_length` int(10) UNSIGNED NOT NULL,
  `daily_limit_downloads` int(10) UNSIGNED NOT NULL,
  `fee_commission_non_exclusive` int(10) UNSIGNED NOT NULL,
  `who_can_sell` enum('all','admin') NOT NULL DEFAULT 'all',
  `who_can_upload` enum('all','admin') NOT NULL DEFAULT 'all',
  `show_counter` enum('on','off') NOT NULL DEFAULT 'on',
  `show_categories_index` enum('on','off') NOT NULL DEFAULT 'on',
  `free_photo_upload` enum('on','off') NOT NULL DEFAULT 'on',
  `price_formats` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 Manual, 1 Automatic',
  `logo` varchar(100) NOT NULL,
  `logo_light` varchar(200) NOT NULL,
  `favicon` varchar(100) NOT NULL,
  `image_header` varchar(100) NOT NULL,
  `image_bottom` varchar(100) NOT NULL,
  `watermark` varchar(100) NOT NULL,
  `header_colors` varchar(100) NOT NULL,
  `header_cameras` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `img_category` varchar(100) NOT NULL,
  `img_collection` varchar(100) NOT NULL,
  `youtube` varchar(200) NOT NULL,
  `pinterest` varchar(200) NOT NULL,
  `lightbox` enum('on','off') NOT NULL DEFAULT 'on',
  `google_login` enum('on','off') NOT NULL DEFAULT 'off',
  `referral_system` enum('on','off') NOT NULL DEFAULT 'off',
  `maintenance_mode` enum('on','off') NOT NULL DEFAULT 'off',
  `company` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `percentage_referred` int(10) UNSIGNED NOT NULL DEFAULT 5,
  `referral_transaction_limit` char(10) NOT NULL DEFAULT '1',
  `custom_css` text NOT NULL,
  `custom_js` text NOT NULL,
  `color_default` varchar(200) NOT NULL DEFAULT '212529',
  `img_section` varchar(100) NOT NULL,
  `stripe_connect` tinyint(4) NOT NULL DEFAULT 0,
  `payout_method_paypal` tinyint(4) NOT NULL DEFAULT 1,
  `payout_method_bank` tinyint(4) NOT NULL DEFAULT 1,
  `default_price_photos` int(10) UNSIGNED NOT NULL,
  `link_blog` varchar(255) NOT NULL,
  `sevenlabs_api_key` text DEFAULT NULL,
  `signup_bonus_credits` int(11) NOT NULL DEFAULT 100,
  `tax_on_wallet` tinyint(1) NOT NULL DEFAULT 1,
  `comments` tinyint(1) NOT NULL DEFAULT 1,
  `banner_cookies` tinyint(1) NOT NULL DEFAULT 1,
  `stripe_connect_countries` longtext NOT NULL,
  `announcement` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_announcement` char(10) NOT NULL,
  `announcement_cookie` varchar(25) NOT NULL,
  `status_pwa` tinyint(1) NOT NULL DEFAULT 1,
  `popular_plan_color` varchar(20) NOT NULL DEFAULT '#ff3300',
  `extended_license_price` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `announcement_show` varchar(20) NOT NULL DEFAULT 'all',
  `push_notification_status` tinyint(1) NOT NULL DEFAULT 0,
  `onesignal_appid` varchar(150) NOT NULL,
  `onesignal_restapi` varchar(150) NOT NULL,
  `theme` varchar(100) NOT NULL DEFAULT 'light'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `title`, `seo_title`, `seo_description`, `seo_keywords`, `og_title`, `og_description`, `og_image`, `og_type`, `og_site_name`, `twitter_card`, `twitter_site`, `twitter_creator`, `canonical_url`, `robots`, `description`, `welcome_text`, `welcome_subtitle`, `keywords`, `result_request`, `limit_upload_user`, `status_page`, `message_length`, `comment_length`, `registration_active`, `email_verification`, `email_no_reply`, `email_admin`, `captcha`, `file_size_allowed`, `facebook_login`, `google_analytics`, `invitations_by_email`, `twitter`, `facebook`, `googleplus`, `linkedin`, `instagram`, `google_adsense`, `auto_approve_images`, `tags_limit`, `downloads`, `google_ads_index`, `description_length`, `min_width_height_image`, `google_adsense_index`, `link_privacy`, `link_terms`, `twitter_login`, `paypal_sandbox`, `paypal_account`, `fee_commission`, `stripe_secret_key`, `stripe_public_key`, `max_deposits_amount`, `min_deposits_amount`, `min_sale_amount`, `max_sale_amount`, `enable_paypal`, `enable_stripe`, `currency_position`, `currency_symbol`, `currency_code`, `amount_min_withdrawal`, `sell_option`, `show_images_index`, `show_watermark`, `file_size_allowed_vector`, `link_license`, `decimal_format`, `version`, `title_length`, `daily_limit_downloads`, `fee_commission_non_exclusive`, `who_can_sell`, `who_can_upload`, `show_counter`, `show_categories_index`, `free_photo_upload`, `price_formats`, `logo`, `logo_light`, `favicon`, `image_header`, `image_bottom`, `watermark`, `header_colors`, `header_cameras`, `avatar`, `cover`, `img_category`, `img_collection`, `youtube`, `pinterest`, `lightbox`, `google_login`, `referral_system`, `maintenance_mode`, `company`, `country`, `address`, `city`, `zip`, `vat`, `phone`, `percentage_referred`, `referral_transaction_limit`, `custom_css`, `custom_js`, `color_default`, `img_section`, `stripe_connect`, `payout_method_paypal`, `payout_method_bank`, `default_price_photos`, `link_blog`, `sevenlabs_api_key`, `signup_bonus_credits`, `tax_on_wallet`, `comments`, `banner_cookies`, `stripe_connect_countries`, `announcement`, `type_announcement`, `announcement_cookie`, `status_pwa`, `popular_plan_color`, `extended_license_price`, `announcement_show`, `push_notification_status`, `onesignal_appid`, `onesignal_restapi`, `theme`) VALUES
(1, 'SevenLabs', 'AI-Powered Text to Speech Generation', 'Convert text to natural-sounding speech with advanced AI technology. Generate high-quality voice synthesis for content creators, developers, and businesses', 'text to speech,tts,ai voice,voice synthesis,speech generation,voice cloning,ai audio,voice technology', 'AI-Powered Text to Speech Generation', 'Convert text to natural-sounding speech with advanced AI technology. Generate high-quality voice synthesis for content creators, developers, and businesses', NULL, 'website', NULL, 'summary_large_image', NULL, NULL, '', 'index,follow', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tortor rutrum massa efficitur tincidunt vel nec lacus. Curabitur porta aliquet diam, eu gravida neque lacinia in. Praesent eget orci id sem commodo aliquet.', 'Gostock', 'Free and Premium Stock Photos and Videos', 'images free,stock images,stock free images', 12, 10, '1', 180, 180, '1', '1', 'no-reply@gostock.com', 'admin@miguelvasquez.net', 'off', 30720, 'off', '', 'off', 'https://www.twitter.com/', 'https://www.facebook.com/', 'https://plus.google.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '', 'on', 5, 'users', 'off', 160, '1600x900', '', 'https://yousite.com/page/privacy', 'https://yousite.com/page/terms', 'off', 'true', '', 5, '', '', 100, 5, 1, 5, '0', '0', 'left', '$', 'USD', 25, 'on', 'latest', '0', 1024, 'https://yousite.com/page/license', 'dot', '5.6', 50, 0, 70, 'admin', 'admin', 'on', 'on', 'on', '1', 'logo-1759599182.png', 'logo_light-1759599586.png', 'favicon-1759599656.png', 'header_index-1759659615.png', 'cover.jpg', 'watermark-1759600145.png', 'header_colors.jpg', 'header_cameras.jpg', 'default-1759600145.png', 'cover-1759659615.png', 'default-1759600145.png', 'img-collection.jpg', 'https://www.youtube.com/', 'https://www.pinterest.com/', 'on', 'on', 'on', '', 'Gostock, LLC', 'United Kingdom', 'East Street #745, long island avenue', 'London', '5208', 'UK852009971', '', 5, 'unlimited', '', '', '#446ffe', 'img_section-1759638000.png', 0, 1, 1, 0, '', 'eyJhbGciOiJSUzI1NiIsImNhdCI6ImNsX0I3ZDRQRDIyMkFBQSIsImtpZCI6Imluc18ydmlCa3pCZzdVUUJ4eW9FTHh4WmN4Q1FWc0MiLCJ0eXAiOiJKV1QifQ.eyJhenAiOiJodHRwczovL2dlbmFpcHJvLnZuIiwiZXhwIjoxNzY3MzczNTM4LCJpYXQiOjE3NTk1OTc1MzgsImlzcyI6Imh0dHBzOi8vY2xlcmsuZ2VuYWlwcm8udm4iLCJqdGkiOiIxNzk5YWMxNTI0YmE3NGQwNWY0NSIsIm5iZiI6MTc1OTU5NzUzMywicHVibGljX21ldGFkYXRhIjp7ImNoYXRncHRfYWNjb3VudF9pZCI6IjIxYjk0MDNiLTFhZjYtNGY3NC05ZDdhLWI4MjkyMGRhYjZhMSIsInJvbGUiOiJ1c2VyIiwidXNlcl9kYl9pZCI6IjEwN2QyY2FiLWUwMzktNDczOC1iZmY2LWU0NGY3NWQyMWE1OSJ9LCJzdWIiOiJ1c2VyXzMzYnRCSFA1RVZyc1FsNzdSMzZ4dHVWejU2dSIsInVzZXJuYW1lIjoiaGFxaXVsdHJhIn0.2DqObeDsDwISh83_JI1cD8loYDbCtPnl3Ds74SOjIiUDDGaB-crZF2GA-r6fh00hkaRHeCwtKS1Ix-ufcuemFj_lh5KW7elr7253lWzMe9VWmPke0YG2hN8qw96uSu6R1UnTx8P7iFz6x54Q-llZYntOh1OsNIHwa8M0sRudZzW64hG7bJldTZZaagMga9pcnId5cfOtLJmIiZR6mhC2GU-p76eM0A5blCKVi9KCLabj0k2HNmljg4nTxYmKG7SX3bYVLngrnoA8V9ZhKxn3ji3M9abh_mP3vDDCEaU_tUjbXLdka27tqfdL_k6NDvvYEH_wFkTtm-57Slpt4DxBrw', 1000, 1, 1, 1, '', '', '', '', 1, '#ff3300', 10, 'all', 0, '', '', 'dark');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `mode` enum('on','off') NOT NULL DEFAULT 'on',
  `description` text DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `thumbnail`, `mode`, `description`, `keywords`) VALUES
(1, 'Uncategorized', 'uncategorized', '', 'on', NULL, NULL),
(2, 'Animals', 'animals', '', 'on', NULL, NULL),
(3, 'Architecture', 'architecture', '', 'on', NULL, NULL),
(4, 'Foods & Drinks', 'foods-drinks', '', 'on', NULL, NULL),
(5, 'Music', 'music', '', 'on', NULL, NULL),
(6, 'People', 'people', '', 'on', NULL, NULL),
(7, 'Places', 'places', '', 'on', NULL, NULL),
(8, 'Sports', 'sports', '', 'on', NULL, NULL),
(9, 'Travel', 'travel', '', 'on', NULL, NULL),
(10, 'Fashion', 'fashion', '', 'on', NULL, NULL),
(11, 'Transportation / Cars', 'cars', '', 'on', NULL, NULL),
(12, 'Nature / Landscapes', 'nature-landscapes', '', 'on', NULL, NULL),
(13, 'Backgrounds / Textures', 'backgrounds', '', 'on', NULL, NULL),
(14, 'Business / Finance', 'business', '', 'on', NULL, NULL),
(15, 'Computer / Communication', 'computer', '', 'on', NULL, NULL),
(16, 'Education', 'education', '', 'on', NULL, NULL),
(17, 'Emotions', 'emotions', '', 'on', NULL, NULL),
(18, 'Health / Medical', 'health', '', 'on', NULL, NULL),
(19, 'Industry / Craft', 'industry', '', 'on', NULL, NULL),
(20, 'Religion', 'religion', '', 'on', NULL, NULL),
(21, 'Science / Technology', 'science-technology', '', 'on', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` enum('public','private') NOT NULL DEFAULT 'public'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collections_images`
--

CREATE TABLE `collections_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `collections_id` int(10) UNSIGNED NOT NULL,
  `images_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `images_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reply` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 Trash, 1 Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments_likes`
--

CREATE TABLE `comments_likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `comment_id` int(11) UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 trash, 1 active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'US', 'United States'),
(2, 'CA', 'Canada'),
(3, 'AF', 'Afghanistan'),
(4, 'AL', 'Albania'),
(5, 'DZ', 'Algeria'),
(6, 'DS', 'American Samoa'),
(7, 'AD', 'Andorra'),
(8, 'AO', 'Angola'),
(9, 'AI', 'Anguilla'),
(10, 'AQ', 'Antarctica'),
(11, 'AG', 'Antigua and/or Barbuda'),
(12, 'AR', 'Argentina'),
(13, 'AM', 'Armenia'),
(14, 'AW', 'Aruba'),
(15, 'AU', 'Australia'),
(16, 'AT', 'Austria'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BS', 'Bahamas'),
(19, 'BH', 'Bahrain'),
(20, 'BD', 'Bangladesh'),
(21, 'BB', 'Barbados'),
(22, 'BY', 'Belarus'),
(23, 'BE', 'Belgium'),
(24, 'BZ', 'Belize'),
(25, 'BJ', 'Benin'),
(26, 'BM', 'Bermuda'),
(27, 'BT', 'Bhutan'),
(28, 'BO', 'Bolivia'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British lndian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CV', 'Cape Verde'),
(41, 'KY', 'Cayman Islands'),
(42, 'CF', 'Central African Republic'),
(43, 'TD', 'Chad'),
(44, 'CL', 'Chile'),
(45, 'CN', 'China'),
(46, 'CX', 'Christmas Island'),
(47, 'CC', 'Cocos (Keeling) Islands'),
(48, 'CO', 'Colombia'),
(49, 'KM', 'Comoros'),
(50, 'CG', 'Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'ID', 'Indonesia'),
(101, 'IR', 'Iran (Islamic Republic of)'),
(102, 'IQ', 'Iraq'),
(103, 'IE', 'Ireland'),
(104, 'IL', 'Israel'),
(105, 'IT', 'Italy'),
(106, 'CI', 'Ivory Coast'),
(107, 'JM', 'Jamaica'),
(108, 'JP', 'Japan'),
(109, 'JO', 'Jordan'),
(110, 'KZ', 'Kazakhstan'),
(111, 'KE', 'Kenya'),
(112, 'KI', 'Kiribati'),
(113, 'KP', 'Korea, Democratic People\'s Republic of'),
(114, 'KR', 'Korea, Republic of'),
(115, 'XK', 'Kosovo'),
(116, 'KW', 'Kuwait'),
(117, 'KG', 'Kyrgyzstan'),
(118, 'LA', 'Lao People\'s Democratic Republic'),
(119, 'LV', 'Latvia'),
(120, 'LB', 'Lebanon'),
(121, 'LS', 'Lesotho'),
(122, 'LR', 'Liberia'),
(123, 'LY', 'Libyan Arab Jamahiriya'),
(124, 'LI', 'Liechtenstein'),
(125, 'LT', 'Lithuania'),
(126, 'LU', 'Luxembourg'),
(127, 'MO', 'Macau'),
(128, 'MK', 'Macedonia'),
(129, 'MG', 'Madagascar'),
(130, 'MW', 'Malawi'),
(131, 'MY', 'Malaysia'),
(132, 'MV', 'Maldives'),
(133, 'ML', 'Mali'),
(134, 'MT', 'Malta'),
(135, 'MH', 'Marshall Islands'),
(136, 'MQ', 'Martinique'),
(137, 'MR', 'Mauritania'),
(138, 'MU', 'Mauritius'),
(139, 'TY', 'Mayotte'),
(140, 'MX', 'Mexico'),
(141, 'FM', 'Micronesia, Federated States of'),
(142, 'MD', 'Moldova, Republic of'),
(143, 'MC', 'Monaco'),
(144, 'MN', 'Mongolia'),
(145, 'ME', 'Montenegro'),
(146, 'MS', 'Montserrat'),
(147, 'MA', 'Morocco'),
(148, 'MZ', 'Mozambique'),
(149, 'MM', 'Myanmar'),
(150, 'NA', 'Namibia'),
(151, 'NR', 'Nauru'),
(152, 'NP', 'Nepal'),
(153, 'NL', 'Netherlands'),
(154, 'AN', 'Netherlands Antilles'),
(155, 'NC', 'New Caledonia'),
(156, 'NZ', 'New Zealand'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'Niger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Norfork Island'),
(162, 'MP', 'Northern Mariana Islands'),
(163, 'NO', 'Norway'),
(164, 'OM', 'Oman'),
(165, 'PK', 'Pakistan'),
(166, 'PW', 'Palau'),
(167, 'PA', 'Panama'),
(168, 'PG', 'Papua New Guinea'),
(169, 'PY', 'Paraguay'),
(170, 'PE', 'Peru'),
(171, 'PH', 'Philippines'),
(172, 'PN', 'Pitcairn'),
(173, 'PL', 'Poland'),
(174, 'PT', 'Portugal'),
(175, 'PR', 'Puerto Rico'),
(176, 'QA', 'Qatar'),
(177, 'RE', 'Reunion'),
(178, 'RO', 'Romania'),
(179, 'RU', 'Russian Federation'),
(180, 'RW', 'Rwanda'),
(181, 'KN', 'Saint Kitts and Nevis'),
(182, 'LC', 'Saint Lucia'),
(183, 'VC', 'Saint Vincent and the Grenadines'),
(184, 'WS', 'Samoa'),
(185, 'SM', 'San Marino'),
(186, 'ST', 'Sao Tome and Principe'),
(187, 'SA', 'Saudi Arabia'),
(188, 'SN', 'Senegal'),
(189, 'RS', 'Serbia'),
(190, 'SC', 'Seychelles'),
(191, 'SL', 'Sierra Leone'),
(192, 'SG', 'Singapore'),
(193, 'SK', 'Slovakia'),
(194, 'SI', 'Slovenia'),
(195, 'SB', 'Solomon Islands'),
(196, 'SO', 'Somalia'),
(197, 'ZA', 'South Africa'),
(198, 'GS', 'South Georgia South Sandwich Islands'),
(199, 'ES', 'Spain'),
(200, 'LK', 'Sri Lanka'),
(201, 'SH', 'St. Helena'),
(202, 'PM', 'St. Pierre and Miquelon'),
(203, 'SD', 'Sudan'),
(204, 'SR', 'Suriname'),
(205, 'SJ', 'Svalbarn and Jan Mayen Islands'),
(206, 'SZ', 'Swaziland'),
(207, 'SE', 'Sweden'),
(208, 'CH', 'Switzerland'),
(209, 'SY', 'Syrian Arab Republic'),
(210, 'TW', 'Taiwan'),
(211, 'TJ', 'Tajikistan'),
(212, 'TZ', 'Tanzania, United Republic of'),
(213, 'TH', 'Thailand'),
(214, 'TG', 'Togo'),
(215, 'TK', 'Tokelau'),
(216, 'TO', 'Tonga'),
(217, 'TT', 'Trinidad and Tobago'),
(218, 'TN', 'Tunisia'),
(219, 'TR', 'Turkey'),
(220, 'TM', 'Turkmenistan'),
(221, 'TC', 'Turks and Caicos Islands'),
(222, 'TV', 'Tuvalu'),
(223, 'UG', 'Uganda'),
(224, 'UA', 'Ukraine'),
(225, 'AE', 'United Arab Emirates'),
(226, 'GB', 'United Kingdom'),
(227, 'UM', 'United States minor outlying islands'),
(228, 'UY', 'Uruguay'),
(229, 'UZ', 'Uzbekistan'),
(230, 'VU', 'Vanuatu'),
(231, 'VA', 'Vatican City State'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Virgin Islands (British)'),
(235, 'VI', 'Virgin Islands (U.S.)'),
(236, 'WF', 'Wallis and Futuna Islands'),
(237, 'EH', 'Western Sahara'),
(238, 'YE', 'Yemen'),
(239, 'YU', 'Yugoslavia'),
(240, 'ZR', 'Zaire'),
(241, 'ZM', 'Zambia'),
(242, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `txn_id` varchar(200) DEFAULT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `payment_gateway` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','pending') NOT NULL DEFAULT 'active',
  `screenshot_transfer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `follower` int(11) UNSIGNED NOT NULL,
  `following` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 Delete, 1 Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `preview` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','pending') NOT NULL DEFAULT 'pending',
  `token_id` varchar(255) NOT NULL,
  `tags` longtext DEFAULT NULL,
  `extension` varchar(25) NOT NULL,
  `colors` text NOT NULL,
  `exif` varchar(255) NOT NULL,
  `camera` varchar(255) NOT NULL,
  `featured` enum('yes','no') NOT NULL DEFAULT 'no',
  `featured_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `how_use_image` enum('free','free_personal','editorial_only','web_only') NOT NULL DEFAULT 'free',
  `attribution_required` enum('yes','no') NOT NULL DEFAULT 'no',
  `original_name` varchar(255) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `item_for_sale` enum('free','sale') NOT NULL DEFAULT 'free',
  `vector` varchar(3) NOT NULL,
  `data_iptc` tinyint(1) NOT NULL DEFAULT 0,
  `date_time_original` varchar(50) DEFAULT NULL,
  `subcategories_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images_reporteds`
--

CREATE TABLE `images_reporteds` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) UNSIGNED NOT NULL,
  `reason` enum('copyright','privacy_issue','violent_sexual_content') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `purchases_id` int(10) UNSIGNED DEFAULT NULL,
  `subscriptions_id` int(10) UNSIGNED DEFAULT NULL,
  `deposits_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `percentage_applied` varchar(50) NOT NULL,
  `transaction_fee` double(10,2) DEFAULT NULL,
  `taxes` text DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `abbreviation` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `abbreviation`) VALUES
(1, 'English', 'en'),
(3, 'Español', 'es');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `images_id` int(11) UNSIGNED NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '1' COMMENT '0 trash, 1 active',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2025_10_04_135156_add_sevenlabs_api_key_to_admin_settings_table', 1),
('2025_10_04_145437_update_sevenlabs_api_key_column_length', 2),
('2025_10_05_011813_add_signup_bonus_credits_to_admin_settings_table', 3),
('2025_10_05_012521_rename_funds_to_credits_in_users_table', 4),
('2025_10_05_042853_convert_plans_to_credit_system', 5),
('2025_10_05_045541_create_user_tasks_table', 6),
('2025_10_05_051605_add_model_to_user_tasks_table', 7),
('2025_10_05_052505_simplify_user_tasks_table', 8),
('2025_10_05_060638_add_seo_fields_to_admin_settings', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `destination` int(10) UNSIGNED NOT NULL,
  `author` int(10) UNSIGNED NOT NULL,
  `target` int(10) UNSIGNED NOT NULL,
  `type` int(10) UNSIGNED NOT NULL COMMENT '1 Follow, 2  Like, 3 reply, 4 Like Comment',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 unseen, 1 seen',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `trash` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''0 No'',''1Yes'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(100) NOT NULL,
  `lang` char(10) NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `slug`, `lang`) VALUES
(2, 'Terms', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets</p>\r\n', 'terms-of-service', 'en'),
(3, 'Privacy', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n', 'privacy', 'en'),
(5, 'About', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n', 'about', 'en'),
(10, 'Help', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'help', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `token` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(255) NOT NULL,
  `enabled` enum('1','0') NOT NULL DEFAULT '1',
  `sandbox` enum('true','false') NOT NULL DEFAULT 'true',
  `fee` decimal(3,1) NOT NULL,
  `fee_cents` decimal(6,2) NOT NULL,
  `email` varchar(80) NOT NULL,
  `token` varchar(200) NOT NULL,
  `key` varchar(255) NOT NULL,
  `key_secret` varchar(255) NOT NULL,
  `webhook_secret` varchar(255) NOT NULL,
  `subscription` tinyint(3) UNSIGNED NOT NULL,
  `logo` varchar(100) NOT NULL,
  `bank_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `name`, `type`, `enabled`, `sandbox`, `fee`, `fee_cents`, `email`, `token`, `key`, `key_secret`, `webhook_secret`, `subscription`, `logo`, `bank_info`) VALUES
(1, 'PayPal', 'normal', '0', 'true', 5.4, 0.30, '', '02bGGfD9bHevK3eJN06CdDvFSTXsTrTG44yGdAONeN1R37jqnLY1PuNF0mJRoFnsEygyf28yePSCA1eR0alQk4BX89kGG9Rlha2D2KX55TpDFNR5o774OshrkHSZLOFo2fAhHzcWKnwsYDFKgwuaRg', '', '', '', 1, 'paypal.png', ''),
(2, 'Stripe', 'card', '0', 'false', 2.9, 0.30, '', 'asfQSGRvYzS1P0X745krAAyHeU7ZbTpHbYKnxI2abQsBUi48EpeAu5lFAU2iBmsUWO5tpgAn9zzussI4Cce5ZcANIAmfBz0bNR9g3UfR4cserhkJwZwPsETiXiZuCixXVDHhCItuXTPXXSA6KITEoT', '', '', '', 1, 'stripe.png', ''),
(3, 'Bank', 'bank', '0', 'true', 0.0, 0.00, '', 'B2wryLYDTxC38N5L7p6AsKdcBNFZPRrSrETqClm7L4ybeCvfGMpYpg2koyUiPlpLI8CATD0LsZHFi5rjpPBmMDNY7RnfHd1ESqk95Rn1SWmGi0qbJ9fUa8cAvjFz2ZCXILP2nxexBWKuKxvwadU0or', '', '', '', 0, 'bank.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` char(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_year` decimal(10,2) NOT NULL,
  `credits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `duration` enum('month','year') NOT NULL DEFAULT 'month',
  `unused_credits_rollover` tinyint(1) NOT NULL DEFAULT 0,
  `unused_downloads_rollover` tinyint(4) NOT NULL DEFAULT 0,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_id`, `name`, `price`, `price_year`, `credits`, `duration`, `unused_credits_rollover`, `unused_downloads_rollover`, `status`, `created_at`, `updated_at`) VALUES
(1, '966da97fe2', 'Starter', 100.00, 1000.00, 100000, 'month', 1, 0, '1', '2025-10-05 04:32:32', '2025-10-05 04:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `txn_id` varchar(250) NOT NULL,
  `images_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved` enum('0','1') NOT NULL DEFAULT '1',
  `earning_net_seller` decimal(10,2) NOT NULL,
  `earning_net_admin` decimal(10,2) NOT NULL,
  `payment_gateway` varchar(100) DEFAULT NULL,
  `type` varchar(25) NOT NULL,
  `license` varchar(25) NOT NULL,
  `order_id` varchar(25) NOT NULL,
  `purchase_code` varchar(40) NOT NULL,
  `mode` varchar(255) NOT NULL DEFAULT 'normal',
  `percentage_applied` varchar(50) NOT NULL,
  `referred_commission` int(10) UNSIGNED NOT NULL,
  `taxes` text DEFAULT NULL,
  `direct_payment` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `referred_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_transactions`
--

CREATE TABLE `referral_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referrals_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `referred_by` int(10) UNSIGNED NOT NULL,
  `earnings` double(10,2) NOT NULL,
  `type` char(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) UNSIGNED NOT NULL,
  `comment_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reply` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 Trash, 1 Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`id`, `name`) VALUES
(14, 'account'),
(31, 'api'),
(2, 'app'),
(30, 'bootstrap'),
(34, 'categories'),
(36, 'collections'),
(29, 'comment'),
(25, 'contact'),
(41, 'core'),
(35, 'featured'),
(38, 'feed'),
(32, 'freebies'),
(9, 'goods'),
(1, 'gostock1'),
(11, 'jobs'),
(21, 'join'),
(44, 'lang'),
(16, 'latest'),
(37, 'likes'),
(20, 'login'),
(33, 'logout'),
(27, 'members'),
(13, 'messages'),
(19, 'notifications'),
(15, 'popular'),
(6, 'porn'),
(43, 'pricing'),
(26, 'programs'),
(12, 'projects'),
(3, 'public'),
(23, 'register'),
(17, 'search'),
(7, 'sex'),
(8, 'tags'),
(42, 'update'),
(24, 'upgrade'),
(28, 'upload'),
(4, 'vendor'),
(5, 'xxx');

-- --------------------------------------------------------

--
-- Table structure for table `roles_and_permissions`
--

CREATE TABLE `roles_and_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `permissions` longtext NOT NULL,
  `editable` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_and_permissions`
--

INSERT INTO `roles_and_permissions` (`id`, `name`, `permissions`, `editable`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'full_access', '0', '2022-02-10 23:45:46', '2022-02-10 23:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countries_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` char(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(10) UNSIGNED NOT NULL,
  `images_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('small','medium','large','vector') NOT NULL,
  `extension` varchar(25) NOT NULL,
  `resolution` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stripe_state_tokens`
--

CREATE TABLE `stripe_state_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `mode` enum('on','off') NOT NULL DEFAULT 'on',
  `description` text DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `paypal_id` varchar(255) DEFAULT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_status` varchar(255) NOT NULL,
  `stripe_price` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_payment` varchar(255) DEFAULT NULL,
  `cancelled` enum('yes','no') NOT NULL DEFAULT 'no',
  `rebill_wallet` enum('on','off') NOT NULL DEFAULT 'off',
  `interval` varchar(100) NOT NULL DEFAULT 'monthly',
  `taxes` text DEFAULT NULL,
  `payment_gateway` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_product` varchar(255) DEFAULT NULL,
  `stripe_price` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_rates`
--

CREATE TABLE `tax_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `percentage` decimal(5,2) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `iso_state` char(10) DEFAULT NULL,
  `stripe_id` varchar(100) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `two_factor_codes`
--

CREATE TABLE `two_factor_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `countries_id` char(25) NOT NULL,
  `password` char(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(70) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `status` enum('pending','active','suspended','delete') NOT NULL DEFAULT 'pending',
  `type_account` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 Buyer, 2 Seller',
  `role` int(10) UNSIGNED NOT NULL,
  `website` varchar(255) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `google` varchar(200) NOT NULL,
  `paypal_account` varchar(200) NOT NULL,
  `activation_code` varchar(150) NOT NULL,
  `oauth_uid` varchar(200) DEFAULT NULL,
  `oauth_provider` varchar(200) DEFAULT NULL,
  `token` varchar(80) NOT NULL,
  `authorized_to_upload` enum('yes','no') NOT NULL DEFAULT 'yes',
  `instagram` varchar(200) NOT NULL,
  `credits` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `payment_gateway` varchar(50) NOT NULL,
  `bank` text NOT NULL,
  `ip` varchar(30) NOT NULL,
  `author_exclusive` enum('yes','no') NOT NULL DEFAULT 'no',
  `two_factor_auth` enum('yes','no') NOT NULL DEFAULT 'no',
  `stripe_connect_id` varchar(255) DEFAULT NULL,
  `completed_stripe_onboarding` tinyint(1) NOT NULL DEFAULT 0,
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `downloads` int(10) UNSIGNED NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `bio`, `countries_id`, `password`, `email`, `date`, `avatar`, `cover`, `status`, `type_account`, `role`, `website`, `remember_token`, `twitter`, `facebook`, `google`, `paypal_account`, `activation_code`, `oauth_uid`, `oauth_provider`, `token`, `authorized_to_upload`, `instagram`, `credits`, `balance`, `payment_gateway`, `bank`, `ip`, `author_exclusive`, `two_factor_auth`, `stripe_connect_id`, `completed_stripe_onboarding`, `stripe_id`, `pm_type`, `pm_last_four`, `downloads`, `trial_ends_at`) VALUES
(1, 'Admin', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tortor rutrum massa efficitur tincidunt vel nec lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tortor ru', '1', '$2y$10$wjbCfnJZ07JcBEb4aGD58.Urd0yAFfHsAyofPE3w9W61y05MgZBJa', 'admin@example.com', '2022-02-20 10:17:44', 'default-1759600145.png', 'cover-1759659615.png', 'active', '1', 1, '', 'PZAx7iHfbyMCntCOM8V561uZFwnheywBCYah1BnVjK3w9HK951GiazfJpcTa', '', '', '', '', '', NULL, NULL, '', 'yes', '', 410.00, 50.00, '', '', '', 'yes', 'no', NULL, 0, NULL, NULL, NULL, 0, NULL),
(6, '0d1fcaca', 'Haqi Ultra', '', '165', '', 'haqiultra@gmail.com', '2025-10-05 05:50:06', '1759657806115412332639789725040.jpg', 'cover.jpg', 'active', '1', 0, '', '', '', '', '', '', '', '115412332639789725040', 'google', 'eSHlTfsbP2pat5El9NYUpFQe72D61fcFSpnXykOb0JMZ2LVmJK6uLby7pVobweZmq9qjx3qNfvk', 'no', '', 1000.00, 0.00, '', '', '2404:3100:1c20:1f79:25b5:403e:', 'no', 'no', NULL, 0, NULL, NULL, NULL, 0, NULL),
(7, 'Haqi', '', '', '165', '$2y$10$hcdh7gkXTq.IkEjaaZ7ZNe9G4erbTk5snlwxn7ghgM0aFKflImCJS', 'haqiultr.a@gmail.com', '2025-10-05 05:55:32', 'default-1759600145.png', 'cover-1759659615.png', 'active', '1', 0, '', 'ISWsbSQkyNhALquFEmGitSiexnpyMuE2zVM0d9NePqcG9GQffWc87GtMLcO0', '', '', '', '', '', '', '', 'hN9SJBTqSGRRuls6uCmWvce17ZlOL6OQNjSUSYz28gkhnalqkH9z15kINpJbeVbv7G3nIaxBtFF', 'yes', '', 1000.00, 0.00, '', '', '2404:3100:1c20:1f79:25b5:403e:', 'no', 'no', NULL, 0, NULL, NULL, NULL, 0, NULL),
(8, 'f9857945', 'eleven lab', '', '165', '', 'lab23464@gmail.com', '2025-10-06 11:26:14', '1759764374113437691128713567641.jpg', 'cover.jpg', 'active', '1', 0, '', '', '', '', '', '', '', '113437691128713567641', 'google', 'tjCGsoROEIuluRYvT1YYogVFU7MZYIYhpH9pypNI03GFhtEeAQbqGFipYTIiCQZHuppLRrJVI25', 'yes', '', 1000.00, 0.00, '', '', '223.123.88.210', 'no', 'no', NULL, 0, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_reporteds`
--

CREATE TABLE `users_reporteds` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` enum('copyright','privacy_issue','violent_sexual_content','spoofing') NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `id_reported` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_credits`
--

CREATE TABLE `user_credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `credits` int(11) NOT NULL DEFAULT 0,
  `used_credits` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE `user_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` varchar(255) NOT NULL,
  `device_type` char(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tasks`
--

CREATE TABLE `user_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `credits_used` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_tasks`
--

INSERT INTO `user_tasks` (`id`, `task_id`, `user_id`, `credits_used`, `created_at`, `updated_at`) VALUES
(1, 'fec5cde6-b779-4b9f-88e2-a67f14537c7e', 5, 44, '2025-10-05 05:13:53', '2025-10-05 05:13:53'),
(2, 'ca93e6cf-7480-4f87-a07d-5ba0b91eca56', 5, 76, '2025-10-05 05:20:34', '2025-10-05 05:20:34'),
(3, '1a832bb3-ffc4-4175-9c3e-7db386d310ed', 5, 44, '2025-10-05 05:41:22', '2025-10-05 05:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','paid') NOT NULL DEFAULT 'pending',
  `amount` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gateway` varchar(100) NOT NULL,
  `account` text NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `collections_images`
--
ALTER TABLE `collections_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_id` (`collections_id`,`images_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post` (`images_id`,`user_id`,`status`);

--
-- Indexes for table `comments_likes`
--
ALTER TABLE `comments_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`comment_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publicacion_id` (`images_id`),
  ADD KEY `usr_id` (`user_id`),
  ADD KEY `ip` (`ip`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follower` (`follower`,`following`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token_id` (`token_id`),
  ADD KEY `author_id` (`user_id`,`status`,`token_id`),
  ADD KEY `image` (`preview`),
  ADD KEY `category_id` (`categories_id`),
  ADD KEY `subcategories_id` (`subcategories_id`);
ALTER TABLE `images` ADD FULLTEXT KEY `title` (`title`,`tags`);

--
-- Indexes for table `images_reporteds`
--
ALTER TABLE `images_reporteds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`,`image_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_index` (`user_id`),
  ADD KEY `invoices_purchases_id_index` (`purchases_id`),
  ADD KEY `invoices_subscriptions_id_index` (`subscriptions_id`),
  ADD KEY `invoices_deposits_id_index` (`deposits_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usr` (`user_id`,`images_id`,`status`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination` (`destination`,`author`,`target`,`status`),
  ADD KEY `trash` (`trash`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hash` (`token`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plan_id` (`plan_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrals_user_id_index` (`user_id`),
  ADD KEY `referrals_referred_by_index` (`referred_by`);

--
-- Indexes for table `referral_transactions`
--
ALTER TABLE `referral_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referral_transactions_referrals_id_index` (`referrals_id`),
  ADD KEY `referral_transactions_user_id_index` (`user_id`),
  ADD KEY `referral_transactions_referred_by_index` (`referred_by`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post` (`comment_id`,`user_id`,`status`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING BTREE;

--
-- Indexes for table `roles_and_permissions`
--
ALTER TABLE `roles_and_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `roles_and_permissions_permissions_index` (`permissions`(768));

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_countries_id_index` (`countries_id`),
  ADD KEY `name` (`name`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_shot` (`images_id`,`type`),
  ADD KEY `token` (`token`);

--
-- Indexes for table `stripe_state_tokens`
--
ALTER TABLE `stripe_state_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`(191)),
  ADD KEY `last_payment` (`last_payment`(191));

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_id` (`subscription_id`);

--
-- Indexes for table `tax_rates`
--
ALTER TABLE `tax_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `two_factor_codes`
--
ALTER TABLE `two_factor_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `username` (`username`,`status`),
  ADD KEY `activation_code` (`activation_code`),
  ADD KEY `users_avatar_index` (`avatar`),
  ADD KEY `users_cover_index` (`cover`),
  ADD KEY `role_id` (`role`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `users_reporteds`
--
ALTER TABLE `users_reporteds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`,`id_reported`);

--
-- Indexes for table `user_credits`
--
ALTER TABLE `user_credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_devices_player_id_unique` (`player_id`);

--
-- Indexes for table `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publicacion_id` (`images_id`),
  ADD KEY `usr_id` (`user_id`),
  ADD KEY `ip` (`ip`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collections_images`
--
ALTER TABLE `collections_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments_likes`
--
ALTER TABLE `comments_likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images_reporteds`
--
ALTER TABLE `images_reporteds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_transactions`
--
ALTER TABLE `referral_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `roles_and_permissions`
--
ALTER TABLE `roles_and_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stripe_state_tokens`
--
ALTER TABLE `stripe_state_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_rates`
--
ALTER TABLE `tax_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `two_factor_codes`
--
ALTER TABLE `two_factor_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_reporteds`
--
ALTER TABLE `users_reporteds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_credits`
--
ALTER TABLE `user_credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_devices`
--
ALTER TABLE `user_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tasks`
--
ALTER TABLE `user_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
