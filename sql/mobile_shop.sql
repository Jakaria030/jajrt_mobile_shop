-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 05:17 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `email`, `password`, `datentime`) VALUES
(1, 'admin@gmail.com', '1111', '2024-03-05 08:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(10, 'IMG_99520.jpg'),
(11, 'IMG_69631.jpg'),
(17, 'IMG_58607.jpg'),
(18, 'IMG_84059.jpg'),
(19, 'IMG_21649.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL,
  `mobile_name` varchar(150) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `category`, `mobile_name`, `datentime`) VALUES
(2, 'iPhone', 'iPhone 15 pro max', '2024-03-09 11:38:25'),
(3, 'Redmi', 'Redmi Note 12 4G', '2024-03-09 11:40:57'),
(4, 'Samsung', 'Galaxy S24 Ultra', '2024-03-09 12:05:02'),
(6, 'OnePlus', 'OnePlus 10 Pro', '2024-03-09 19:54:25'),
(7, 'Redmi', 'Redmi Note 13 Pro 4G', '2024-03-09 19:55:30'),
(8, 'Vivo', 'vivo iQOO Neo9', '2024-03-09 19:56:03'),
(9, 'Honor', 'Honor X7b', '2024-03-09 19:56:41'),
(10, 'Oppo', 'Oppo A58 4G', '2024-03-09 19:57:18'),
(11, 'iPhone', 'iPhone 13', '2024-03-09 19:58:06'),
(12, 'iPhone', 'iPhone 11', '2024-03-09 19:59:24'),
(13, 'Nokia', 'Nokia G10', '2024-03-09 20:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `sr_no` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`sr_no`, `v_id`, `u_id`, `comment`, `datentime`, `seen`) VALUES
(3, 14, 3, 'Hello, Nice iphone.', '2024-03-07 22:46:59', 0),
(5, 14, 1, 'Hi, Wow nice phone.', '2024-03-07 23:09:02', 0),
(7, 2, 1, 'Hi, Wow nice phone.', '2024-03-08 00:14:39', 1),
(8, 2, 3, 'Very nice phone', '2024-03-08 00:35:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `phn1` bigint(20) NOT NULL,
  `phn2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `iframe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `phn1`, `phn2`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, 'XYZ, Gopalganj, Bangladesh.', 'https://shorturl.at/bqyQ8', 1725490784, 1865332423, 'admin@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://twitter.com/', 'https://shorturl.at/bcAW7');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `mobile_name` varchar(350) NOT NULL,
  `b_model` varchar(350) NOT NULL,
  `b_quantity` int(11) NOT NULL,
  `b_price` int(11) NOT NULL,
  `b_profile` varchar(350) NOT NULL,
  `small_description` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `warranty` varchar(150) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `p_build` varchar(350) NOT NULL,
  `p_weight` varchar(350) NOT NULL,
  `p_dimensions` varchar(350) NOT NULL,
  `n_sim` varchar(350) NOT NULL,
  `n_speed` varchar(350) NOT NULL,
  `n_2g_bands` varchar(350) NOT NULL,
  `n_3g_bands` varchar(350) NOT NULL,
  `n_4g_bands` varchar(350) NOT NULL,
  `n_5g_bands` varchar(350) NOT NULL,
  `d_size` varchar(350) NOT NULL,
  `d_type` varchar(350) NOT NULL,
  `d_resolution` varchar(350) NOT NULL,
  `p_cpu` varchar(350) NOT NULL,
  `p_gpu` varchar(350) NOT NULL,
  `p_chipset` varchar(350) NOT NULL,
  `m_internal` varchar(350) NOT NULL,
  `m_card_slot` varchar(350) NOT NULL,
  `m_video` varchar(350) NOT NULL,
  `m_triple` varchar(350) NOT NULL,
  `m_features` varchar(350) NOT NULL,
  `s_video` varchar(350) NOT NULL,
  `s_single` varchar(350) NOT NULL,
  `s_features` varchar(350) NOT NULL,
  `o_os` varchar(350) NOT NULL,
  `c_nfc` varchar(350) NOT NULL,
  `c_usb` varchar(350) NOT NULL,
  `c_radio` varchar(350) NOT NULL,
  `c_wifi` varchar(350) NOT NULL,
  `c_bluetooth` varchar(350) NOT NULL,
  `c_jack` varchar(350) NOT NULL,
  `f_sensors` varchar(350) NOT NULL,
  `b_type` varchar(350) NOT NULL,
  `b_charging` varchar(350) NOT NULL,
  `t_performance` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `mobile_name`, `b_model`, `b_quantity`, `b_price`, `b_profile`, `small_description`, `description`, `warranty`, `datentime`, `p_build`, `p_weight`, `p_dimensions`, `n_sim`, `n_speed`, `n_2g_bands`, `n_3g_bands`, `n_4g_bands`, `n_5g_bands`, `d_size`, `d_type`, `d_resolution`, `p_cpu`, `p_gpu`, `p_chipset`, `m_internal`, `m_card_slot`, `m_video`, `m_triple`, `m_features`, `s_video`, `s_single`, `s_features`, `o_os`, `c_nfc`, `c_usb`, `c_radio`, `c_wifi`, `c_bluetooth`, `c_jack`, `f_sensors`, `b_type`, `b_charging`, `t_performance`) VALUES
(3, 'iPhone 15 pro max', 'iPhone-15', 500, 143000, 'IMG_11887.webp', 'Natural Titanium | 256GB | USA', 'The iPhone 15 Pro Max is the most powerful and advanced iPhone yet, with a stunning Super Retina XDR display with ProMotion, the powerful A17 Bionic chip, an advanced Pro-Grade Camera System for stunning results.', '10 Days Replacement & 2 Years Service Warranty', '2024-03-09 20:22:29', 'Glass front (Corning-made glass), glass back (Corning-made glass), titanium frame (grade 5)', '221 g (7.80 oz)', '159.9 x 76.7 x 8.3 mm (6.30 x 3.02 x 0.33 in)', 'Nano-SIM and eSIM - International Dual eSIM with multiple numbers - USA Dual SIM (Nano-SIM, dual stand-by) - China IP68 dust/water resistant (up to 6m for 30 min) Apple Pay (Visa, MasterCard, AMEX certified)', 'HSPA, LTE-A, 5G, EV-DO Rev.A 3.1 Mbps', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 &amp; SIM 2 (dual-SIM) CDMA 800 / 1900', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 CDMA2000 1xEV-DO', '1, 2, 3, 4, 5, 7, 8, 12, 13, 17, 18, 19, 20, 25, 26, 28, 30, 32, 34, 38, 39, 40, 41, 42, 46, 48, 53, 66 - A3106 1', '1, 2, 3, 5, 7, 8, 12, 20, 25, 26, 28, 30, 38, 40, 41, 48, 53, 66, 70, 77, 78, 79 SA/NSA/Sub6 - A3106', '6.7 inches, 110.2 cm2 (~89.8% screen-to-body ratio)', 'LTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM)', '1290 x 2796 pixels, 19.5:9 ratio (~460 ppi density)', 'Hexa-core (2x3.78 GHz + 4x2.11 GHz)', 'Apple GPU (6-core graphics)', 'Apple A17 Pro (3 nm)', '256GB 8GB RAM, 512GB 8GB RAM, 1TB 8GB RAM NVMe', 'No', '4K@24/25/30/60fps, 1080p@25/30/60/120/240fps, 10-bit HDR, Dolby Vision HDR (up to 60fps), ProRes, Cinematic mode (4K@24/30fps), 3D (spatial) video, stereo sound rec.', '48 MP, f/1.8, 24mm (wide), 1/1.28&quot;, 1.22µm, dual pixel PDAF, sensor-shift OIS 12 MP, f/2.8, 120mm (periscope telephoto), 1/3.06&quot;, 1.12µm, dual pixel PDAF, 3D sensor‑shift OIS, 5x optical zoom 12 MP, f/2.2, 13mm, 120˚ (ultrawide), 1/2.55&quot;, 1.4µm, dual pixel PDAF TOF 3D LiDAR scanner (depth)', 'Dual-LED dual-tone flash, HDR (photo/panorama)', '4K@24/25/30/60fps, 1080p@25/30/60/120fps, gyro-EIS', '12 MP, f/1.9, 23mm (wide), 1/3.6&quot;, PDAF, OIS SL 3D, (depth/biometrics sensor)', 'HDR, Cinematic mode (4K@24/30fps)', 'iOS 17, upgradable to iOS 17.0.3', 'Yes', 'USB Type-C 3.2 Gen 2, DisplayPort', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6e, dual-band, hotspot', '5.3, A2DP, LE', 'No', 'Face ID, accelerometer, gyro, proximity, compass, barometer Ultra Wideband 2 (UWB) support Emergency SOS via satellite (SMS sending/receiving)', 'Li-Ion 4441 mAh, non-removable', 'Wired, PD2.0, 50% in 30 min (advertised) 15W wireless (MagSafe) 7.5W wireless (Qi) 4.5W reverse wired', 'AnTuTu: 1487203 (v10) GeekBench: 7237 (v6.0)'),
(4, 'Redmi Note 12 4G', 'Redmi-12', 400, 15000, 'IMG_50605.webp', 'Onyx Gray | 6/64GB | Indian', 'Redmi Note 12 4G is a budget-friendly smartphone with a large 6.67-inch AMOLED display, a powerful Snapdragon 685 processor, a triple camera system with a 50MP main sensor, and a long-lasting 5000mAh battery.', '10 Days Replacement & 2 Years Service Warranty', '2024-03-09 20:28:22', 'Glass front (Gorilla Glass 3), plastic frame, plastic back', '183.5 g (6.49 oz)', '165.7 x 76 x 7.9 mm (6.52 x 2.99 x 0.31 in)', 'Dual SIM (Nano-SIM, dual stand-by) IP53, dust and splash resistant', 'HSPA, LTE-A, 5G', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 &amp; SIM 2', 'HSDPA 850 / 900 / 2100', '1, 3, 5, 7, 8, 20, 28, 38, 40, 41', 'No', '6.67 inches, 107.4 cm2 (~85.3% screen-to-body ratio)', 'AMOLED, 120Hz, 450 nits (typ), 700 nits (HBM), 1200 nits (peak)', '1080 x 2400 pixels, 20:9 ratio (~395 ppi density)', 'Octa-core (4x2.8 GHz Cortex-A73 &amp; 4x1.9 GHz Cortex-A53)', 'Adreno 610', 'Qualcomm SM6225 Snapdragon 685 (6 nm)', '64GB 4GB RAM, 64GB 6GB RAM, 128GB 4GB RAM, 128GB 6GB RAM, 128GB 8GB RAM UFS 2.2', 'microSDXC (dedicated slot)', '1080p@30fps', '50 MP, f/1.8, (wide), 1/2.76&quot;, 0.64µm, PDAF 8 MP, f/2.2, 120˚ (ultrawide), 1/4&quot;, 1.12µm 2 MP, f/2.4, (macro)', 'LED flash, HDR, panorama', '1080p@30fps', '13 MP, f/2.5, (wide), 1/3.0&quot;', 'HDR', 'Android 13, MIUI 14', 'Yes (market/region dependent)', 'USB Type-C 2.0, OTG', 'Unspecified', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band', '5.0, A2DP, LE', 'Yes', 'Fingerprint (side-mounted), accelerometer, gyro, proximity, compass', 'Li-Po 5000 mAh, non-removable', '33W wired', 'AnTuTu: 319219 (v9) GeekBench: 1797 (v5.1), 1341 (v6) GFXBench: 7.5fps (ES 3.1 onscreen)'),
(5, 'Galaxy S24 Ultra', 'Galaxy-S24', 300, 134000, 'IMG_67483.webp', 'Titanium Black | 256GB', 'Samsung Galaxy S24 Ultra is the latest and greatest flagship phone from Samsung, and it\'s packed with features that are sure to impress even the most demanding users. It has a gorgeous 6.8-inch Dynamic LTPO AMOLED 2X display with a 120Hz refresh rate, a powerful Snapdragon 8 Gen 3 processor, and a long-lasting battery.', ' 10 Days Replacement & 2 Years Service Warranty', '2024-03-09 20:37:50', 'Glass front (Gorilla Glass Victus 3), glass back (Gorilla Glass Victus 3), titanium frame', '-', '-', 'GSM / CDMA / HSPA / EVDO / LTE / 5G', 'HSPA, LTE-A (up to 7CA), 5G', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 &amp; SIM 2 (Dual SIM model only) CDMA 800 / 1900 &amp; TD-SCDMA', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100  CDMA2000 1xEV-DO', 'LTE', 'A/NSA/Sub6 - International SA/NSA/Sub6/mmWave - USA', '6.8 inches, 114.3 cm2', 'Dynamic LTPO AMOLED 2X, 120Hz, HDR10+, 2600 nits (peak)', '1440 x 3088 pixels, 19.3:9 ratio (~501 ppi density)', 'Octa-core (1x3.3 GHz Cortex-X4 &amp; 5x3.2 GHz Cortex-A720 &amp; 2x2.3 GHz Cortex-A520)', 'Adreno 750 (1 GHz)', 'Qualcomm SM8650-AC Snapdragon 8 Gen 3 (4 nm)', '256GB 12GB RAM, 512GB 12GB RAM, 1TB 12GB RAM UFS 4.0', 'No', '8K@24/30fps, 4K@30/60/120fps, 1080p@30/60/240fps, 1080p@960fps, HDR10+, stereo sound rec., gyro-EIS', '50 MP, (periscope telephoto), PDAF, OIS, 5x optical zoom', 'LED flash, auto-HDR, panorama', '4K@30/60fps, 1080p@30fps', '12 MP, f/2.2, 26mm (wide), Dual Pixel PDAF', 'Dual video call, Auto-HDR, HDR10+', 'Android 14, One UI 6.1', 'Yes', 'USB Type-C 3.2, OTG', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6e/7, tri-band, Wi-Fi Direct', '5.3, A2DP, LE', 'No', 'Fingerprint (under display, ultrasonic), accelerometer, gyro, proximity, compass, barometer Samsung DeX, Samsung Wireless DeX (desktop experience support) Ultra Wideband (UWB) support Emergency SOS via satellite (SMS sending/receiving)', 'Li-Ion 5000 mAh, non-removable', '45W wired, PD3.0, 65% in 30 min (advertised) 15W wireless (Qi/PMA) 4.5W reverse wireless', '-'),
(6, 'OnePlus 10 Pro', 'OnePlus-10', 200, 42500, 'IMG_71216.webp', 'Volcanic Black | 8/128GB | USA', 'OnePlus 10 Pro boasts a flagship Snapdragon 8 Gen 1 processor, a smooth 120Hz AMOLED display, and a Hasselblad co-developed triple camera system. All powered by a large 5000mAh battery with super-fast charging.\r\nONEPLUS\r\n\r\n\r\n', '10 Days Replacement & 2 Years Service Warranty', '2024-03-09 21:09:06', 'Glass front (Gorilla Glass Victus), glass back (Gorilla Glass 5), aluminum frame', '201 g (7.09 oz)', '163 x 73.9 x 8.6 mm (6.42 x 2.91 x 0.34 in)', 'Single SIM (Nano-SIM) or Dual SIM (Nano-SIM, dual stand-by)', 'HSPA 42.2/5.76 Mbps, LTE-A (4CA) Cat18 1200/200 Mbps, 5G', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 &amp; SIM 2 (dual-SIM model only) CDMA 800', 'HSDPA 800 / 850 / 900 / 1700(AWS) / 1900 / 2100 CDMA2000 1xEV-DO', '1, 2, 3, 4, 5, 7, 8, 12, 13, 17, 18, 19, 20, 25, 26, 28, 30, 32, 38, 39, 40, 41, 46, 48, 66, 71 - International', '1, 2, 3, 5, 7, 8, 20, 25, 28, 30, 38, 40, 41, 48, 66, 71, 77, 78 SA/NSA - International', '6.7 inches, 108.4 cm2 (~90.0% screen-to-body ratio)', 'LTPO2 Fluid AMOLED, 1B colors, 120Hz, HDR10+, 500 nits (typ), 800 nits (HBM), 1300 nits (peak)', '1440 x 3216 pixels, 20:9 ratio (~525 ppi density)', 'Octa-core (1x3.00 GHz Cortex-X2 &amp; 3x2.50 GHz Cortex-A710 &amp; 4x1.80 GHz Cortex-A510)', 'Adreno 730', 'Qualcomm SM8450 Snapdragon 8 Gen 1 (4 nm)', '128GB 8GB RAM, 256GB 8GB RAM, 256GB 12GB RAM, 512GB 12GB RAM UFS 3.1', 'No', '8K@24fps, 4K@30/60/120fps, 1080p@30/60/240fps, Auto HDR, gyro-EIS', '48 MP, f/1.8, 23mm (wide), 1/1.43&quot;, 1.12µm, multi-directional PDAF, Laser AF, OIS 8 MP, f/2.4, 77mm (telephoto), 1.0µm, PDAF, OIS, 3.3x optical zoom 50 MP, f/2.2, 14mm, 150˚ (ultrawide), 1/2.76&quot;, 0.64µm', 'Hasselblad Color Calibration, Dual-LED dual-tone flash, HDR, panorama', '1080p@30fps, gyro-EIS', '32 MP, f/2.2, (wide), 1/2.74&quot;, 0.8µm', 'Auto-HDR', 'Android 12, upgradable to Android 14, OxygenOS 14 (International), ColorOS (China)', 'Yes', 'USB Type-C 3.1, OTG', 'No', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct', '5.2, A2DP, LE, aptX HD', 'No', 'Fingerprint (under display, optical), accelerometer, gyro, proximity, compass, color spectrum, barometer', 'Li-Po 5000 mAh, non-removable', '80W wired, PD, 1-100% in 32 min (International) 65W wired, PD, 1-58% in 15 min (North America) 50W wireless Reverse wireless', 'AnTuTu: 886248 (v9) GeekBench: 3447 (v5.1) GFXBench: 48fps (ES 3.1 onscreen)'),
(7, 'Redmi Note 13 Pro 4G', 'Redmi Note-13', 450, 30000, 'IMG_16549.webp', 'Forest Green | 8/256GB | International', 'Xiaomi Redmi Note 13 Pro 4G is a budget-friendly smartphone with a 6.67-inch AMOLED display, a 200MP main camera, a 5000mAh battery, and a Mediatek Helio G99 Ultra processor.', '10 Days Replacement &amp; 2 Years Service Warranty', '2024-03-10 00:14:24', 'Glass front (Gorilla Glass 5), plastic frame, plastic back', '188 g (6.63 oz)', '161.1 x 75 x 8 mm (6.34 x 2.95 x 0.31 in)', 'Dual SIM (Nano-SIM, dual stand-by)', 'HSPA, LTE-A', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 &amp; SIM 2', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100', '1, 2, 3, 4, 5, 7, 8, 12, 13, 17, 18, 19, 20, 26, 28, 38, 40, 41, 66', '-', '6.67 inches, 107.4 cm2 (~88.9% screen-to-body ratio)', 'AMOLED, 1B colors, 120Hz, 500 nits (typ), 1000 nits (HBM), 1300 nits (peak)', '1080 x 2400 pixels, 20:9 ratio (~395 ppi density)', 'Octa-core (2x2.2 GHz Cortex-A76 &amp; 6x2.0 GHz Cortex-A55)', 'Mali-G57 MC2', 'Mediatek Helio G99 Ultra', '256GB 8GB RAM, 512GB 12GB RAM', 'microSDXC', '1080p@30/60fps', '200 MP, f/1.7, 23mm (wide), 1/1.4&quot;, 0.56µm, multi-directional PDAF, OIS 8 MP, f/2.2, 120˚, (ultrawide) 2 MP, f/2.4, (macro)', 'LED flash, HDR, panorama', '1080p@30/60fps', '16 MP, f/2.4, (wide)', '-', 'Android 13, MIUI 14', 'Yes (market/region dependent)', 'USB Type-C 2.0, OTG', 'FM radio', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band', '5.2, A2DP, LE', 'Yes', 'Fingerprint (under display, optical), accelerometer, gyro, compass', '5000 mAh, non-removable', '67W wired, 50% in 16 min, 100% in 46 min (advertised)', '-');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(100) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'JAJRT Mobile Shop', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt cumque ea quo. Obcaecati quaerat blanditiis sit aut rerum libero officia labore ad fuga! Nostrum cum earum enim sit, corporis quaerat harum! Temporibus eaque libero perspiciatis pariatur,', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(29, 'Gulam Jakaria', 'IMG_95814.jpg'),
(31, 'Jakaria Hasan', 'IMG_64731.jpeg'),
(32, 'Random Name', 'IMG_85643.jpeg'),
(33, 'Arman Hossen', 'IMG_67167.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phonenum` bigint(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `token` varchar(200) DEFAULT NULL,
  `token_exp` date DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `phonenum`, `email`, `address`, `profile`, `password`, `is_verified`, `status`, `token`, `token_exp`, `datentime`) VALUES
(1, 'Gulam Jakaria', 1725490784, 'abc@gmail.com', 'Jalalpur, Katiadi, Kishoreganj', 'IMG_51087.jpeg', '$2y$10$LU4XiciDJIE.GOFEgxRyVeD1veD5yIRHClwD.iStU5lulqF9L94YO', 1, 1, NULL, NULL, '2024-03-05 16:07:37'),
(3, 'Abu Jafor Siddik', 1865332423, 'abcd@gmail.com', 'Thakorgoan', 'IMG_30136.jpeg', '$2y$10$CUEzetNAMiyJDUWWO1dMgOAtZlTkjPoRyKc86jqqPwupwygj0XTCi', 1, 1, 'a81c923bd5b9af1c4413b5c4ee874ce9', NULL, '2024-03-06 12:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `datentime`, `seen`) VALUES
(25, 'Abu Jafor Siddik', 'abcd@gmail.com', 'Abc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\nQuia at aperiam, nihil eaque nobis deleniti illo. Placeat dicta hic pariatur.', '2024-03-06 13:07:35', 0),
(36, 'dfd', 'avronil899@gmail.com', 'fdfd', 'onsectetur adipisicing elit.\r\nQuia at aperiam, nihil eaque nobis deleniti illo. Placeat dicta hic pariatu', '2024-03-06 13:24:11', 0),
(37, 'Abu Jafor Siddik', 'abc@gmail.com', 'abc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\nQuia at aperiam, nihil eaque nobis deleniti illo. Placeat dicta hic pariatur.', '2024-03-06 13:26:19', 0),
(38, 'Abu Jafor Siddik', 'avronil899@gmail.com', 'abc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\nQuia at aperiam, nihil eaque nobis deleniti illo. Placeat dicta hic pariatur.', '2024-03-06 13:27:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `v_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `link` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`v_id`, `title`, `link`, `status`, `datentime`) VALUES
(2, 'iPhone 15', 'https://shorturl.at/uzJNV', 1, '2024-03-06 19:21:10'),
(14, 'iPhone 12 pro', 'https://shorturl.at/BFLO9', 0, '2024-03-07 21:44:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_cred` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`v_id`) REFERENCES `videos` (`v_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
