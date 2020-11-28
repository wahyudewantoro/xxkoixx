/*
SQLyog Ultimate
MySQL - 5.7.24 : Database - laravel_koi_dev
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `auto_numbers` */

CREATE TABLE `auto_numbers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `auto_numbers` */

insert  into `auto_numbers`(`id`,`name`,`number`,`created_at`,`updated_at`) values (1,'302a1ab9bba98bb562200e72562b1127',1,'2020-09-02 13:50:04','2020-09-02 13:50:04');
insert  into `auto_numbers`(`id`,`name`,`number`,`created_at`,`updated_at`) values (2,'c1f0b2262d4616f8978d1d4afd016e3e',2,'2020-09-03 12:55:25','2020-09-03 12:57:50');

/*Table structure for table `failed_jobs` */

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `ikan_register` */

CREATE TABLE `ikan_register` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pendaftaran_ikan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ikan_register_pendaftaran_ikan_id_unique` (`pendaftaran_ikan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ikan_register` */

insert  into `ikan_register`(`id`,`pendaftaran_ikan_id`) values (4,'0d15c80da061454dbd93a8e095cdb86b');
insert  into `ikan_register`(`id`,`pendaftaran_ikan_id`) values (5,'166887d42a1b4006b855095b93a77054');
insert  into `ikan_register`(`id`,`pendaftaran_ikan_id`) values (6,'4108c943558c4e12ae1c330890a5a652');
insert  into `ikan_register`(`id`,`pendaftaran_ikan_id`) values (7,'53b2508d3baf4c18a68b92346be5d997');
insert  into `ikan_register`(`id`,`pendaftaran_ikan_id`) values (8,'6195229631194ef49f500f7423ee36de');
insert  into `ikan_register`(`id`,`pendaftaran_ikan_id`) values (1,'76e721df3b164d308c8e33464511cd60');
insert  into `ikan_register`(`id`,`pendaftaran_ikan_id`) values (2,'e7eed414a2404a4ab715a30440e7cd2a');
insert  into `ikan_register`(`id`,`pendaftaran_ikan_id`) values (9,'e845119fc1384a4ab24f26b09c32e5d7');

/*Table structure for table `jenis_ikan` */

CREATE TABLE `jenis_ikan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_ikan` */

insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (1,'Kohaku','A','A',1);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (2,'Taisho Sanshoku','A','A',2);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (3,'Showa Sanshoku','A','A',3);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (4,'Shiro Utsuri','B','B',4);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (5,'Koromo','B','B',5);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (6,'Ochiba','B','B',6);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (7,'Kinginrin A','B','B',7);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (8,'Kujaku','B','B',8);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (9,'Hikarimoyomono','C','C',9);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (10,'Tancho','C','C',10);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (11,'Kawarimono A','C','C',11);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (12,'Doitsu','C','C',12);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (13,'Kinginrin B','C','C',13);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (14,'Ghosiki','C','C',14);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (15,'Hikarimujimono','D','D',15);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (16,'Asagi','D','D',16);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (17,'Shusui','D','D',17);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (18,'Bekko','D','D',18);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (19,'Hi/Ki Utsurimono','D','D',19);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (20,'Kawarimono B','D','D',20);
insert  into `jenis_ikan`(`id`,`nama`,`kelas`,`kelas_alias`,`sort`) values (21,'Kinginrin C','D','D',21);

/*Table structure for table `kurang_bayar` */

CREATE TABLE `kurang_bayar` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pendaftaran_ikan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kurang_bayar` */

/*Table structure for table `lebih_bayar` */

CREATE TABLE `lebih_bayar` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pendaftaran_ikan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `lebih_bayar` */

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (2,'2014_10_12_100000_create_password_resets_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (3,'2017_08_03_055212_create_auto_numbers',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2019_08_19_000000_create_failed_jobs_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (5,'2020_08_23_071515_create_permission_tables',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (6,'2020_09_02_125012_create_refbiaya_table',2);
insert  into `migrations`(`id`,`migration`,`batch`) values (7,'2020_09_02_130700_create_jenis_ikan_table',3);
insert  into `migrations`(`id`,`migration`,`batch`) values (8,'2020_09_02_133531_create_pendaftaran_table',4);
insert  into `migrations`(`id`,`migration`,`batch`) values (9,'2020_09_02_133545_create_pendaftaran_ikan_table',5);
insert  into `migrations`(`id`,`migration`,`batch`) values (10,'2020_09_02_140117_create_refjuara_table',6);
insert  into `migrations`(`id`,`migration`,`batch`) values (11,'2020_09_03_140455_create_pembayaran_table',7);
insert  into `migrations`(`id`,`migration`,`batch`) values (12,'2020_09_03_142404_create_kurang_bayar_table',8);
insert  into `migrations`(`id`,`migration`,`batch`) values (13,'2020_09_03_142611_create_lebih_bayar_table',8);
insert  into `migrations`(`id`,`migration`,`batch`) values (14,'2020_09_03_142859_create_ikan_register_table',8);

/*Table structure for table `model_has_permissions` */

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (1,'App\\User',1);
insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (2,'App\\User',3);

/*Table structure for table `password_resets` */

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pembayaran` */

CREATE TABLE `pembayaran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pendaftaran_ikan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id`,`pendaftaran_ikan_id`,`nominal`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (1,'0d15c80da061454dbd93a8e095cdb86b',350000,'2020-09-03 15:04:46',1,NULL,NULL,NULL,NULL);
insert  into `pembayaran`(`id`,`pendaftaran_ikan_id`,`nominal`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (2,'166887d42a1b4006b855095b93a77054',250000,'2020-09-03 15:04:46',1,NULL,NULL,NULL,NULL);
insert  into `pembayaran`(`id`,`pendaftaran_ikan_id`,`nominal`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (3,'4108c943558c4e12ae1c330890a5a652',150000,'2020-09-03 15:04:46',1,NULL,NULL,NULL,NULL);
insert  into `pembayaran`(`id`,`pendaftaran_ikan_id`,`nominal`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (4,'53b2508d3baf4c18a68b92346be5d997',450000,'2020-09-03 15:04:46',1,NULL,NULL,NULL,NULL);
insert  into `pembayaran`(`id`,`pendaftaran_ikan_id`,`nominal`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (5,'6195229631194ef49f500f7423ee36de',500000,'2020-09-03 15:04:46',1,NULL,NULL,NULL,NULL);
insert  into `pembayaran`(`id`,`pendaftaran_ikan_id`,`nominal`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (6,'e845119fc1384a4ab24f26b09c32e5d7',250000,'2020-09-03 15:04:46',1,NULL,NULL,NULL,NULL);
insert  into `pembayaran`(`id`,`pendaftaran_ikan_id`,`nominal`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (21,'76e721df3b164d308c8e33464511cd60',500000,'2020-09-03 16:07:13',1,NULL,NULL,NULL,NULL);
insert  into `pembayaran`(`id`,`pendaftaran_ikan_id`,`nominal`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (22,'e7eed414a2404a4ab715a30440e7cd2a',450000,'2020-09-03 16:07:13',1,NULL,NULL,NULL,NULL);

/*Table structure for table `pendaftaran` */

CREATE TABLE `pendaftaran` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_handling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_handling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `bayar_at` datetime DEFAULT NULL,
  `bayar_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pendaftaran` */

insert  into `pendaftaran`(`id`,`code`,`nama_handling`,`kota_handling`,`no_telepon`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`,`bayar_at`,`bayar_by`) values ('270329fd6743476cbb7db29b8adf37d7','SK/2020.09.03/00001','Gang Koi','Solo','9238284','2020-09-03 12:55:25',3,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `pendaftaran`(`id`,`code`,`nama_handling`,`kota_handling`,`no_telepon`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`,`bayar_at`,`bayar_by`) values ('b6352cd136b143c08ceae8585c55384f','SK/2020.09.02/00001','Dua D Team','Jakarta','0239328347','2020-09-02 13:50:04',1,'2020-09-05 22:55:57',1,NULL,NULL,NULL,NULL);
insert  into `pendaftaran`(`id`,`code`,`nama_handling`,`kota_handling`,`no_telepon`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`,`bayar_at`,`bayar_by`) values ('ef53a944e3a14199bcb1d15415ea5e06','SK/2020.09.03/00002','Gang Koi','Solo','9238284','2020-09-03 12:57:50',3,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `pendaftaran_ikan` */

CREATE TABLE `pendaftaran_ikan` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendaftaran_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_handling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_handling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pemilik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_pemilik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_ikan_id` int(11) DEFAULT NULL,
  `jenis_ikan_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT '0',
  `breeder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pendaftaran_ikan` */

insert  into `pendaftaran_ikan`(`id`,`pendaftaran_id`,`nama_handling`,`kota_handling`,`no_telepon`,`nama_pemilik`,`kota_pemilik`,`jenis_ikan_id`,`jenis_ikan_nama`,`path_image`,`file_name`,`ukuran`,`biaya`,`status_bayar`,`breeder`,`gender`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values ('0d15c80da061454dbd93a8e095cdb86b','ef53a944e3a14199bcb1d15415ea5e06','Gang Koi','Solo','9238284','Kurnia Lesani Adnan','Jakarta',20,'Kawarimono B','app/public/images/1599137870_5f50e84ec6a8e.jpg','1599137870_5f50e84ec6a8e.jpg',32,350000,1,'Lokal','Female','2020-09-03 12:57:50',3,'2020-09-03 15:04:46',1,NULL,NULL);
insert  into `pendaftaran_ikan`(`id`,`pendaftaran_id`,`nama_handling`,`kota_handling`,`no_telepon`,`nama_pemilik`,`kota_pemilik`,`jenis_ikan_id`,`jenis_ikan_nama`,`path_image`,`file_name`,`ukuran`,`biaya`,`status_bayar`,`breeder`,`gender`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values ('166887d42a1b4006b855095b93a77054','ef53a944e3a14199bcb1d15415ea5e06','Gang Koi','Solo','9238284','Kurnia Lesani Adnan','Jakarta',18,'Bekko','app/public/images/1599137870_5f50e84e74136.jpg','1599137870_5f50e84e74136.jpg',24,250000,1,'Lokal','Male','2020-09-03 12:57:50',3,'2020-09-03 15:04:46',1,NULL,NULL);
insert  into `pendaftaran_ikan`(`id`,`pendaftaran_id`,`nama_handling`,`kota_handling`,`no_telepon`,`nama_pemilik`,`kota_pemilik`,`jenis_ikan_id`,`jenis_ikan_nama`,`path_image`,`file_name`,`ukuran`,`biaya`,`status_bayar`,`breeder`,`gender`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values ('4108c943558c4e12ae1c330890a5a652','ef53a944e3a14199bcb1d15415ea5e06','Gang Koi','Solo','9238284','Kurnia Lesani Adnan','Jakarta',2,'Taisho Sanshoku','app/public/images/1599137870_5f50e84eb6f48.jpg','1599137870_5f50e84eb6f48.jpg',15,150000,1,'Lokal','Male','2020-09-03 12:57:50',3,'2020-09-03 15:04:46',1,NULL,NULL);
insert  into `pendaftaran_ikan`(`id`,`pendaftaran_id`,`nama_handling`,`kota_handling`,`no_telepon`,`nama_pemilik`,`kota_pemilik`,`jenis_ikan_id`,`jenis_ikan_nama`,`path_image`,`file_name`,`ukuran`,`biaya`,`status_bayar`,`breeder`,`gender`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values ('53b2508d3baf4c18a68b92346be5d997','b6352cd136b143c08ceae8585c55384f','Dua D Team','Jakarta','0239328347','Dede Darmawan','Jakarta',8,'Kujaku','app/public/images/1599054604_5f4fa30c68158.JPG','1599054604_5f4fa30c68158.JPG',45,450000,1,'Impor','Male','2020-09-02 13:50:04',1,'2020-09-05 22:55:57',1,NULL,NULL);
insert  into `pendaftaran_ikan`(`id`,`pendaftaran_id`,`nama_handling`,`kota_handling`,`no_telepon`,`nama_pemilik`,`kota_pemilik`,`jenis_ikan_id`,`jenis_ikan_nama`,`path_image`,`file_name`,`ukuran`,`biaya`,`status_bayar`,`breeder`,`gender`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values ('6195229631194ef49f500f7423ee36de','b6352cd136b143c08ceae8585c55384f','Dua D Team','Jakarta','0239328347','Dede Darmawan','Jakarta',7,'Kinginrin A','app/public/images/1599054604_5f4fa30c31ccd.JPG','1599054604_5f4fa30c31ccd.JPG',50,500000,1,'Impor','Male','2020-09-02 13:50:04',1,'2020-09-05 22:55:57',1,NULL,NULL);
insert  into `pendaftaran_ikan`(`id`,`pendaftaran_id`,`nama_handling`,`kota_handling`,`no_telepon`,`nama_pemilik`,`kota_pemilik`,`jenis_ikan_id`,`jenis_ikan_nama`,`path_image`,`file_name`,`ukuran`,`biaya`,`status_bayar`,`breeder`,`gender`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values ('6ffd5a4128234ea4b01be96fbfe930d3','b6352cd136b143c08ceae8585c55384f','Dua D Team','Jakarta','0239328347','Dede Darmawan','Jakarta',4,'Shiro Utsuri','app/public/images/1599321359_5f53b50f6b863.jpg','1599321359_5f53b50f6b863.jpg',15,150000,0,'Lokal','Male','2020-09-05 22:55:59',1,NULL,NULL,NULL,NULL);
insert  into `pendaftaran_ikan`(`id`,`pendaftaran_id`,`nama_handling`,`kota_handling`,`no_telepon`,`nama_pemilik`,`kota_pemilik`,`jenis_ikan_id`,`jenis_ikan_nama`,`path_image`,`file_name`,`ukuran`,`biaya`,`status_bayar`,`breeder`,`gender`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values ('76e721df3b164d308c8e33464511cd60','270329fd6743476cbb7db29b8adf37d7','Gang Koi','Solo','9238284','Rian Mahendra','Kudus',7,'Kinginrin A','app/public/images/1599137726_5f50e7be0b485.JPG','1599137726_5f50e7be0b485.JPG',50,500000,1,'Impor','Male','2020-09-03 12:55:26',3,'2020-09-03 16:07:13',1,NULL,NULL);
insert  into `pendaftaran_ikan`(`id`,`pendaftaran_id`,`nama_handling`,`kota_handling`,`no_telepon`,`nama_pemilik`,`kota_pemilik`,`jenis_ikan_id`,`jenis_ikan_nama`,`path_image`,`file_name`,`ukuran`,`biaya`,`status_bayar`,`breeder`,`gender`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values ('a2c84336f6ba44d3911c249a508a555c','b6352cd136b143c08ceae8585c55384f','Dua D Team','Jakarta','0239328347','Dede Darmawan','Jakarta',20,'Kawarimono B','app/public/images/1599321357_5f53b50da9e1a.jpg','1599321357_5f53b50da9e1a.jpg',32,350000,0,'Lokal','Female','2020-09-05 22:55:59',1,NULL,NULL,NULL,NULL);
insert  into `pendaftaran_ikan`(`id`,`pendaftaran_id`,`nama_handling`,`kota_handling`,`no_telepon`,`nama_pemilik`,`kota_pemilik`,`jenis_ikan_id`,`jenis_ikan_nama`,`path_image`,`file_name`,`ukuran`,`biaya`,`status_bayar`,`breeder`,`gender`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values ('b0f228940e404ad2a1eea6e262e239a8','b6352cd136b143c08ceae8585c55384f','Dua D Team','Jakarta','0239328347','Dede Darmawan','Jakarta',7,'Kinginrin A','app/public/images/1599321359_5f53b50f8f146.jpg','1599321359_5f53b50f8f146.jpg',34,350000,0,'Lokal','Female','2020-09-05 22:55:59',1,NULL,NULL,NULL,NULL);
insert  into `pendaftaran_ikan`(`id`,`pendaftaran_id`,`nama_handling`,`kota_handling`,`no_telepon`,`nama_pemilik`,`kota_pemilik`,`jenis_ikan_id`,`jenis_ikan_nama`,`path_image`,`file_name`,`ukuran`,`biaya`,`status_bayar`,`breeder`,`gender`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values ('e7eed414a2404a4ab715a30440e7cd2a','270329fd6743476cbb7db29b8adf37d7','Gang Koi','Solo','9238284','Rian Mahendra','Kudus',8,'Kujaku','app/public/images/1599137726_5f50e7be37da2.JPG','1599137726_5f50e7be37da2.JPG',45,450000,1,'Impor','Male','2020-09-03 12:55:26',3,'2020-09-03 16:07:13',1,NULL,NULL);
insert  into `pendaftaran_ikan`(`id`,`pendaftaran_id`,`nama_handling`,`kota_handling`,`no_telepon`,`nama_pemilik`,`kota_pemilik`,`jenis_ikan_id`,`jenis_ikan_nama`,`path_image`,`file_name`,`ukuran`,`biaya`,`status_bayar`,`breeder`,`gender`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values ('e845119fc1384a4ab24f26b09c32e5d7','ef53a944e3a14199bcb1d15415ea5e06','Gang Koi','Solo','9238284','Kurnia Lesani Adnan','Jakarta',10,'Tancho','app/public/images/1599137870_5f50e84e983ca.jpg','1599137870_5f50e84e983ca.jpg',23,250000,1,'Lokal','Female','2020-09-03 12:57:50',3,'2020-09-03 15:04:46',1,NULL,NULL);

/*Table structure for table `permissions` */

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (1,'user.list','web','2020-09-02 12:30:10','2020-09-02 12:30:10');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (2,'user.role','web','2020-09-02 12:30:10','2020-09-02 12:30:10');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (3,'role.list','web','2020-09-02 12:30:10','2020-09-02 12:30:10');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (4,'role.create','web','2020-09-02 12:30:10','2020-09-02 12:30:10');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (5,'role.edit','web','2020-09-02 12:30:10','2020-09-02 12:30:10');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (6,'role.delete','web','2020-09-02 12:30:11','2020-09-02 12:30:11');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (7,'permissions.list','web','2020-09-02 12:30:11','2020-09-02 12:30:11');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (8,'permissions.create','web','2020-09-02 12:30:11','2020-09-02 12:30:11');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (9,'permissions.edit','web','2020-09-02 12:30:11','2020-09-02 12:30:11');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (10,'permissions.delete','web','2020-09-02 12:30:11','2020-09-02 12:30:11');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (11,'event','web','2020-09-02 12:33:02','2020-09-02 12:33:02');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (12,'jenisikan.list','web','2020-09-02 12:38:25','2020-09-02 12:38:25');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (13,'jenisikan.create','web','2020-09-02 12:38:25','2020-09-02 12:38:25');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (14,'jenisikan.edit','web','2020-09-02 12:38:25','2020-09-02 12:38:25');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (15,'jenisikan.delete','web','2020-09-02 12:38:25','2020-09-02 12:38:25');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (16,'biaya.list','web','2020-09-02 12:38:25','2020-09-02 12:38:25');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (17,'biaya.create','web','2020-09-02 12:38:25','2020-09-02 12:38:25');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (18,'biaya.edit','web','2020-09-02 12:38:26','2020-09-02 12:38:26');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (19,'biaya.delete','web','2020-09-02 12:38:26','2020-09-02 12:38:26');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (20,'poin.list','web','2020-09-02 12:38:26','2020-09-02 12:38:26');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (21,'poin.create','web','2020-09-02 12:38:26','2020-09-02 12:38:26');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (22,'poin.edit','web','2020-09-02 12:38:26','2020-09-02 12:38:26');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (23,'poin.delete','web','2020-09-02 12:38:26','2020-09-02 12:38:26');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (24,'daftar.create','web','2020-09-02 12:41:55','2020-09-02 12:41:55');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (25,'daftar.list','web','2020-09-02 12:42:14','2020-09-02 12:42:14');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (26,'tagihan.list','web','2020-09-02 12:42:41','2020-09-02 12:42:41');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (27,'tagihan.payletter','web','2020-09-02 12:43:37','2020-09-02 12:43:37');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (28,'tagihan.lunas','web','2020-09-02 12:44:06','2020-09-03 15:11:32');

/*Table structure for table `refbiaya` */

CREATE TABLE `refbiaya` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ukuran_min` int(11) NOT NULL,
  `ukuran_max` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `refbiaya` */

insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,0,10,100000,'Up to 10 cm',NULL,NULL,NULL,NULL);
insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (2,11,15,150000,'11 - 15 cm',NULL,NULL,NULL,NULL);
insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (3,16,20,200000,'16 - 20 cm',NULL,NULL,NULL,NULL);
insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (4,21,25,250000,'21 - 25 cm',NULL,NULL,NULL,NULL);
insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (5,26,30,300000,'26 - 30 cm',NULL,NULL,NULL,NULL);
insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (6,31,35,350000,'31 - 35 cm',NULL,NULL,NULL,NULL);
insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (7,36,40,400000,'36 - 40 cm',NULL,NULL,NULL,NULL);
insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (8,41,45,450000,'41 - 45 cm',NULL,NULL,NULL,NULL);
insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (9,46,50,500000,'46 - 50 cm',NULL,NULL,NULL,NULL);
insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (10,51,55,600000,'51 - 55 cm',NULL,NULL,NULL,NULL);
insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (11,56,60,700000,'56 - 60 cm',NULL,NULL,NULL,NULL);
insert  into `refbiaya`(`id`,`ukuran_min`,`ukuran_max`,`biaya`,`keterangan`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (12,61,65,800000,'61 - 65 cm',NULL,NULL,NULL,NULL);

/*Table structure for table `refjuara` */

CREATE TABLE `refjuara` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_up` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `refjuara` */

insert  into `refjuara`(`id`,`nama`,`id_up`) values (1,'Juara 1',NULL);
insert  into `refjuara`(`id`,`nama`,`id_up`) values (2,'Juara 2',1);
insert  into `refjuara`(`id`,`nama`,`id_up`) values (3,'Juara 3',2);
insert  into `refjuara`(`id`,`nama`,`id_up`) values (4,'Juara 4',3);
insert  into `refjuara`(`id`,`nama`,`id_up`) values (5,'Juara 5',4);
insert  into `refjuara`(`id`,`nama`,`id_up`) values (6,'Best In Size',NULL);
insert  into `refjuara`(`id`,`nama`,`id_up`) values (7,'Runner Up',NULL);
insert  into `refjuara`(`id`,`nama`,`id_up`) values (8,'Champion',NULL);

/*Table structure for table `role_has_permissions` */

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values (1,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (2,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (3,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (4,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (5,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (6,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (7,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (8,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (9,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (10,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (11,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (12,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (13,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (14,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (15,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (16,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (17,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (18,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (19,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (20,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (21,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (22,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (23,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (24,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (25,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (26,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (27,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (28,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (24,2);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (25,2);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (26,2);

/*Table structure for table `roles` */

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (1,'Admin Probis','web','2020-09-02 12:30:11','2020-09-02 12:30:11');
insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (2,'Handling','web','2020-09-03 12:49:23','2020-09-03 12:49:23');

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`kota`,`no_hp`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Administrator','Kediri','082330319913','admin@admin.com',NULL,'$2y$10$850Z.cEaS.9HpxjaGXr/0el1h/GCghE/5EN4WHVyhG/aLKWiyZIWC',NULL,'2020-09-02 12:30:10','2020-09-02 12:30:10');
insert  into `users`(`id`,`name`,`kota`,`no_hp`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (3,'Gang Koi','Solo','9238284','gangkoi@mail.com',NULL,'$2y$10$ay2yIFFEui1drJAiZ6JNZOKF1RnpSaUMIRRfGEPJ2Kpgek.Nxi1aa',NULL,'2020-09-03 12:50:52','2020-09-03 12:50:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
