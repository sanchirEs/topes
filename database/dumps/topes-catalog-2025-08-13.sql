SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `blog_galleries`;
CREATE TABLE `blog_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `blog_post_id` bigint unsigned NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_galleries_blog_post_id_foreign` (`blog_post_id`),
  CONSTRAINT `blog_galleries_blog_post_id_foreign` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE `blog_posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('1','0001_01_01_000000_create_users_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('2','0001_01_01_000001_create_cache_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('3','0001_01_01_000002_create_jobs_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('4','2025_01_22_160000_create_product__categories_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('5','2025_01_22_160042_create_blog_posts_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('6','2025_01_22_160532_create_partners_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('7','2025_01_22_160933_create_products_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('8','2025_01_22_161134_create_services_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('9','2025_01_22_181204_create_blog_galleries_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('10','2025_02_14_110532_add_name_to_blog_posts_table','1');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('11','2025_05_14_093639_create_product_questions_table','2');
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('12','2025_05_17_063404_add_vat_and_total_to_products','3');

DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_categories` (`id`,`name`,`slug`,`link`,`sort_order`,`description`,`created_at`,`updated_at`) VALUES ('1','Автомат галын хор','автомат-галын-хор','автомат-галын-хор','11',' автомат-галын-хор',NULL,'2025-06-03 04:18:20');
INSERT INTO `product_categories` (`id`,`name`,`slug`,`link`,`sort_order`,`description`,`created_at`,`updated_at`) VALUES ('2','\"Рубеж\" дохиоллын хаягладаг системийн төхөөрөмжүүд','рубеж-дохиоллын-хаягладаг-системийн-төхөөрөмжүүд','рубеж-дохиоллын-хаягладаг-системийн-төхөөрөмжүүд','12','рубеж-дохиоллын-хаягладаг-системийн-төхөөрөмжүүд',NULL,'2025-06-03 04:18:48');
INSERT INTO `product_categories` (`id`,`name`,`slug`,`link`,`sort_order`,`description`,`created_at`,`updated_at`) VALUES ('3','Аудиодомофон, нэвтрэх систем','аудиодомофон','аудиодомофон','13','аудиодомофон',NULL,'2025-06-03 04:24:24');
INSERT INTO `product_categories` (`id`,`name`,`slug`,`link`,`sort_order`,`description`,`created_at`,`updated_at`) VALUES ('4','HIKVISION','HIKVISION','HIKVISION','14','HIKVISION',NULL,'2025-06-03 04:20:28');
INSERT INTO `product_categories` (`id`,`name`,`slug`,`link`,`sort_order`,`description`,`created_at`,`updated_at`) VALUES ('5','БУСАД','бусад','бусад','20','бусад',NULL,'2025-06-03 04:20:42');
INSERT INTO `product_categories` (`id`,`name`,`slug`,`link`,`sort_order`,`description`,`created_at`,`updated_at`) VALUES ('6','Мэдрэгч','мэдрэгч','мэдрэгч','2','мэдрэгч',NULL,'2025-06-03 04:18:57');
INSERT INTO `product_categories` (`id`,`name`,`slug`,`link`,`sort_order`,`description`,`created_at`,`updated_at`) VALUES ('7','Дохиоллын удирдлагын самбар','дохиоллын-удирдлагын-самбар','дохиоллын-удирдлагын-самбар','3','дохиоллын-удирдлагын-самбар',NULL,'2025-06-03 04:19:26');
INSERT INTO `product_categories` (`id`,`name`,`slug`,`link`,`sort_order`,`description`,`created_at`,`updated_at`) VALUES ('8','БОЛИД','болид','болид','1','болид',NULL,'2025-06-03 04:18:32');
INSERT INTO `product_categories` (`id`,`name`,`slug`,`link`,`sort_order`,`description`,`created_at`,`updated_at`) VALUES ('9','Болидын хаягладаг системийн төхөөрөмжүүд','болидын-хаягладаг-системийн-төхөөрөмжүүд','болидын-хаягладаг-системийн-төхөөрөмжүүд','4','болидын-хаягладаг-системийн-төхөөрөмжүүд',NULL,'2025-06-03 04:19:53');
INSERT INTO `product_categories` (`id`,`name`,`slug`,`link`,`sort_order`,`description`,`created_at`,`updated_at`) VALUES ('10','Зарлан мэдээлэх систем','зарлан-мэдээлэх-систем','зарлан-мэдээлэх-систем','10','',NULL,NULL);

DROP TABLE IF EXISTS `product_questions`;
CREATE TABLE `product_questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `asker_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci,
  `answer_text` text COLLATE utf8mb4_unicode_ci,
  `answered_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answered_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_questions_product_id_foreign` (`product_id`),
  CONSTRAINT `product_questions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_questions` (`id`,`product_id`,`asker_name`,`question_text`,`answer_text`,`answered_by`,`status`,`created_at`,`answered_at`,`updated_at`) VALUES ('11','560','sanchir','uldegdel baigaayu','77114532','Админ','1','2025-05-17 08:59:24',NULL,'2025-05-18 06:47:23');
INSERT INTO `product_questions` (`id`,`product_id`,`asker_name`,`question_text`,`answer_text`,`answered_by`,`status`,`created_at`,`answered_at`,`updated_at`) VALUES ('12','660','94576068','hayag haana we?',NULL,NULL,'0','2025-05-17 09:02:37',NULL,'2025-05-17 09:02:37');
INSERT INTO `product_questions` (`id`,`product_id`,`asker_name`,`question_text`,`answer_text`,`answered_by`,`status`,`created_at`,`answered_at`,`updated_at`) VALUES ('13','563','зочин','энэ байгааюу',NULL,NULL,'0','2025-05-17 09:18:35',NULL,'2025-05-17 09:18:35');
INSERT INTO `product_questions` (`id`,`product_id`,`asker_name`,`question_text`,`answer_text`,`answered_by`,`status`,`created_at`,`answered_at`,`updated_at`) VALUES ('14','561','94576068','sn bnu',NULL,NULL,'0','2025-05-18 06:39:02',NULL,'2025-05-18 06:39:02');
INSERT INTO `product_questions` (`id`,`product_id`,`asker_name`,`question_text`,`answer_text`,`answered_by`,`status`,`created_at`,`answered_at`,`updated_at`) VALUES ('18','569','94576068','baigaayu','Байгаа','Админ','1','2025-05-18 11:06:46',NULL,'2025-05-18 11:08:42');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_category_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `vat` decimal(10,2) DEFAULT '0.00',
  `total` decimal(10,2) DEFAULT '0.00',
  `status` tinyint DEFAULT '1',
  `sort_order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_product_category_id_foreign` (`product_category_id`),
  CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=700 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('560','2','Хаягладаг утаа мэдрэгч ИП-212-64','хаягладаг-утаа-мэдрэгч-ип-212-64','ИП-212-64','01JVM0BH539PPRBCQ2TKHNVCX4.png','110000.00','9000.00','99000.00','1','8',NULL,'2025-08-13 07:41:37');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('561','2','Хаягладаг дулаан мэдрэгч ИП-101-29','хаягладаг-дулаан-мэдрэгч-ип-101-29','ИП-101-29','1-2.png','110000.00','9000.00','99000.00','1','9',NULL,'2025-06-03 07:24:43');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('563','2','Хаягладаг гар мэдээлэгч ИПР 513-11','хаягладаг-гар-мэдээлэгч-ипр-513-11','ИПР 513-11','1-4.png','99000.00','7500.00','82500.00','1','11',NULL,'2025-06-03 07:25:04');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('564','2','Хөдөлгөөн мэдрэгч /хананд/ ИО 40920-2','хөдөлгөөн-мэдрэгч-/хананд/-ио-40920-2','ИО 40920-2','1-5.png','95000.00','9500.00','104500.00','1','12',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('565','2','Хөдөлгөөн мэдрэгч /таазанд/ С2000-ПИК','хөдөлгөөн-мэдрэгч-/таазанд/-с2000-пик','С2000-ПИК','1-6.png','95000.00','9500.00','104500.00','1','13',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('566','2','Шил хагарлын мэдрэгч ИО 32920-2','шил-хагарлын-мэдрэгч-ио-32920-2','ИО 32920-2','1-7.png','90000.00','9000.00','99000.00','1','14',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('567','2','Программ хангамж Firesec Pro','программ-хангамж-firesec-pro','Firesec Pro','1-8.png','3500000.00','350000.00','3850000.00','1','15',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('568','2','Удирдлагын гар Рубеж-2ОП','удирдлагын-гар-рубеж-2оп','Рубеж-2ОП','1-9.png','1200000.00','120000.00','1320000.00','1','16',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('569','2','Хяналтын самбар Рубеж-БИУ','хяналтын-самбар-рубеж-биу','Рубеж-БИУ','1-10.png','1100000.00','110000.00','1210000.00','1','17',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('570','2','Интерфейс МС-1','интерфейс-мс-1','МС-1','1-11.png','200000.00','20000.00','220000.00','1','18',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('571','2','Релейны модуль РМ-4К','релейны-модуль-рм-4к','РМ-4К','1-12.png','440000.00','40000.00','440000.00','1','19',NULL,'2025-06-03 07:26:17');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('572','2','Релейны модуль МДУ-1','релейны-модуль-мду-1','МДУ-1','1-13.jpg','385000.00','30000.00','330000.00','1','20',NULL,'2025-06-03 07:26:37');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('573','2','Хаягийн хувиргагч АМП-4','хаягийн-хувиргагч-амп-4','АМП-4','1-14.png','420000.00','42000.00','462000.00','1','21',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('574','2','Шугамын хамгаалалт ИЗ-1','шугамын-хамгаалалт-из-1','ИЗ-1','1-15.png','60000.00','6000.00','66000.00','1','22',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('575','8','USB-RS-485 USB-RS-485','usb-rs-485-usb-rs-485','USB-RS-485','3-1.png','132000.00','12000.00','132000.00','1','23',NULL,'2025-06-03 11:14:56');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('576','8','C2000-USB C2000-USB','c2000-usb-c2000-usb','C2000-USB','3-2.png','132000.00','12000.00','132000.00','1','24',NULL,'2025-06-03 11:15:09');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('577','8','C2000-ПП C2000-ПП','c2000-пп-c2000-пп','C2000-ПП','3-3.png','165000.00','12000.00','132000.00','1','25',NULL,'2025-06-03 11:15:21');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('578','9','Хөдөлгөөн мэдрэгч С2000-ИК','хөдөлгөөн-мэдрэгч-с2000-ик','С2000-ИК','3-4.png','88000.00','8000.00','88000.00','1','26',NULL,'2025-06-03 11:15:33');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('579','2','Хосолсон мэдрэгч ИП 212/101-64-PR-R3','хосолсон-мэдрэгч-ИП 212/101-64-PR-R3','ИП 212/101-64-PR-R3','01JWTBQSAZX4T6F0MR1N0D1ZMZ.png','165000.00','10000.00','110000.00','1','27',NULL,'2025-06-03 07:40:18');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('580','3','Домофон CTV-D10NG','домофон-ctv-d10ng','CTV-D10NG','01JWTKF1YC1GJG5MVCC68WBVD4.jpg','280000.00','0.00','0.00','1','28',NULL,'2025-06-03 11:16:02');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('581','3','Домофоны панель CTV-М1702 В','домофоны-панель-ctv-м1702-в','CTV-М1702 В','01JWTR4TPBM97KTTGJE4BGYVRM.png','280000.00','0.00','0.00','1','29',NULL,'2025-06-03 11:17:08');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('582','3','Домофон TS-203Kit','домофон-ts-203kit','TS-203Kit','01JWTR7B19RAH7ZMWT92MDCAHT.jpg','480000.00','24000.00','264000.00','1','30',NULL,'2025-06-03 11:18:31');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('583','6','Дуут дохио Марс-12КУ','дуут-дохио-марс-12ку','Марс-12КУ','01JWTKHGGZMD03AEEV1S7KA8QA.png','38500.00','3200.00','35200.00','1','31',NULL,'2025-06-03 11:18:51');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('584','10','Чанга яригч АС-2-2','чанга-яригч-ас-2-2','АС-2-2','01JWTKM9B0XCEMC09Z8Q00D73Q.jpg','160000.00','4000.00','44000.00','1','32',NULL,'2025-06-03 11:19:02');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('585','8','Программ Орион про 10','программ-орион-про-10','Орион про 10','01JWTKYRVJ685PP4FGT7BA7Y15.png','4500000.00','350000.00','3850000.00','1','33',NULL,'2025-06-03 11:19:14');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('586','8','Программ Орион про 127','программ-орион-про-127','Орион про 127','01JWTKZC7V2S2P50J27CX9R0VQ.png','6800000.00','680000.00','7480000.00','1','34',NULL,'2025-06-03 11:19:34');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('587','1','УСП101-72Э','усп101-72э','УСП101-72Э','01JWTM069C37EJCKW5HY5AR8ME.jpg','380000.00','38000.00','418000.00','1','35',NULL,'2025-06-03 11:19:49');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('588','8','БЗК','бзк','БЗК','01JWTM202QZS7B0W6X5S80B0V8.png','180000.00','18000.00','198000.00','1','36',NULL,'2025-06-03 11:20:00');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('589','8','БЗЛ','бзл','БЗЛ','01JWTM2VTP0KRE38VTG0SM6DC0.jpg','80000.00','8000.00','88000.00','0','37',NULL,'2025-06-03 11:20:10');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('590','8','БЗС','бзс','БЗС','01JWTM3EFDWA6K1X77SG7MEHAC.jpg','130000.00','13000.00','143000.00','1','38',NULL,'2025-06-03 11:20:21');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('591','8','С2000-ПИ','с2000-пи','С2000-ПИ','01JWTRC1TQK2W4TW665DD7QAQ7.png','500000.00','50000.00','550000.00','1','39',NULL,'2025-06-03 11:21:05');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('592','5','Табло Выход','табло-выход','Табло Выход','3-18.jpg','38500.00','3500.00','38500.00','1','40',NULL,'2025-06-03 11:21:26');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('593','5','Табло Порошок Уходи','табло-порошок-уходи','Табло Порошок Уходи','3-19.webp','38500.00','3500.00','38500.00','1','41',NULL,'2025-06-03 11:21:43');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('594','8','РИП12','рип12','РИП12','01JWTM4N00MHAS4B9AS6F8PYW8.png','400000.00','40000.00','440000.00','1','42',NULL,'2025-06-03 11:21:53');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('595','8','ШПС 12','шпс-12','ШПС 12','01JWTM56MDTE62KZD82DR2QYH3.png','2500000.00','250000.00','2750000.00','1','43',NULL,'2025-06-03 11:22:05');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('596','8','С2000-ПУ','с2000-пу','С2000-ПУ','01JWTM5P17YRQMCQES9F4MFXWE.jpg','180000.00','18000.00','198000.00','1','44',NULL,'2025-06-03 11:22:15');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('597','8','С2000-АСПТ','с2000-аспт','С2000-АСПТ','01JWTM66H977FJMZGN354VRBBG.jpg','1600000.00','160000.00','1760000.00','1','45',NULL,'2025-06-03 11:22:25');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('598','3','Визит БВД-315R','визит-бвд-315r','Визит БВД-315R','4-1.webp','370000.00','37000.00','407000.00','1','46',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('599','3','БУД-430S','буд-430s','БУД-430S','4-2.jpg','440000.00','44000.00','484000.00','1','47',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('600','3','БК-30М Коммутатор Визит','бк-30м-коммутатор-визит','БК-30М Коммутатор Визит','4-3.jpg','130000.00','13000.00','143000.00','1','48',NULL,NULL);
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('601','3','БК-100М Коммутатор Визит','бк-100м-коммутатор-визит','БК-100М Коммутатор Визит','4-4.jpeg','154000.00','14000.00','154000.00','1','49',NULL,'2025-06-03 10:08:40');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('602','3','Элтис DP-400 панель','элтис-dp-400-панель','Элтис DP-400 панель','4-5.jpg','715000.00','65000.00','715000.00','1','50',NULL,'2025-06-03 10:09:15');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('603','3','Элтис PS2-CS2 тэжээлийн блок','элтис-ps2-cs2-тэжээлийн-блок','Элтис PS2-CS2 тэжээлийн блок','01JWTMBBJHKKYFS59XDG8A4W0K.jpg','165000.00','15000.00','165000.00','1','51',NULL,'2025-06-03 10:10:48');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('604','3','КМ100-7,1, Коммутатор Элтис','км100-71-коммутатор-элтис','КМ100-7,1, Коммутатор Элтис','4-7.jpg','132000.00','12000.00','132000.00','1','52',NULL,'2025-06-03 10:11:01');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('605','3','Метаком MK2007 панель','метаком-mk2007-панель','Метаком MK2007 панель','01JWTMEPHCHHN0HMGY7PGZ6A6J.jpg','1100000.00','100000.00','1100000.00','1','53',NULL,'2025-06-03 10:12:38');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('606','3','Метаком БП-2У тэжээлийн блок','метаком-бп-2у-тэжээлийн-блок','Метаком БП-2У тэжээлийн блок','01JWTMFQENVAAXD84JKS112G9Z.jpg','110000.00','10000.00','110000.00','1','54',NULL,'2025-06-03 10:13:11');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('607','3','Ласкомекс','ласкомекс','Ласкомекс','01JWTMHJB8QH2RER8AEC6Z6QCR.jpg','1800000.00','180000.00','1980000.00','1','55',NULL,'2025-06-03 10:14:12');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('608','3','Полис панель. Контроллер','полис-панель.-контроллер','Полис панель. Контроллер','01JWTMK57DYT4N1XDKFS9CJD83.jpg','520000.00','52000.00','572000.00','1','56',NULL,'2025-06-03 10:15:04');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('609','3','Трубка TS-AD Digital (for Lascomex)','трубка-ts-ad-digital-for-lascomex','Трубка TS-AD Digital (for Lascomex)','01JWTMM00JM28T60P9RN1MEAPX.png','110000.00','0.00','0.00','1','57',NULL,'2025-06-03 11:22:59');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('610','3','Трубка ТКП-12D Digital (for Lascomex)','трубка-ткп-12d-digital-for-lascomex','Трубка ТКП-12D Digital (for Lascomex)','01JWTMMXBWWPWD27SXTR6NPM96.jpg','110000.00','9500.00','104500.00','1','58',NULL,'2025-06-03 11:23:10');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('611','3','Трубка ТКП-5m','трубка-ткп-5m','Трубка ТКП-5m','01JWTMQMK01C6BP8824KN80C27.jpg','44000.00','4000.00','44000.00','1','59',NULL,'2025-06-03 11:23:24');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('612','3','Трубка УКП-7','трубка-укп-7','Трубка УКП-7','01JWTMSDF5H3Y1FQK2ZHHEDW37.jpg','55000.00','5500.00','60500.00','1','60',NULL,'2025-06-03 11:23:33');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('613','3','Трубка УКП-12','трубка-укп-12','Трубка УКП-12','01JWTMTE2FHVF1N8VYNR9CEGST.jpg','65000.00','6500.00','71500.00','1','61',NULL,'2025-06-03 11:23:44');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('614','3','Соронзон цоож Метаком ML-400','соронзон-цоож-метаком-ml-400','Соронзон цоож Метаком ML-400','01JWTMV8KE3E24S325JTMNDW4N.jpg','220000.00','22000.00','242000.00','1','62',NULL,'2025-06-03 11:23:57');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('615','3','Соронзон цоож ML-300-50 , ML-240-40','соронзон-цоож-ml-300-50-ml-240-40','Соронзон цоож ML-300-50 , ML-240-40','01JWTMVZMX6D2VTGW6JT4AM28K.jpg','180000.00','18000.00','198000.00','1','63',NULL,'2025-06-03 11:24:07');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('616','3','Цахилгаан цоож','цахилгаан-цоож','Цахилгаан цоож','4-19.jpg','60000.00','6000.00','66000.00','1','64',NULL,'2025-06-03 11:24:17');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('617','3','Цахилгаан механик цоож GM-ERL012','цахилгаан-механик-цоож-gm-erl012','Цахилгаан механик цоож GM-ERL012','4-20.jpg','140000.00','14000.00','154000.00','1','65',NULL,'2025-06-03 11:24:28');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('618','3','Хаалганы автомат дүүжин цоож GM-DO150','хаалганы-автомат-дүүжин-цоож-gm-do150','Хаалганы автомат дүүжин цоож GM-DO150','4-21.jpg','800000.00','80000.00','880000.00','1','66',NULL,'2025-06-03 11:24:38');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('619','3','Контроллер Z 5R','контроллер-z-5r','Контроллер Z 5R','4-22.jpg','70000.00','7000.00','77000.00','1','67',NULL,'2025-06-03 11:24:48');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('620','3','Түлхүүр Dallas','түлхүүр-dallas','Түлхүүр Dallas','4-23.jpeg','3300.00','300.00','3300.00','1','68',NULL,'2025-06-03 11:24:58');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('621','3','Түлхүүр Брелок','түлхүүр-брелок','Түлхүүр Брелок','4-24.jpg','3300.00','300.00','3300.00','1','69',NULL,'2025-06-03 11:25:12');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('622','3','Түлхүүр уншигч СТМ-КР','түлхүүр-уншигч-стм-кр','Түлхүүр уншигч СТМ-КР','4-25.jpg','33000.00','3000.00','33000.00','1','70',NULL,'2025-06-03 11:25:20');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('623','3','Түлхүүр уншигч 3.исп.01','түлхүүр-уншигч-3.исп.01','Түлхүүр уншигч 3.исп.01','01JWTMY917P16BJEKQ5GXR30MQ.jpg','55000.00','5500.00','60500.00','1','71',NULL,'2025-06-03 11:25:30');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('624','3','Гарах кноп','гарах-кноп','Гарах кноп','01JWTMYZ78B0GTZE6TMMJ5NPG2.jpg','27500.00','2500.00','27500.00','1','72',NULL,'2025-06-03 11:25:39');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('625','3','Гарах кноп /хар цагаан/','гарах-кноп-/хар-цагаан/','Гарах кноп /хар цагаан/','4-28.jpg','38500.00','3500.00','38500.00','1','73',NULL,'2025-06-03 11:25:49');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('626','3','Гарах кноп /удирдлагатай/','гарах-кноп-/удирдлагатай/','Гарах кноп /удирдлагатай/','01JWTNC5PJVDXV2480NVP50PWR.png','66000.00','6000.00','66000.00','1','74',NULL,'2025-06-03 11:25:58');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('627','6','Утаа мэдрэгч ИП-212-141','утаа-мэдрэгч-ип-212-141','Утаа мэдрэгч ИП-212-141','01JWTND1RQ0HG146KV2K7RKBJR.jpg','27500.00','2500.00','27500.00','1','75',NULL,'2025-06-03 10:29:12');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('628','6','Утаа мэдрэгч ИП-31 Болид','утаа-мэдрэгч-ип-31-болид','Утаа мэдрэгч ИП-31 Болид','01JWTNDYVCN6M6ZD10HT85E301.png','44000.00','4000.00','44000.00','1','76',NULL,'2025-06-03 10:29:42');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('629','6','Утаа мэдрэгч ИП-212-142 (батарейтай)','утаа-мэдрэгч-ип-212-142-батарейтай','Утаа мэдрэгч ИП-212-142 (батарейтай)','01JWTNEV2Y8D6BM52DW48H2B6X.png','33000.00','3300.00','36300.00','1','77',NULL,'2025-06-03 10:30:11');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('631','6','Утаа дулаан хосолсон мэдрэгч ','утаа-дулаан-хосолсон-мэдрэгч','Утаа дулаан хосолсон мэдрэгч ','01JWTNJMB703S61YCCNMN1EHWD.jpg','95000.00','9500.00','104500.00','1','79',NULL,'2025-06-03 10:32:15');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('632','6','Утаа мэдрэгч /хятад BF-SD339/','утаа-мэдрэгч-/хятад-bf-sd339/','Утаа мэдрэгч /хятад BF-SD339/','01JWTNKXNAXVG8XN62TQKY8K1P.jpg','33000.00','3000.00','33000.00','1','80',NULL,'2025-06-03 10:32:57');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('634','6','Хий мэдрэгч /хятад/','хий-мэдрэгч-/хятад/','Хий мэдрэгч /хятад/','01JWTNT1N8VW00XZ2K7F5ZC677.png','66000.00','6000.00','66000.00','1','82',NULL,'2025-06-03 10:36:18');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('635','6','Дулаан мэдрэгч ИП 101-1А','дулаан-мэдрэгч-ип-101-1а','Дулаан мэдрэгч ИП 101-1А','01JWTNV6NWP61CS1SC2E2NNNMT.jpg','25300.00','2300.00','25300.00','1','83',NULL,'2025-06-03 10:36:56');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('636','6','Дулаан мэдрэгч ИП 114','дулаан-мэдрэгч-ип-114','Дулаан мэдрэгч ИП 114','01JWTNXR4P5W78VQZRHC5V3PJN.jpg','15400.00','1400.00','15400.00','1','84',NULL,'2025-06-03 10:38:19');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('638','6','Ус мэдрэгч ','ус-мэдрэгч','Ус мэдрэгч ','2-12.jpg','22000.00','2000.00','22000.00','1','86',NULL,'2025-06-03 10:39:04');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('639','6','Дөл мэдрэгч Спектрон 401','дөл-мэдрэгч-спектрон-401','Дөл мэдрэгч Спектрон 401','01JWTP06X42B7DD92C8NWWP7EW.jpg','850000.00','85000.00','935000.00','1','87',NULL,'2025-06-03 10:39:40');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('640','6','Дөл мэдрэгч Спектрон 201','дөл-мэдрэгч-спектрон-201','Дөл мэдрэгч Спектрон 201','01JWTP0VYA3KEDC3GAKFYAA9F0.jpg','440000.00','40000.00','440000.00','1','88',NULL,'2025-06-03 10:40:02');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('641','6','Утааны шугаман мэдрэгч ИПДЛ-Д-II/4p','утааны-шугаман-мэдрэгч-ипдл-д-ii/4p','Утааны шугаман мэдрэгч ИПДЛ-Д-II/4p','01JWTP1TPNN7T9C96VACSZKPY2.jpg','572000.00','52000.00','572000.00','1','89',NULL,'2025-06-03 10:40:33');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('642','6','Гар мэдээлэгч ИПР 55','гар-мэдээлэгч-ипр-55','Гар мэдээлэгч ИПР 55','01JWTP3DH2E99PSK1T5656N21Y.jpg','28600.00','2600.00','28600.00','1','90',NULL,'2025-06-03 10:41:25');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('644','6','Дуут дохио AL-S58 том','дуут-дохио-al-s58-том','Дуут дохио AL-S58 том','01JWTP4NDFHD0V784B91985JQD.jpg','110000.00','10000.00','110000.00','1','92',NULL,'2025-06-03 10:42:06');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('645','6','Дуут дохио S-40','дуут-дохио-s-40','Дуут дохио S-40','01JWTRPJ160VH1DN86WF9FCQWE.jpg','90000.00','9000.00','99000.00','1','93',NULL,'2025-06-03 11:26:49');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('646','6','Дуут дохио Марс-12КП','дуут-дохио-марс-12кп','Дуут дохио Марс-12КП','01JWTP5HSWQ8RZWNMFB8SA7PTT.jpg','28600.00','2600.00','28600.00','1','94',NULL,'2025-06-03 10:42:35');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('647','6','Дуут дохио Астра-10 70Дб','дуут-дохио-астра-10-70дб','Дуут дохио Астра-10 70Дб','01JWTP7F0ZRAR8X3NH28MEKDCN.jpg','11000.00','1000.00','11000.00','1','95',NULL,'2025-06-03 10:43:38');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('648','6','Дуут дохио ОПОП-124','дуут-дохио-опоп-124','Дуут дохио ОПОП-124','01JWTP8J6G9V80GBKQ9V0XVNF5.png','28600.00','2600.00','28600.00','1','96',NULL,'2025-06-03 10:44:14');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('649','7','Гранд Магистр 2A','гранд-магистр-2a','Гранд Магистр 2A','01JWTPBBYK3ZAAY8FHXDE233H8.png','363000.00','31000.00','341000.00','1','97',NULL,'2025-08-12 05:09:41');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('650','7','Гранд Магистр 4A','гранд-магистр-4a','Гранд Магистр 4A','01JWTPCQG4ZHPWRJQW6V0XZ54G.png','386000.00','34000.00','374000.00','1','98',NULL,'2025-08-12 05:10:05');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('651','7','Гранд Магистр 8 А','гранд-магистр-8-а','Гранд Магистр 8 А','01JWTPEDHWC72KCAS128G0DCDV.png','429000.00','37000.00','407000.00','1','99',NULL,'2025-08-12 05:10:45');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('652','7','Гранд Магистр АРС 16','гранд-магистр-арс-16','Гранд Магистр АРС 16','01JWTPFFH83CKZRF5PQD0BS1XS.jpg','572000.00','50000.00','550000.00','1','100',NULL,'2025-08-12 05:11:20');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('653','7','Гранд Магистр АРС 24','гранд-магистр-арс-24','Гранд Магистр АРС 24','01JWTPJ7WEP6NYJ2MW43MXJTZQ.jpg','638000.00','56000.00','616000.00','1','101',NULL,'2025-08-12 05:12:13');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('654','7','Гранд Магистр-30','гранд-магистр-30','Гранд Магистр-30','01JWTPKGGE1KABPA2Z6QH6RFT7.jpg','1045000.00','94000.00','1034000.00','1','102',NULL,'2025-08-12 05:12:39');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('655','7','Гранд Магистр Релейны модуль-16','гранд-магистр-релейны-модуль-16','Гранд Магистр Релейны модуль-16','01JWTPN9AJ6XWBAFB9Z699PKG6.png','308000.00','28000.00','308000.00','1','103',NULL,'2025-06-03 10:51:11');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('656','8','С2000М','с2000м','С2000М','01JWTPP3ETCCR2PDA84D5PGWD0.jpg','1045000.00','95000.00','1045000.00','1','104',NULL,'2025-06-03 10:51:37');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('657','8','С2000-КС','с2000-кс','С2000-КС','01JWTPQEJXQPYSRNR1YPEQNCEP.jpg','660000.00','60000.00','660000.00','1','105',NULL,'2025-06-03 10:52:21');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('658','8','С2000-БКИ','с2000-бки','С2000-БКИ','01JWTPR7VJMGFMPF3QHPWBSSZA.png','935000.00','85000.00','935000.00','1','106',NULL,'2025-06-03 10:52:47');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('659','8','Сигнал20П','сигнал20п','Сигнал20П','01JWTPS0P3CFCR5RS5B1TMEXCS.png','495000.00','45000.00','495000.00','1','107',NULL,'2025-06-03 10:53:13');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('660','8','Сигнал20М','сигнал20м','Сигнал20М','01JWTPSSSEHAEV569CJHMQAKYG.jpg','715000.00','60000.00','660000.00','1','108',NULL,'2025-08-12 05:17:13');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('661','8','Сигнал-10','сигнал-10','Сигнал-10','01JWTPTJVNK559KGRDZXJTR8AH.jpg','418000.00','36000.00','396000.00','1','109',NULL,'2025-08-12 05:17:48');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('662','8','С2000-4','с2000-4','С2000-4','01JWTPVANZ82DGGVDZTMZCHMJW.png','396000.00','34000.00','374000.00','1','110',NULL,'2025-08-12 05:18:45');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('663','8','С2000-СП1','с2000-сп1','С2000-СП1','01JWTPW0VN15CE0046RQWB74T2.png','396000.00','32000.00','352000.00','1','111',NULL,'2025-08-12 05:19:18');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('664','8','С2000-СП1 /исп-1/','с2000-сп1-/исп-1/','С2000-СП1 /исп-1/','01JWTPX0T844YM0MFQT563WB9S.png','418000.00','34000.00','374000.00','1','112',NULL,'2025-08-12 05:19:27');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('665','8','С2000-КПБ','с2000-кпб','С2000-КПБ','01JWTPY7ZA0YRGQS3QDFGFPPSF.png','480000.00','48000.00','528000.00','1','113',NULL,'2025-06-03 10:56:04');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('666','8','С2000-Ethernet','с2000-ethernet','С2000-Ethernet','01JWTPZCSW5SQMCQSHG09NP9R9.png','418000.00','38000.00','418000.00','1','114',NULL,'2025-06-03 10:56:45');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('667','8','С2000 PGE','с2000-pge','С2000 PGE','01JWTQ1SKF7G9EJBRNZT681XS7.png','770000.00','70000.00','770000.00','1','115',NULL,'2025-06-03 10:58:06');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('668','8','УО-4С','уо-4с','УО-4С','01JWTQ2Q167CER4PC836B69MK1.png','935000.00','85000.00','935000.00','1','116',NULL,'2025-06-03 10:58:31');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('669','8','Ук-Вк/02/04','ук-вк/02/04','Ук-Вк/02/04','01JWTQ3EB68Y3RNSBS02TGV99A.png','110000.00','10000.00','110000.00','1','117',NULL,'2025-06-03 10:58:54');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('670','9','С2000-КДЛ','с2000-кдл','С2000-КДЛ','01JWTQ4B8RRGFNAYVCQKKAE6PQ.png','484000.00','40000.00','440000.00','1','118',NULL,'2025-08-12 05:20:04');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('671','9','ДИП-34А-03','дип-34а-03','ДИП-34А-03','01JWTQ4VZAEHWZTW3C2YH7GAP5.png','115000.00','10500.00','115500.00','1','119',NULL,'2025-06-03 11:00:23');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('672','9','С2000-ИП-02-02','с2000-ип-02-02','С2000-ИП-02-02','01JWTQ5FMC6W33Z57SD8W9RDM3.jpg','110000.00','10000.00','110000.00','1','120',NULL,'2025-06-03 11:00:01');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('673','9','ИПР513-3АМ','ипр513-3ам','ИПР513-3АМ','01JWTQ6VR73N24S44AXXTMH4KY.png','104500.00','9500.00','104500.00','1','121',NULL,'2025-06-03 11:00:46');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('674','9','Бриз','бриз','Бриз','01JWTQ7E5QCRCQ22VHCTB6PRKP.png','55000.00','5500.00','60500.00','1','122',NULL,'2025-06-03 11:01:05');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('675','9','АР-1 адресный расширитель','ар-1-адресный-расширитель','АР-1 адресный расширитель','01JWTQ8508033TR1VXWEMRASXS.png','55000.00','5500.00','60500.00','1','123',NULL,'2025-06-03 11:01:29');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('676','10','Рокот-2, 60Вт','рокот-2-60вт','Рокот-2, 60Вт','01JWTQ8WEW8VBMD59H2DSHTZ4B.png','800000.00','80000.00','880000.00','1','124',NULL,'2025-06-03 11:01:53');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('677','10','Рупор-300, 300Вт','рупор-300-300вт','Рупор-300, 300Вт','01JWTQ9H32Z23C9207DJHR3GXN.png','4400000.00','400000.00','4400000.00','1','125',NULL,'2025-06-03 11:02:14');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('678','5','Тэжээлий блок ББП 12В 2А (Орос)','тэжээлий-блок-ббп-12в-2а-орос','Тэжээлий блок ББП 12В 2А (Орос)','01JWTQCSCB7E8FGH7A20SQG2CE.jpg','121000.00','11000.00','121000.00','1','126',NULL,'2025-06-03 11:04:01');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('679','5','Тэжээлий блок ББП 12В 3А (Орос)','тэжээлий-блок-ббп-12в-3а-орос','Тэжээлий блок ББП 12В 3А (Орос)','01JWTQE15B5PC51CK1YFT83CQ5.jpg','132000.00','12000.00','132000.00','1','127',NULL,'2025-06-03 11:04:41');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('680','5','Тэжээлийн блок /хятад/ 12V 5А','тэжээлийн-блок-/хятад/-12v-5A','Тэжээлийн блок /хятад/ 12V 5А','2-54.jpg','77000.00','12000.00','132000.00','1','128',NULL,'2025-06-03 11:05:37');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('681','5','Тэжээлийн блок /хятад/ 24V 4А','тэжээлийн-блок-/хятад/-24v-4A','Тэжээлийн блок /хятад/ 24V 4A','2-55.jpg','88000.00','20000.00','220000.00','1','129',NULL,'2025-06-03 11:05:22');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('682','5','Тэжээлийн блок /Импульс/ 12V 10A','тэжээлийн-блок-/импульс/-12v-10A','Тэжээлийн блок /Импульс/ 12V 10A','2-56.jpg','33000.00','3000.00','33000.00','1','130',NULL,'2025-06-03 11:06:30');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('683','5','Тэжээлийн блок /Импульс/ 24V 10A','тэжээлийн-блок-/импульс/-24v-10A','Тэжээлийн блок /Импульс/ 24V 10A','01JWTQGT9FHSTEGGPVAET6YHNV.jpg','38500.00','3500.00','38500.00','1','131',NULL,'2025-06-03 11:06:13');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('684','5','Тэжээлийн блок Болид РИП-24','тэжээлийн-блок-болид-рип-24','Тэжээлийн блок Болид РИП-24','01JWTQJCDV8SDYMQ2FG1M9HCKJ.png','800000.00','80000.00','880000.00','1','132',NULL,'2025-06-03 11:07:04');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('685','5','Аккумлятор 2.3 А/ц','аккумлятор-2.3-а/ц','Аккумлятор 2.3 А/ц','01JWTRRWGK3A0A6CKQGV471VSS.jpg','38500.00','3500.00','38500.00','1','133',NULL,'2025-06-03 11:28:06');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('686','5','Аккумлятор 7 А/ц','аккумлятор-7-а/ц','Аккумлятор 7 А/ц','2-53.jpg','38500.00','3500.00','38500.00','1','134',NULL,'2025-05-19 04:03:31');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('687','5','Кабель КСВВнг 2х0.5мм2','кабель-КСВВнг-2х0.5мм2','Кабель КСВВнг 2х0.5мм2','01JWTQKH3VWBZGA8Z9RSHX8KS2.jpg','990.00','85.00','935.00','1','135',NULL,'2025-08-12 05:13:36');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('688','5','Кабель КСВВнг 4х0,5 мм','кабель-ксввнг-4х05-мм','Кабель КСВВнг 4х0,5 мм','01JWTQM9H47QFYFV566T0N75VB.jpg','1430.00','120.00','1320.00','1','136',NULL,'2025-08-12 05:13:20');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('689','5','Кабель КПСЭнг(А)-FRLS 1х2х1.00 мм2 (200м)','кабель-КПСЭнг-(A)-frls-1х2х1.00-мм2 (200м)','Кабель КПСЭнг(А)-FRLS 1х2х1.00 мм2 (200м)','01JWTQMWEFF1FFS59ET7J9TBK3.jpg','3740.00','340.00','3740.00','1','137',NULL,'2025-08-12 05:14:11');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('690','5','Кабель КПСЭнг(А)-FRLS 1х2х1.50 мм2 (200м)','кабель-кпсэнга-frls-1х2х1.50-мм2-200м','Кабель КПСЭнг(А)-FRLS 1х2х1.50 мм2 (200м)','01JWTQNETFS3SWKRPVGG3YEBAY.jpg','4950.00','450.00','4950.00','1','138',NULL,'2025-08-12 05:14:24');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('691','1','Тунгус-3','тунгус-3','Тунгус-3','01JWTQR3JNCC9VFQ5SJNFYWRDH.png','240000.00','24000.00','264000.00','1','140',NULL,'2025-06-03 11:10:12');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('692','1','Тунгус-4','тунгус-4','Тунгус-4','01JWTQRH3PTP5Z3ZFKT3RFCEVS.png','280000.00','28000.00','308000.00','1','141',NULL,'2025-06-03 11:10:25');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('693','1','Тунгус-6И','тунгус-6и','Тунгус-6И','01JWTQS0A8M48V4RP35NH4WD14.jpg','320000.00','32000.00','352000.00','1','142',NULL,'2025-06-03 11:10:41');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('694','1','Тунгус-9','тунгус-9','Тунгус-9','01JWTQSEADS9SVNCFX5A0DM7VF.jpg','430000.00','43000.00','473000.00','1','143',NULL,'2025-06-03 11:10:55');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('695','1','Успаа 01','успаа-01','Успаа 01','01JWTQW1C5031K5WPNNWJWACMM.jpg','198000.00','9000.00','99000.00','1','144',NULL,'2025-06-03 11:12:20');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('696','1','ОСП-1 (100 С)','осп-1-100-с','ОСП-1 (100 С)','01JWTQYF6KRER88SVQVCDNZ7GC.png','156000.00','13000.00','143000.00','1','145',NULL,'2025-06-03 11:13:40');
INSERT INTO `products` (`id`,`product_category_id`,`name`,`slug`,`description`,`picture`,`price`,`vat`,`total`,`status`,`sort_order`,`created_at`,`updated_at`) VALUES ('697','1','ОСП-1 мини','осп-1-мини','ОСП-1 мини','01JWTQZ5M8ZSVB53K1SH8W9RJP.jpg','110000.00','9000.00','99000.00','1','146',NULL,'2025-06-03 11:14:03');

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


SET FOREIGN_KEY_CHECKS=1;
