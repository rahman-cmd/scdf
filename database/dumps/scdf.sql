-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: 127.0.0.1    Database: scdf
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('scdf-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6','i:1;',1793455964),('scdf-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer','i:1793455964;',1793455964);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'BDT',
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donations`
--

LOCK TABLES `donations` WRITE;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
INSERT INTO `donations` VALUES (1,'MD ABDUR RAHMAN','mmm.sajib7@gmail.com',25.00,NULL,NULL,'BDT','new',NULL,'2026-10-31 08:32:28','2026-10-31 08:32:28');
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impact_stats`
--

DROP TABLE IF EXISTS `impact_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impact_stats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `figure` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fa-chart-line',
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impact_stats`
--

LOCK TABLES `impact_stats` WRITE;
/*!40000 ALTER TABLE `impact_stats` DISABLE KEYS */;
INSERT INTO `impact_stats` VALUES (1,'64','Districts Reach','Working in coastal and vulnerable regions across Bangladesh.','fa-user-group',1,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(2,'25+','Program Areas','From healthcare to climate action, we work across multiple sectors.','fa-gears',2,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(3,'10,000+','Beneficiaries','Supporting coastal families and vulnerable communities every year.','fa-user',3,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(4,'100+','Volunteers & Partners','Together for a stronger, more resilient Bangladesh.','fa-handshake',4,1,'2026-10-31 08:01:57','2026-10-31 08:01:57');
/*!40000 ALTER TABLE `impact_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_10_31_000001_create_site_settings_table',2),(5,'2026_10_31_000002_create_programs_table',2),(6,'2026_10_31_000003_create_projects_table',2),(7,'2026_10_31_000004_create_impact_stats_table',2),(8,'2026_10_31_000005_create_value_cards_table',2),(9,'2026_10_31_000006_create_donations_table',2),(10,'2026_10_31_143002_add_logo_fields_to_site_settings_table',3),(11,'2026_10_31_143500_add_manual_payment_fields_to_site_settings_and_donations_tables',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fa-leaf',
  `tone` varchar(255) NOT NULL DEFAULT 'bg-brand',
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` VALUES (1,'Coastal Protection & Embankments','Stronger coastal infrastructure for safer communities.','images/coastal-protection.jpg','Waves meeting a protected shoreline','fa-water','bg-sea',1,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(2,'Floating Hospital & Maternal Care','Healthcare for remote islands and vulnerable people.','images/floating-hospital.jpg','Families traveling by country boat along a river','fa-staff-snake','bg-rose-500',2,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(3,'Education & EdTech','Quality education and digital learning for a brighter future.','images/education-edtech.jpg','Students learning together in a classroom','fa-book-open','bg-partner',3,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(4,'Renewable Energy & Solar Lighting','Clean energy for safer, greener coastal communities.','images/solar-lighting.jpg','Rows of solar panels under a bright sky','fa-sun','bg-amber-500',4,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(5,'Livelihoods, Agriculture & Fisheries','Sustainable livelihoods and food security.','images/livelihoods.jpg','A fisherman rowing through morning mist in Bangladesh','fa-fish','bg-teal-600',5,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(6,'Waste Management & Recycling','Cleaner communities and a healthier environment.','images/waste-recycling.jpg','Color-coded recycling bins','fa-recycle','bg-brand',6,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(7,'Biodiversity & Mangrove Conservation','Protecting the Sundarbans and coastal ecosystems.','images/mangrove-biodiversity.jpg','Aerial view of mangrove islands and a winding river','fa-leaf','bg-emerald-600',7,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(8,'Emergency Relief & Disaster Response','Rapid support during cyclones, floods and other disasters.','images/emergency-relief.jpg','Floodwater covering a street after heavy rain','fa-house-flood-water','bg-rose-700',8,1,'2026-10-31 08:01:57','2026-10-31 08:01:57');
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fa-leaf',
  `tone` varchar(255) NOT NULL DEFAULT 'bg-brand',
  `link_label` varchar(255) NOT NULL DEFAULT 'Learn More',
  `link_url` varchar(255) NOT NULL DEFAULT '#contact',
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Mangrove Restoration & Green Belt','Restoring mangroves to protect coastal communities, enhance biodiversity and build a greener, safer tomorrow.','images/project-mangrove.jpg','Mangrove waterways and small islands','fa-leaf','bg-brand','Learn More','#contact',1,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(2,'Floating Hospital for Remote Islands','Bringing essential healthcare and maternal care to remote coastal communities and river islands.','images/project-hospital.jpg','A doctor checking a child with a stethoscope','fa-staff-snake','bg-rose-600','Learn More','#contact',2,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(3,'Solar Light for Coastal Communities','Installing solar street lights to create safer, cleaner and more resilient coastal villages.','images/project-solar.jpg','A field of solar panels under a blue sky','fa-solar-panel','bg-emerald-600','Learn More','#contact',3,1,'2026-10-31 08:01:57','2026-10-31 08:01:57');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `hero_eyebrow` varchar(255) DEFAULT NULL,
  `hero_title_line_1` varchar(255) DEFAULT NULL,
  `hero_title_line_2` varchar(255) DEFAULT NULL,
  `hero_body` text DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `about_eyebrow` varchar(255) DEFAULT NULL,
  `about_title` varchar(255) DEFAULT NULL,
  `about_body` text DEFAULT NULL,
  `about_image` varchar(255) DEFAULT NULL,
  `about_image_alt` varchar(255) DEFAULT NULL,
  `programs_eyebrow` varchar(255) DEFAULT NULL,
  `programs_title` varchar(255) DEFAULT NULL,
  `programs_intro` text DEFAULT NULL,
  `impact_eyebrow` varchar(255) DEFAULT NULL,
  `impact_title` varchar(255) DEFAULT NULL,
  `impact_body` text DEFAULT NULL,
  `impact_image` varchar(255) DEFAULT NULL,
  `impact_callout_line_1` varchar(255) DEFAULT NULL,
  `impact_callout_line_2` varchar(255) DEFAULT NULL,
  `projects_eyebrow` varchar(255) DEFAULT NULL,
  `projects_title` varchar(255) DEFAULT NULL,
  `projects_intro` text DEFAULT NULL,
  `donate_eyebrow` varchar(255) DEFAULT NULL,
  `donate_title` varchar(255) DEFAULT NULL,
  `donate_body` text DEFAULT NULL,
  `donate_image` varchar(255) DEFAULT NULL,
  `payment_bkash` varchar(255) DEFAULT NULL,
  `payment_nagad` varchar(255) DEFAULT NULL,
  `payment_rocket` varchar(255) DEFAULT NULL,
  `payment_upay` varchar(255) DEFAULT NULL,
  `payment_note` varchar(255) DEFAULT NULL,
  `cta_title` varchar(255) DEFAULT NULL,
  `cta_body` text DEFAULT NULL,
  `cta_image` varchar(255) DEFAULT NULL,
  `contact_website` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_location` varchar(255) DEFAULT NULL,
  `contact_location_note` varchar(255) DEFAULT NULL,
  `social_facebook` varchar(255) DEFAULT NULL,
  `social_youtube` varchar(255) DEFAULT NULL,
  `social_linkedin` varchar(255) DEFAULT NULL,
  `footer_tagline` varchar(255) DEFAULT NULL,
  `footer_mission` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (1,'images/scdf.png','images/logo_w.png','Sunderban & Coastal Development Foundation','Building Resilient','Coastal Communities','A non-political, non-profit, non-sectarian humanitarian and development foundation working across climate resilience, infrastructure, healthcare, education, livelihoods and environmental protection in Bangladesh.','images/hero-coastal.jpg','About SCDF','Our Mission for a Resilient Bangladesh','Sunderban & Coastal Development Foundation (SCDF) is a non-political, non-profit, non-sectarian humanitarian and development foundation working for a safer, healthier and more resilient Bangladesh. We focus on coastal and vulnerable regions, supporting communities through climate resilience, infrastructure, healthcare, education, livelihoods and environmental conservation.','images/about-community.jpg','Volunteers distributing relief supplies to a community','Our Programs','Key Focus Areas','We work across multiple sectors to build stronger, safer and more resilient coastal communities in Bangladesh.','Our Impact','Creating Real Change in Coastal Bangladesh','Through community-driven programs and strong partnerships, SCDF is making a positive impact across coastal regions and vulnerable communities.','images/impact-coast.jpg','Stronger Communities','A Greener, Safer Bangladesh','Featured Initiatives','Highlighted Projects for a Better Tomorrow','Explore some of our key initiatives making a real difference in coastal communities.','Make a Difference','Support SCDF','Your donation helps coastal families with healthcare, education, infrastructure, livelihoods and environmental conservation. Together we can build stronger, safer and more resilient communities in Bangladesh.','images/donation-family.jpg','01700000000','01700000000','01700000000','01700000000','Use Send Money (Personal). After payment, submit your TrxID below so we can confirm.','Join Hands for a Stronger, Greener Tomorrow','Volunteer, partner or sponsor with SCDF and be part of our mission to build resilient coastal communities in Bangladesh.','images/cta-team.jpg','https://scdf-bd.org','info@scdf-bd.org','Dhaka, Bangladesh','Working across coastal regions','#','#','#','People • Nature • Resilient Communities','A non-profit foundation dedicated to coastal development, humanitarian service and sustainability.','2026-10-31 08:01:57','2026-10-31 08:37:07');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'SCDF Admin','admin@scdf-bd.org',NULL,'$2y$12$d.W56TxGMpA/AWR7XriWIuV/rbx.5oQFwi/nzKVoEqBw2z86kGzeq','bu5wCssyzT1uj4qbrmqkynHqJdIHEolI5PBeTwQzPrPlFWt76Ldjjee4J7Wm','2026-10-31 08:01:57','2026-10-31 08:01:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `value_cards`
--

DROP TABLE IF EXISTS `value_cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `value_cards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fa-handshake',
  `icon_tone` varchar(255) NOT NULL DEFAULT 'text-partner',
  `bg_tone` varchar(255) NOT NULL DEFAULT 'bg-[#edf7fe]',
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `value_cards`
--

LOCK TABLES `value_cards` WRITE;
/*!40000 ALTER TABLE `value_cards` DISABLE KEYS */;
INSERT INTO `value_cards` VALUES (1,'Non-political','We remain independent, non-political and focused only on people\'s welfare.','fa-handshake','text-partner','bg-[#edf7fe]',1,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(2,'Inclusive','We work for all, regardless of religion, gender, ethnicity or background.','fa-users','text-brand','bg-[#eff9ef]',2,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(3,'Sustainable','We promote long-term, climate-resilient and environmentally sustainable solutions.','fa-seedling','text-amber-500','bg-[#fff7ea]',3,1,'2026-10-31 08:01:57','2026-10-31 08:01:57'),(4,'Transparent','We ensure accountable, efficient and transparent use of resources.','fa-shield-halved','text-navy-mid','bg-[#edf7fe]',4,1,'2026-10-31 08:01:57','2026-10-31 08:01:57');
/*!40000 ALTER TABLE `value_cards` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-31 20:46:49
