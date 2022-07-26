/*
Navicat MySQL Data Transfer

Source Server         : mySQL
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ecom_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-02-13 18:16:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for amount_paid_to_vendors
-- ----------------------------
DROP TABLE IF EXISTS `amount_paid_to_vendors`;
CREATE TABLE `amount_paid_to_vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of amount_paid_to_vendors
-- ----------------------------

-- ----------------------------
-- Table structure for amount_received_by_admin
-- ----------------------------
DROP TABLE IF EXISTS `amount_received_by_admin`;
CREATE TABLE `amount_received_by_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of amount_received_by_admin
-- ----------------------------

-- ----------------------------
-- Table structure for amount_received_by_customer
-- ----------------------------
DROP TABLE IF EXISTS `amount_received_by_customer`;
CREATE TABLE `amount_received_by_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of amount_received_by_customer
-- ----------------------------

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of brands
-- ----------------------------
INSERT INTO `brands` VALUES ('1', 'DELL');
INSERT INTO `brands` VALUES ('2', 'HP');
INSERT INTO `brands` VALUES ('3', 'Samsang');
INSERT INTO `brands` VALUES ('4', 'OPPO');
INSERT INTO `brands` VALUES ('6', 'QMobile');
INSERT INTO `brands` VALUES ('7', 'Honda');
INSERT INTO `brands` VALUES ('8', 'JavaScript');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Computers');
INSERT INTO `categories` VALUES ('2', 'LCDs');
INSERT INTO `categories` VALUES ('3', 'Processor');
INSERT INTO `categories` VALUES ('13', 'Mobile');
INSERT INTO `categories` VALUES ('15', 'Mirrer');
INSERT INTO `categories` VALUES ('16', 'Bike');

-- ----------------------------
-- Table structure for countary
-- ----------------------------
DROP TABLE IF EXISTS `countary`;
CREATE TABLE `countary` (
  `countary_id` int(11) NOT NULL AUTO_INCREMENT,
  `countary_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`countary_id`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of countary
-- ----------------------------
INSERT INTO `countary` VALUES ('1', 'India');
INSERT INTO `countary` VALUES ('2', 'United States');
INSERT INTO `countary` VALUES ('3', 'Indonesia');
INSERT INTO `countary` VALUES ('4', 'Brazil');
INSERT INTO `countary` VALUES ('5', 'Pakistan');
INSERT INTO `countary` VALUES ('6', 'Nigeria');
INSERT INTO `countary` VALUES ('7', 'Bangladesh');
INSERT INTO `countary` VALUES ('8', 'Russia');
INSERT INTO `countary` VALUES ('9', 'Japan');
INSERT INTO `countary` VALUES ('10', 'Mexico');
INSERT INTO `countary` VALUES ('11', 'Philippines');
INSERT INTO `countary` VALUES ('12', 'Vietnam');
INSERT INTO `countary` VALUES ('13', 'Ethiopia');
INSERT INTO `countary` VALUES ('14', 'Egypt');
INSERT INTO `countary` VALUES ('15', 'Germany');
INSERT INTO `countary` VALUES ('16', 'Iran');
INSERT INTO `countary` VALUES ('17', 'Turkey');
INSERT INTO `countary` VALUES ('18', 'Democratic Republic of the Congo');
INSERT INTO `countary` VALUES ('19', 'Thailand');
INSERT INTO `countary` VALUES ('20', 'France');
INSERT INTO `countary` VALUES ('21', 'United Kingdom');
INSERT INTO `countary` VALUES ('22', 'Italy');
INSERT INTO `countary` VALUES ('23', 'Burma');
INSERT INTO `countary` VALUES ('24', 'South Africa');
INSERT INTO `countary` VALUES ('25', 'South Korea');
INSERT INTO `countary` VALUES ('26', 'Colombia');
INSERT INTO `countary` VALUES ('27', 'Spain');
INSERT INTO `countary` VALUES ('28', 'Ukraine');
INSERT INTO `countary` VALUES ('29', 'Tanzania');
INSERT INTO `countary` VALUES ('30', 'Kenya');
INSERT INTO `countary` VALUES ('31', 'Argentina');
INSERT INTO `countary` VALUES ('32', 'Algeria');
INSERT INTO `countary` VALUES ('33', 'Poland');
INSERT INTO `countary` VALUES ('34', 'Sudan');
INSERT INTO `countary` VALUES ('35', 'Uganda');
INSERT INTO `countary` VALUES ('36', 'Canada');
INSERT INTO `countary` VALUES ('37', 'Iraq');
INSERT INTO `countary` VALUES ('38', 'Morocco');
INSERT INTO `countary` VALUES ('39', 'Peru');
INSERT INTO `countary` VALUES ('40', 'Uzbekistan');
INSERT INTO `countary` VALUES ('41', 'Saudi Arabia');
INSERT INTO `countary` VALUES ('42', 'Malaysia');
INSERT INTO `countary` VALUES ('43', 'Venezuela');
INSERT INTO `countary` VALUES ('44', 'Nepal');
INSERT INTO `countary` VALUES ('45', 'Afghanistan');
INSERT INTO `countary` VALUES ('46', 'Yemen');
INSERT INTO `countary` VALUES ('47', 'North Korea');
INSERT INTO `countary` VALUES ('48', 'Ghana');
INSERT INTO `countary` VALUES ('49', 'Mozambique');
INSERT INTO `countary` VALUES ('50', 'Taiwan');
INSERT INTO `countary` VALUES ('51', 'Australia');
INSERT INTO `countary` VALUES ('52', 'Ivory Coast');
INSERT INTO `countary` VALUES ('53', 'Syria');
INSERT INTO `countary` VALUES ('54', 'Madagascar');
INSERT INTO `countary` VALUES ('55', 'Angola');
INSERT INTO `countary` VALUES ('56', 'Cameroon');
INSERT INTO `countary` VALUES ('57', 'Sri Lanka');
INSERT INTO `countary` VALUES ('58', 'Romania');
INSERT INTO `countary` VALUES ('59', 'Burkina Faso');
INSERT INTO `countary` VALUES ('60', 'Niger');
INSERT INTO `countary` VALUES ('61', 'Kazakhstan');
INSERT INTO `countary` VALUES ('62', 'Netherlands');
INSERT INTO `countary` VALUES ('63', 'Chile');
INSERT INTO `countary` VALUES ('64', 'Malawi');
INSERT INTO `countary` VALUES ('65', 'Ecuador');
INSERT INTO `countary` VALUES ('66', 'Guatemala');
INSERT INTO `countary` VALUES ('67', 'Mali');
INSERT INTO `countary` VALUES ('68', 'Cambodia');
INSERT INTO `countary` VALUES ('69', 'Senegal');
INSERT INTO `countary` VALUES ('70', 'Zambia');
INSERT INTO `countary` VALUES ('71', 'Zimbabwe');
INSERT INTO `countary` VALUES ('72', 'Chad');
INSERT INTO `countary` VALUES ('73', 'South Sudan');
INSERT INTO `countary` VALUES ('74', 'Belgium');
INSERT INTO `countary` VALUES ('75', 'Cuba');
INSERT INTO `countary` VALUES ('76', 'Tunisia');
INSERT INTO `countary` VALUES ('77', 'Guinea');
INSERT INTO `countary` VALUES ('78', 'Greece');
INSERT INTO `countary` VALUES ('79', 'Portugal');
INSERT INTO `countary` VALUES ('80', 'Rwanda');
INSERT INTO `countary` VALUES ('81', 'Czech Republic');
INSERT INTO `countary` VALUES ('82', 'Somalia');
INSERT INTO `countary` VALUES ('83', 'Haiti');
INSERT INTO `countary` VALUES ('84', 'Benin');
INSERT INTO `countary` VALUES ('85', 'Burundi');
INSERT INTO `countary` VALUES ('86', 'Bolivia');
INSERT INTO `countary` VALUES ('87', 'Hungary');
INSERT INTO `countary` VALUES ('88', 'Sweden');
INSERT INTO `countary` VALUES ('89', 'Belarus');
INSERT INTO `countary` VALUES ('90', 'Dominican Republic');
INSERT INTO `countary` VALUES ('91', 'Azerbaijan');
INSERT INTO `countary` VALUES ('92', 'Honduras');
INSERT INTO `countary` VALUES ('93', 'Austria');
INSERT INTO `countary` VALUES ('94', 'United Arab Emirates');
INSERT INTO `countary` VALUES ('95', 'Israel');
INSERT INTO `countary` VALUES ('96', 'Switzerland');
INSERT INTO `countary` VALUES ('97', 'Tajikistan');
INSERT INTO `countary` VALUES ('98', 'Bulgaria');
INSERT INTO `countary` VALUES ('99', 'Hong Kong (China)');
INSERT INTO `countary` VALUES ('100', 'Serbia');
INSERT INTO `countary` VALUES ('101', 'Papua New Guinea');
INSERT INTO `countary` VALUES ('102', 'Paraguay');
INSERT INTO `countary` VALUES ('103', 'Laos');
INSERT INTO `countary` VALUES ('104', 'Jordan');
INSERT INTO `countary` VALUES ('105', 'El Salvador');
INSERT INTO `countary` VALUES ('106', 'Eritrea');
INSERT INTO `countary` VALUES ('107', 'Libya');
INSERT INTO `countary` VALUES ('108', 'Togo');
INSERT INTO `countary` VALUES ('109', 'Sierra Leone');
INSERT INTO `countary` VALUES ('110', 'Nicaragua');
INSERT INTO `countary` VALUES ('111', 'Kyrgyzstan');
INSERT INTO `countary` VALUES ('112', 'Denmark');
INSERT INTO `countary` VALUES ('113', 'Finland');
INSERT INTO `countary` VALUES ('114', 'Slovakia');
INSERT INTO `countary` VALUES ('115', 'Singapore');
INSERT INTO `countary` VALUES ('116', 'Turkmenistan');
INSERT INTO `countary` VALUES ('117', 'Norway');
INSERT INTO `countary` VALUES ('118', 'Lebanon');
INSERT INTO `countary` VALUES ('119', 'Costa Rica');
INSERT INTO `countary` VALUES ('120', 'Central African Republic');
INSERT INTO `countary` VALUES ('121', 'Ireland');
INSERT INTO `countary` VALUES ('122', 'Georgia');
INSERT INTO `countary` VALUES ('123', 'New Zealand');
INSERT INTO `countary` VALUES ('124', 'Republic of the Congo');
INSERT INTO `countary` VALUES ('125', 'Palestine');
INSERT INTO `countary` VALUES ('126', 'Liberia');
INSERT INTO `countary` VALUES ('127', 'Croatia');
INSERT INTO `countary` VALUES ('128', 'Oman');
INSERT INTO `countary` VALUES ('129', 'Bosnia and Herzegovina');
INSERT INTO `countary` VALUES ('130', 'Puerto Rico');
INSERT INTO `countary` VALUES ('131', 'Kuwait');
INSERT INTO `countary` VALUES ('132', 'Moldov');
INSERT INTO `countary` VALUES ('133', 'Mauritania');
INSERT INTO `countary` VALUES ('134', 'Panama');
INSERT INTO `countary` VALUES ('135', 'Uruguay');
INSERT INTO `countary` VALUES ('136', 'Armenia');
INSERT INTO `countary` VALUES ('137', 'Lithuania');
INSERT INTO `countary` VALUES ('138', 'Albania');
INSERT INTO `countary` VALUES ('139', 'Mongolia');
INSERT INTO `countary` VALUES ('140', 'Jamaica');
INSERT INTO `countary` VALUES ('141', 'Namibia');
INSERT INTO `countary` VALUES ('142', 'Lesotho');
INSERT INTO `countary` VALUES ('143', 'Qatar');
INSERT INTO `countary` VALUES ('144', 'Macedonia');
INSERT INTO `countary` VALUES ('145', 'Slovenia');
INSERT INTO `countary` VALUES ('146', 'Botswana');
INSERT INTO `countary` VALUES ('147', 'Latvia');
INSERT INTO `countary` VALUES ('148', 'Gambia');
INSERT INTO `countary` VALUES ('149', 'Kosovo');
INSERT INTO `countary` VALUES ('150', 'Guinea-Bissau');
INSERT INTO `countary` VALUES ('151', 'Gabon');
INSERT INTO `countary` VALUES ('152', 'Equatorial Guinea');
INSERT INTO `countary` VALUES ('153', 'Trinidad and Tobago');
INSERT INTO `countary` VALUES ('154', 'Estonia');
INSERT INTO `countary` VALUES ('155', 'Mauritius');
INSERT INTO `countary` VALUES ('156', 'Swaziland');
INSERT INTO `countary` VALUES ('157', 'Bahrain');
INSERT INTO `countary` VALUES ('158', 'Timor-Leste');
INSERT INTO `countary` VALUES ('159', 'Djibouti');
INSERT INTO `countary` VALUES ('160', 'Cyprus');
INSERT INTO `countary` VALUES ('161', 'Fiji');
INSERT INTO `countary` VALUES ('162', 'Reunion (France)');
INSERT INTO `countary` VALUES ('163', 'Guyana');
INSERT INTO `countary` VALUES ('164', 'Comoros');
INSERT INTO `countary` VALUES ('165', 'Bhutan');
INSERT INTO `countary` VALUES ('166', 'Montenegro');
INSERT INTO `countary` VALUES ('167', 'Macau (China)');
INSERT INTO `countary` VALUES ('168', 'Solomon Islands');
INSERT INTO `countary` VALUES ('169', 'Western Sahara');
INSERT INTO `countary` VALUES ('170', 'Luxembourg');
INSERT INTO `countary` VALUES ('171', 'Suriname');
INSERT INTO `countary` VALUES ('172', 'Cape Verde');
INSERT INTO `countary` VALUES ('173', 'Malta');
INSERT INTO `countary` VALUES ('174', 'Guadeloupe (France)');
INSERT INTO `countary` VALUES ('175', 'Martinique (France)');
INSERT INTO `countary` VALUES ('176', 'Brunei');
INSERT INTO `countary` VALUES ('177', 'Bahamas');
INSERT INTO `countary` VALUES ('178', 'Iceland');
INSERT INTO `countary` VALUES ('179', 'Maldives');
INSERT INTO `countary` VALUES ('180', 'Belize');
INSERT INTO `countary` VALUES ('181', 'Barbados');
INSERT INTO `countary` VALUES ('182', 'French Polynesia (France)');
INSERT INTO `countary` VALUES ('183', 'Vanuatu');
INSERT INTO `countary` VALUES ('184', 'New Caledonia (France)');
INSERT INTO `countary` VALUES ('185', 'French Guiana (France)');
INSERT INTO `countary` VALUES ('186', 'Mayotte (France)');
INSERT INTO `countary` VALUES ('187', 'Samoa');
INSERT INTO `countary` VALUES ('188', 'Sao Tom and Principe');
INSERT INTO `countary` VALUES ('189', 'Saint Lucia');
INSERT INTO `countary` VALUES ('190', 'Guam (USA)');
INSERT INTO `countary` VALUES ('191', 'Curacao (Netherlands)');
INSERT INTO `countary` VALUES ('192', 'Saint Vincent and the Grenadines');
INSERT INTO `countary` VALUES ('193', 'Kiribati');
INSERT INTO `countary` VALUES ('194', 'United States Virgin Islands (USA)');
INSERT INTO `countary` VALUES ('195', 'Grenada');
INSERT INTO `countary` VALUES ('196', 'Tonga');
INSERT INTO `countary` VALUES ('197', 'Aruba (Netherlands)');
INSERT INTO `countary` VALUES ('198', 'Federated States of Micronesia');
INSERT INTO `countary` VALUES ('199', 'Jersey (UK)');
INSERT INTO `countary` VALUES ('200', 'Seychelles');
INSERT INTO `countary` VALUES ('201', 'Antigua and Barbuda');
INSERT INTO `countary` VALUES ('202', 'Isle of Man (UK)');
INSERT INTO `countary` VALUES ('203', 'Andorra');
INSERT INTO `countary` VALUES ('204', 'Dominica');
INSERT INTO `countary` VALUES ('205', 'Bermuda (UK)');
INSERT INTO `countary` VALUES ('206', 'Guernsey (UK)');
INSERT INTO `countary` VALUES ('207', 'Greenland (Denmark)');
INSERT INTO `countary` VALUES ('208', 'Marshall Islands');
INSERT INTO `countary` VALUES ('209', 'American Samoa (USA)');
INSERT INTO `countary` VALUES ('210', 'Cayman Islands (UK)');
INSERT INTO `countary` VALUES ('211', 'Saint Kitts and Nevis');
INSERT INTO `countary` VALUES ('212', 'Northern Mariana Islands (USA)');
INSERT INTO `countary` VALUES ('213', 'Faroe Islands (Denmark)');
INSERT INTO `countary` VALUES ('214', 'Sint Maarten (Netherlands)');
INSERT INTO `countary` VALUES ('215', 'Saint Martin (France)');
INSERT INTO `countary` VALUES ('216', 'Liechtenstein');
INSERT INTO `countary` VALUES ('217', 'Monaco');
INSERT INTO `countary` VALUES ('218', 'San Marino');
INSERT INTO `countary` VALUES ('219', 'Turks and Caicos Islands (UK)');
INSERT INTO `countary` VALUES ('220', 'Gibraltar (UK)');
INSERT INTO `countary` VALUES ('221', 'British Virgin Islands (UK)');
INSERT INTO `countary` VALUES ('222', 'Aland Islands (Finland)');
INSERT INTO `countary` VALUES ('223', 'Caribbean Netherlands (Netherlands)');
INSERT INTO `countary` VALUES ('224', 'Palau');
INSERT INTO `countary` VALUES ('225', 'Cook Islands (NZ)');
INSERT INTO `countary` VALUES ('226', 'Anguilla (UK)');
INSERT INTO `countary` VALUES ('227', 'Wallis and Futuna (France)');
INSERT INTO `countary` VALUES ('228', 'Tuvalu');
INSERT INTO `countary` VALUES ('229', 'Nauru');
INSERT INTO `countary` VALUES ('230', 'Saint Barthelemy (France)');
INSERT INTO `countary` VALUES ('231', 'Saint Pierre and Miquelon (France)');
INSERT INTO `countary` VALUES ('232', 'Montserrat (UK)');
INSERT INTO `countary` VALUES ('233', 'Saint Helena, Ascension and Tristan da Cunha (UK)');
INSERT INTO `countary` VALUES ('234', 'Svalbard and Jan Mayen (Norway)');
INSERT INTO `countary` VALUES ('235', 'Falkland Islands (UK)');
INSERT INTO `countary` VALUES ('236', 'Norfolk Island (Australia)');
INSERT INTO `countary` VALUES ('237', 'Christmas Island (Australia)');
INSERT INTO `countary` VALUES ('238', 'Niue (NZ)');
INSERT INTO `countary` VALUES ('239', 'Tokelau (NZ)');
INSERT INTO `countary` VALUES ('240', 'Vatican City');
INSERT INTO `countary` VALUES ('241', 'Cocos (Keeling) Islands (Australia)');
INSERT INTO `countary` VALUES ('242', 'Pitcairn Islands (UK)');
INSERT INTO `countary` VALUES ('243', 'Chaina');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `house_street` varchar(255) DEFAULT NULL,
  `town_city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `zip_postal_code` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_vendor` tinyint(4) DEFAULT 0,
  `vendor_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('70', 'sana', 'aslam', 'sohailgoheer@gmail.com', '923337858384', 'Lahore, xyz', 'Lahore', 'Punjab', 'India', '2019-03-17 05:57:54', '63000', '3', '0', null, '14');
INSERT INTO `customers` VALUES ('71', 'Waqas', 'Alim', 'sohailgoheer@gmail.com', '923337858384', 'Lahore, xyz', 'Lahore', 'Punjab', 'India', '2019-03-17 06:11:10', '63000', '3', '1', '39', '14');

-- ----------------------------
-- Table structure for customer_bill_summary
-- ----------------------------
DROP TABLE IF EXISTS `customer_bill_summary`;
CREATE TABLE `customer_bill_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `total_purchased_itoms` int(11) DEFAULT 0,
  `total_amount` decimal(10,0) DEFAULT 0,
  `total_paid_amount` decimal(10,0) DEFAULT 0,
  `outstanding_amount` decimal(10,0) DEFAULT 0,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `return_items_quantity` int(11) DEFAULT 0,
  `return_amount` decimal(10,0) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_bill_summary
-- ----------------------------
INSERT INTO `customer_bill_summary` VALUES ('121', '70', '3', '26800', '6800', '20000', '2019-03-17 06:19:06', '3', '1', '25000');
INSERT INTO `customer_bill_summary` VALUES ('122', '71', '1', '900', '0', '900', '2019-03-17 06:11:18', '3', '0', '0');

-- ----------------------------
-- Table structure for order_clint
-- ----------------------------
DROP TABLE IF EXISTS `order_clint`;
CREATE TABLE `order_clint` (
  `clint_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `house_street` varchar(255) DEFAULT NULL,
  `town_city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `zip_postal_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`clint_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_clint
-- ----------------------------
INSERT INTO `order_clint` VALUES ('68', '68', 'qasim', 'shah', 'sohailgoheer@gmail.com', '923337858384', 'Lahore, xyz', 'Lahore', 'Punjab', '', '2019-03-17 08:01:40', null, null, '14');
INSERT INTO `order_clint` VALUES ('69', '69', 'Muhammad', 'Sohail', 'sohailgoheer@gmail.com', '923337858384', 'Lahore, xyz', 'Lahore', 'Punjab', 'ww', '2021-02-13 16:47:41', null, null, null);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `product_sub_category_id` int(11) DEFAULT NULL,
  `product_brand_id` int(11) DEFAULT NULL,
  `product_purchase_price` float DEFAULT 0,
  `product_price` decimal(11,0) DEFAULT 0,
  `product_disc_price` decimal(11,0) DEFAULT 0,
  `product_quantity` decimal(11,0) unsigned DEFAULT 0,
  `product_description` longtext DEFAULT NULL,
  `product_short_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_Id` int(11) DEFAULT NULL,
  `recommend` varchar(255) DEFAULT NULL,
  `publish_status` varchar(255) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT 0,
  `cash_on_delivery` decimal(10,0) DEFAULT 0,
  `product_condition` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('2', 'Product 2', '1', '3', '3', '0', '26', '3', '0', 'OS=Android V8.1 Oreo|  Dimensions=156.7 x 74.2 x 9.4mm|   Weight=186 g| SIM=Dual Sim, Dual Standby (Nano-SIM)|   Colors=Bordeaux Red, Glacier Blue', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley ', 'Capture.jpg', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'Used');
INSERT INTO `products` VALUES ('4', 'Product 3', '2', '2', '2', '0', '66', '0', '0', 'OS=Android V8.1 Oreo|  \r\nDimensions=156.7 x 74.2 x 9.4mm|  \r\nWeight=186 g|\r\nSIM=Dual Sim, Dual Standby (Nano-SIM)|  \r\nColors=Bordeaux Red, Glacier Blue', 'Lirum, larum Lï¿½ffelstiel, auch in der Schreibweise Lirumlarum Lï¿½ffelstiel, ist ein altes Volkslied fï¿½r Kinder. Es wurde erstmals 1808 von Clemens Brentano und Achim von Arnim in ihrer Sammlung alter Volkslieder, mit dem Titel Des Knaben Wunderhorn, aufgeschrieben', 'cc.PNG', '2019-03-17 02:14:23', '3', 'low', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('12', 'my first product title', '1', '1', '1', '0', '1', '1', '0', 'OS=Android V8.1 Oreo|  \r\nDimensions=156.7 x 74.2 x 9.4mm|  \r\nWeight=186 g|\r\nSIM=Dual Sim, Dual Standby (Nano-SIM)|  \r\nColors=Bordeaux Red, Glacier Blue', 'dd', 'Capture.jpg', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('14', 'D 4', '14', '7', '2', '0', '4', '4', '0', 'OS=Android V8.1 Oreo|  \r\nDimensions=156.7 x 74.2 x 9.4mm|  \r\nWeight=186 g|\r\nSIM=Dual Sim, Dual Standby (Nano-SIM)|  \r\nColors=Bordeaux Red, Glacier Blue', 'sddssdsds', 'cc.PNG', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('81', 'page 1', '1', '5', '1', '0', '1323', '133', '0', 'OS=Android V8.1 Oreo|  \r\nDimensions=156.7 x 74.2 x 9.4mm|  \r\nWeight=186 g|\r\nSIM=Dual Sim, Dual Standby (Nano-SIM)|  \r\nColors=Bordeaux Red, Glacier Blue', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Capture.PNG', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('84', 'page 1', '1', '5', '1', '0', '1323', '133', '0', 'OS=Android V8.1 Oreo|  \r\nDimensions=156.7 x 74.2 x 9.4mm|  \r\nWeight=186 g|\r\nSIM=Dual Sim, Dual Standby (Nano-SIM)|  \r\nColors=Bordeaux Red, Glacier Blue', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Capture.PNG', '2019-03-17 02:14:23', '3', 'top', 'pvt', '0', '120', 'used');
INSERT INTO `products` VALUES ('106', 'klkkl', '1', '3', '2', '0', '88', '88', '0', 'OS=Android V8.1 Oreo|  \r\nDimensions=156.7 x 74.2 x 9.4mm|  \r\nWeight=186 g|\r\nSIM=Dual Sim, Dual Standby (Nano-SIM)|  \r\nColors=Bordeaux Red, Glacier Blue', 'kjkj', 'WhatsApp Image 2018-09-08 at 1.09.18 PM.jpeg', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('107', 'page 1', '11', '9', '4', '0', '1', '1', '0', 'OS=Android V8.1 Oreo|  \r\nDimensions=156.7 x 74.2 x 9.4mm|  \r\nWeight=186 g|\r\nSIM=Dual Sim, Dual Standby (Nano-SIM)|  \r\nColors=Bordeaux Red, Glacier Blue', 'kkkk', 'WhatsApp Image 2018-09-08 at 1.09.18 PM.jpeg', '2019-03-17 02:14:23', '3', 'low', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('108', 'my first product title', '2', '6', '2', '0', '3', '0', '0', 'OS=Android V8.1 Oreo|  \r\nDimensions=156.7 x 74.2 x 9.4mm|  \r\nWeight=186 g|\r\nSIM=Dual Sim, Dual Standby (Nano-SIM)|  \r\nColors=Bordeaux Red, Glacier Blue', 'ssss', '20160503_095710.jpg', '2019-03-17 02:14:23', '3', 'low', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('109', 'Alhamdo Lillah', '14', '11', '1', '0', '10', '7', '0', 'Imaan=Allah is One|Nabi=Muhammad', 'Allah', 'l.jpg', '2019-03-17 02:14:44', '3', 'low', 'pvt', '0', '120', 'used');
INSERT INTO `products` VALUES ('110', '5 keys', '13', '3', '3', '0', '15', '12', '0', 'first=ready to change|second=accept queckly | 3rd =monitor the new changes', '5 keys to success life', 'cap.png', '2019-03-17 02:14:23', '3', 'top', 'pvt', '0', '120', 'used');
INSERT INTO `products` VALUES ('111', 'page 1', '14', '7', '1', '0', '1', '1', '0', 'ddd=ddd', 'eee', 'dp.jpg', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('112', 'Noman', '1', '11', '2', '0', '10', '0', '0', 'OS=	Android V8.1 Oreo  |\\r\\nDimensions=	161.9 x 76.4 x 8.8 mm  |\\r\\nWeight	=201 g  |\\r\\nSIM	=Hybrid Dual SIM, Dual Standby, (Nano-SIM)  |\\r\\nColors	=Metallic copper, Lavender purple, Ocean blue, Midnight black  ', 'Recently, a close friend sent me an e-mail with the subject line â€œThings Iâ€™ve Noticed As I Get Older.â€ The ten numbered observations ranged from the mundane (politics is getting stupider) to the poignant (the distant melancholy of Facebookâ€™s News Feed, with its dispatches from lives that were once, and now no longer, close to oneâ€™s own). But with all due respect to the observational chops of my correspondent, it wasnâ€™t so much the content of the message that impressed me as its form. It was an e-mail in the shape of a listicle, a personal correspondence structured for the purposes of frictionless social-media sharing. At some level, it seemed, my friend intended his e-mail to go viral within the highly targeted demographic of me. I couldnâ€™t help feeling that some basic epistolary protocol had been ', 'dp.jpg', '2019-03-17 02:14:23', '3', 'top ', 'pvt', '0', '120', 'used');
INSERT INTO `products` VALUES ('113', '432 I6', '1', '11', '1', '0', '12000', '11000', '0', 'Lorem= Ipsum | is =simply |  dummy= text  | of =the  | printing= and |  typesetting= industry ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'laptop1.jpg', '2019-03-17 02:14:23', '3', 'top ', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('114', 'Parashoot Bag', '14', '11', '3', '0', '6000', '0', '0', 'Lorem= Ipsum | is =simply |  dummy= text  | of =the  | printing= and |  typesetting= industry ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'bag2.jpg', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('115', '324 Processor', '3', '11', '1', '0', '50000', '40000', '0', 'Lorem= Ipsum | is =simply |  dummy= text  | of =the  | printing= and |  typesetting= industry ', 'Lorem= Ipsum | is =simply |  dummy= text  | of =the  | printing= and |  typesetting= industry ', 'processor1.jpg', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('116', 'RAM', '1', '7', '4', '0', '1500', '1200', '0', 'hahah=heheeh', 'ljewidiwedjiewodjo', 'Capture.PNG', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('118', 'page 1', '14', '6', '1', '0', '1', '-1', '0', 'eee=eee', 'ddd', '201810170402511404667075.png', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('119', 'a', '1', '6', '2', '0', '1', '1', '100', 'kkkk=kk', 'jjjj', '20181017071424941000838.png', '2019-03-17 06:16:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('120', 'ddd', '14', '6', '7', '0', '1', '1', '0', 'jsjjsj=sss', 'kkkk', '201810170733251220198237.png', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('121', 'cddd', '14', '6', '7', '0', '1', '1', '0', 'jsjjsj=sss', 'kkkk', '20181017073510159183677.png', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('122', 'cdd', '14', '6', '7', '0', '1', '1', '0', 'jsjjsj=sss', 'kkkk', '20181017073612316938472.png', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('123', 'Note4d', '13', '5', '1', '0', '50000', '40000', '0', 'procssor=good|screen=12', 'its a good note book', '201810180229061244082265.png', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('124', 'Note4s', '2', '6', '1', '0', '28', '20', '0', 'asdsd=asdsad|dasd=asdasd', 'eiei', '20181018023623952467874.png', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('125', 'Note4a', '2', '6', '1', '0', '28', '20', '0', 'asdsd=asdsad|dasd=asdasd', 'eiei', '201810180239461046222487.png', '2019-03-17 02:14:23', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('126', 'sd', '14', '6', '2', '0', '2', '4', '0', 'sdsdd=sddsdf', 'wew', '20181018024317213919694.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('127', 'my first product title1', '15', '3', '7', '0', '2', '2', '0', 'ssdcsd=zxcz', 'dsdds', '201810180246371665479823.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('128', 'my first product title2', '15', '3', '7', '0', '2', '2', '0', 'ssdcsd=zxcz', 'dsdds', '20181018024735740259546.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('129', 'my first product title22', '15', '3', '7', '0', '2', '2', '0', 'ssdcsd=zxcz', 'dsdds', '201810180248191953203234.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('130', 'my first product title33', '15', '3', '7', '0', '2', '2', '0', 'ssdcsd=zxcz', 'dsdds', '201810180249161962040539.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('131', 'my first product title332', '15', '3', '7', '0', '2', '2', '0', 'ssdcsd=zxcz', 'dsdds', '201810180249441881344734.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('132', 'my first product title221', '15', '3', '7', '0', '2', '2', '0', 'ssdcsd=zxcz', 'dsdds', '201810180250541883457794.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('133', 'my first product title2211', '15', '3', '7', '0', '2', '2', '0', 'ssdcsd=zxcz', 'dsdds', '20181018025100342716783.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('134', 'my first product titled', '15', '3', '7', '0', '2', '2', '0', 'ssdcsd=zxcz', 'dsdds', '20181018025133765072095.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('135', 'my first product titledds', '14', '6', '1', '0', '23', '16', '0', 'ddssd=sddsd', 'ddd', '20181018025430106881422.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('136', 'my first product titlesa', '14', '6', '7', '0', '0', '0', '0', 'asasd=asdasd', 'dd', '20181018025823129093170.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('137', '11111', '13', '6', '4', '0', '1000', '900', '189', 'screen=touch|processor=i5', 'goood', '20181018030230215872011.png', '2019-03-17 06:11:18', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('138', '33101', '1', '1', '2', '0', '100000', '90000', '0', 'adslkad=asdd|asasd=asadd|asdasd=asda', 'jajnsjdn aksdjnakjn jkajdajksd kjasnkjd ', '20181018055746920879042.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('139', 'cup11', '2', '4', '2', '0', '50', '40', '0', 'sdfsdf=sdfsdf|sadas=asdasd', 'kasdalmdkl', '201810191500171663033993.png', '2019-03-17 02:14:24', '3', 'low', 'pvt', '0', '120', 'used');
INSERT INTO `products` VALUES ('140', '1111ddd', '2', '5', '7', '0', '3', '5', '0', 'kakaka=kakkaak|ksksksk=jsjsj', 'papapa', '201810241252581595060845.png', '2019-03-17 02:14:24', '3', 'top', 'public', '0', '120', 'used');
INSERT INTO `products` VALUES ('142', 'x600', '13', '0', '3', '0', '7000', '0', '0', 'aasdasd=asdasd|asdasdas=dsassdas', 'sdkadmaklsdm alkdlask oaoaspsa', '20181119025909372385709.png', '2019-03-17 02:14:11', '3', 'low', 'pvt', '0', '100', 'used');
INSERT INTO `products` VALUES ('143', 'x100', '13', '15', '3', '0', '7500', '7000', '0', 'a= b | c = d |  e=f', 'first mobile used in 2005', '201902151305211742228119.jpg', '2019-02-18 18:52:52', '3', 'top', 'public', '0', '0', 'used');
INSERT INTO `products` VALUES ('144', '27e', '2', '4', '2', '0', '29000', '25000', '989', 'a=b', 'lcd xyz abc', '201903162217541628063407.png', '2019-03-17 08:04:45', '3', 'low', 'public', '0', '0', 'New');

-- ----------------------------
-- Table structure for products_serial
-- ----------------------------
DROP TABLE IF EXISTS `products_serial`;
CREATE TABLE `products_serial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_serial` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `online_order_number` int(11) DEFAULT NULL,
  `invoice_no` int(11) DEFAULT NULL,
  `sold_type` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vendor_invoice_no` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=275 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products_serial
-- ----------------------------
INSERT INTO `products_serial` VALUES ('243', '', '137', null, null, null, '1', null, '2019-03-17 02:42:43', null);
INSERT INTO `products_serial` VALUES ('244', '', '137', null, null, null, '1', null, '2019-03-17 02:42:43', null);
INSERT INTO `products_serial` VALUES ('245', '', '144', null, null, null, '1', null, '2019-03-17 02:42:43', null);
INSERT INTO `products_serial` VALUES ('246', '', '144', null, null, null, '1', null, '2019-03-17 02:42:43', null);
INSERT INTO `products_serial` VALUES ('247', '', '144', null, null, null, '1', null, '2019-03-17 02:42:43', null);
INSERT INTO `products_serial` VALUES ('248', '', '137', null, null, null, '1', null, '2019-03-17 02:50:49', null);
INSERT INTO `products_serial` VALUES ('249', '', '137', null, null, null, '1', null, '2019-03-17 02:50:49', null);
INSERT INTO `products_serial` VALUES ('250', '', '144', null, null, null, '1', null, '2019-03-17 02:50:49', null);
INSERT INTO `products_serial` VALUES ('251', '', '137', null, null, null, '2', null, '2019-03-17 02:57:36', null);
INSERT INTO `products_serial` VALUES ('252', '', '137', null, null, null, '2', null, '2019-03-17 04:55:09', null);
INSERT INTO `products_serial` VALUES ('253', '', '137', null, null, null, '2', null, '2019-03-17 04:55:09', null);
INSERT INTO `products_serial` VALUES ('254', '', '144', null, null, null, '2', null, '2019-03-17 04:55:09', null);
INSERT INTO `products_serial` VALUES ('255', '', '144', null, null, null, '2', null, '2019-03-17 04:55:09', null);
INSERT INTO `products_serial` VALUES ('256', '', '137', null, null, null, '1', null, '2019-03-17 05:06:22', null);
INSERT INTO `products_serial` VALUES ('257', '', '137', null, null, null, '1', null, '2019-03-17 05:06:22', null);
INSERT INTO `products_serial` VALUES ('258', '', '144', null, null, null, '1', null, '2019-03-17 05:06:22', null);
INSERT INTO `products_serial` VALUES ('259', '', '144', null, null, null, '1', null, '2019-03-17 05:06:22', null);
INSERT INTO `products_serial` VALUES ('260', '', '137', null, null, null, '1', null, '2019-03-17 05:12:10', null);
INSERT INTO `products_serial` VALUES ('261', '', '137', null, null, null, '1', null, '2019-03-17 05:12:10', null);
INSERT INTO `products_serial` VALUES ('262', '', '144', null, null, null, '1', null, '2019-03-17 05:12:10', null);
INSERT INTO `products_serial` VALUES ('263', '', '144', null, null, null, '1', null, '2019-03-17 05:12:10', null);
INSERT INTO `products_serial` VALUES ('264', '', '137', null, null, null, '1', null, '2019-03-17 05:24:08', null);
INSERT INTO `products_serial` VALUES ('265', '', '137', null, null, null, '1', null, '2019-03-17 05:24:08', null);
INSERT INTO `products_serial` VALUES ('266', '', '144', null, null, null, '1', null, '2019-03-17 05:24:08', null);
INSERT INTO `products_serial` VALUES ('267', '', '144', null, null, null, '1', null, '2019-03-17 05:24:08', null);
INSERT INTO `products_serial` VALUES ('268', '', '137', null, null, null, '2', null, '2019-03-17 05:54:51', null);
INSERT INTO `products_serial` VALUES ('269', '', '137', null, null, null, '1', null, '2019-03-17 05:58:53', null);
INSERT INTO `products_serial` VALUES ('270', '', '137', null, null, null, '1', null, '2019-03-17 05:58:53', null);
INSERT INTO `products_serial` VALUES ('271', '', '144', null, null, null, '1', null, '2019-03-17 05:58:53', null);
INSERT INTO `products_serial` VALUES ('272', '', '144', null, null, null, '1', null, '2019-03-17 05:58:53', null);
INSERT INTO `products_serial` VALUES ('273', '', '137', null, null, null, '2', null, '2019-03-17 06:11:18', null);
INSERT INTO `products_serial` VALUES ('274', 'dssdss', '144', null, null, '68', null, null, '2019-03-17 08:04:45', null);

-- ----------------------------
-- Table structure for product_order
-- ----------------------------
DROP TABLE IF EXISTS `product_order`;
CREATE TABLE `product_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sale_price` decimal(10,0) DEFAULT 0,
  `discount_price` decimal(10,0) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_order
-- ----------------------------
INSERT INTO `product_order` VALUES ('118', '68', '144', '1', '2019-03-17 07:57:07', '29000', '25000');
INSERT INTO `product_order` VALUES ('119', '69', '119', '1', '2021-02-13 16:47:41', '1', '1');
INSERT INTO `product_order` VALUES ('120', '69', '137', '1', '2021-02-13 16:47:41', '1000', '900');

-- ----------------------------
-- Table structure for purchase_return
-- ----------------------------
DROP TABLE IF EXISTS `purchase_return`;
CREATE TABLE `purchase_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `return_amount` double DEFAULT 0,
  `vendor_id` int(11) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of purchase_return
-- ----------------------------
INSERT INTO `purchase_return` VALUES ('20', '2019-03-17 03:00:24', '144', '3', 'Reason: dfgdfg', '10', '200000', '37', '', '222');

-- ----------------------------
-- Table structure for reviews
-- ----------------------------
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment` longtext DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reviews
-- ----------------------------
INSERT INTO `reviews` VALUES ('1', 'waqas', 'waqas@gmail.com', '2018-09-11 01:13:52', 'djaldajdlka ldjalidj laidjalisdj aldjialidj liadjialdj dijasdi adsij asdilajdlasj dij', '18');
INSERT INTO `reviews` VALUES ('2', 'sohail', 'sohail@gmail.com', '2018-09-11 01:13:55', 'asdakdjaj  askdaslkdj ;ado;asd oad akod ;aodk ad  askdlasdj', '18');
INSERT INTO `reviews` VALUES ('3', 'sab', 'sab@gmail.com', '2018-09-11 01:13:56', 'dsj jsdsdn jssjjs jksnsdf fsfsd sgasg sdrdyry ddfre   nfnfnf jfkdnfn fifjijf ', '1');
INSERT INTO `reviews` VALUES ('4', 'sfsd', 'sohailgoheer@gmail.com', '2018-09-11 01:56:08', 'ddd', '18');
INSERT INTO `reviews` VALUES ('5', 'sohailgoheer', 'sohailgoheer@gmail.com', '2018-09-11 01:56:40', 'how was it', '18');
INSERT INTO `reviews` VALUES ('6', 'New', 'sohailgoheer@gmail.com', '2018-09-11 01:59:04', 'hahahaahahhahahah', '108');
INSERT INTO `reviews` VALUES ('7', 'jjj', 'sohailgoheer@gmail.com', '2018-09-11 02:05:04', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '1');
INSERT INTO `reviews` VALUES ('14', 'sohailgoheer', 'sohailgoheer@gmail.com', '2018-09-18 15:55:26', 'sdsfsdf', '111');
INSERT INTO `reviews` VALUES ('15', 'sohailgoheer', 'sohailgoheer@gmail.com', '2018-09-29 16:38:46', 'dfdds', '82');
INSERT INTO `reviews` VALUES ('16', 'sohailgoheer', 'sohailgoheer@gmail.com', '2018-09-29 20:34:49', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '113');
INSERT INTO `reviews` VALUES ('17', 'sohailgoheer', 'sohailgoheer@gmail.com', '2018-09-29 20:35:04', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '113');
INSERT INTO `reviews` VALUES ('18', 'sohailgoheer', 'sohailgoheer@gmail.com', '2018-10-12 18:11:26', 'hi', '2');
INSERT INTO `reviews` VALUES ('19', 'sohailgoheer', 'sohailgoheer@gmail.com', '2018-11-03 02:20:09', 'hahahahaha', '137');
INSERT INTO `reviews` VALUES ('20', 'sohailgoheer', 'sohailgoheer@gmail.com', '2018-11-17 23:16:25', 'werewrwerwe', '2');
INSERT INTO `reviews` VALUES ('21', 'sohailgoheer', 'sohailgoheer@gmail.com', '2018-12-04 19:07:37', 'xyz', '114');
INSERT INTO `reviews` VALUES ('22', 'sohailgoheer', 'sohailgoheer@gmail.com', '2018-12-18 14:34:41', 'http://202.83.170.238/workspace/geosoftic/public/blog_detail.php?blog_id=30', '12');

-- ----------------------------
-- Table structure for sales_return
-- ----------------------------
DROP TABLE IF EXISTS `sales_return`;
CREATE TABLE `sales_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `invoice_no` int(11) DEFAULT NULL,
  `serial_products` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reason_comments` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `return_amount` decimal(10,0) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sales_return
-- ----------------------------
INSERT INTO `sales_return` VALUES ('37', '144', '1', '', '2019-03-17 05:59:51', 'Reason: ', '3', '1', '25000', '14', '70');

-- ----------------------------
-- Table structure for shop_profile
-- ----------------------------
DROP TABLE IF EXISTS `shop_profile`;
CREATE TABLE `shop_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `mono_gram` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contect_no_1` varchar(255) DEFAULT '',
  `contect_no_2` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `tweeter_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT '',
  `insta_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_profile
-- ----------------------------
INSERT INTO `shop_profile` VALUES ('1', 'Geo-Softic ', 'No One Seler', 'path', 'sohailgoheer@gmail.com', '03331111111', '03001111111', 'xyz,asdsad,fsfs, Pakistan', 'asad,sfsf abc, UAE', 'It\'s a live demo of the template. I have created Charisma to ease the repeat work I have to do on my projects. Now I re-use Charisma as a base for my admin panel work and I am sharing it with you :)\r\n\r\nAll pages in the menu are functional, take a look at all, please share this with your followers.', '3', '03001111111', '923331111111', 'Lahore, xyz', 'https://www.facebook.com/sohailgoheer', 'https://twitter.com/sohailgoheer', 'https://www.youtube.com/channel/UCttspZesZIDEwwpVIgoZtWQ', 'https://www.instagram.com/sohailgoheer/');

-- ----------------------------
-- Table structure for slides
-- ----------------------------
DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_title` varchar(255) DEFAULT NULL,
  `slide_image` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slides
-- ----------------------------
INSERT INTO `slides` VALUES ('25', '2', '1.PNG', '2021-01-28 13:08:31', null);
INSERT INTO `slides` VALUES ('26', '3', '6.jpg', '2021-01-28 13:09:08', null);
INSERT INTO `slides` VALUES ('27', '1', '1.jpg', '2021-01-28 13:09:47', null);

-- ----------------------------
-- Table structure for stores
-- ----------------------------
DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_location` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stores
-- ----------------------------
INSERT INTO `stores` VALUES ('14', 'Hafeez Center Lahore', '2019-03-17 02:09:51');

-- ----------------------------
-- Table structure for stores_summary_report
-- ----------------------------
DROP TABLE IF EXISTS `stores_summary_report`;
CREATE TABLE `stores_summary_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) DEFAULT NULL,
  `total_order_sale_products_quantity` int(11) DEFAULT 0,
  `total_cash_on_order_products` double DEFAULT 0,
  `total_invoice_sale_products` int(11) DEFAULT 0,
  `total_cash_on_sale` double DEFAULT 0,
  `cash_received` double DEFAULT 0,
  `cash_receivable` double DEFAULT 0,
  `sales_return_products` int(11) DEFAULT 0,
  `sales_return_amount` double DEFAULT 0,
  `last_sent_amount_to_admin` double DEFAULT 0,
  `total_sent_amount_to_admin` double DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stores_summary_report
-- ----------------------------
INSERT INTO `stores_summary_report` VALUES ('12', '14', '1', '25000', '8', '55400', '8600', '46800', '2', '50000', '400', '400');

-- ----------------------------
-- Table structure for store_users
-- ----------------------------
DROP TABLE IF EXISTS `store_users`;
CREATE TABLE `store_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of store_users
-- ----------------------------
INSERT INTO `store_users` VALUES ('72', '14', '9');

-- ----------------------------
-- Table structure for sub_categories
-- ----------------------------
DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE `sub_categories` (
  `sub_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sub_categories
-- ----------------------------
INSERT INTO `sub_categories` VALUES ('2', 'I5', '1');
INSERT INTO `sub_categories` VALUES ('3', 'I4', '1');
INSERT INTO `sub_categories` VALUES ('4', 'LED TV', '2');
INSERT INTO `sub_categories` VALUES ('5', 'LCD Android', '2');
INSERT INTO `sub_categories` VALUES ('6', 'xyz', '3');
INSERT INTO `sub_categories` VALUES ('7', 'ForM', '3');
INSERT INTO `sub_categories` VALUES ('11', 'Laptop', '1');
INSERT INTO `sub_categories` VALUES ('13', 'fffff', '13');
INSERT INTO `sub_categories` VALUES ('15', 'xyz', '13');
INSERT INTO `sub_categories` VALUES ('16', 'X600', '13');

-- ----------------------------
-- Table structure for tbl_invoice
-- ----------------------------
DROP TABLE IF EXISTS `tbl_invoice`;
CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(11) DEFAULT 0,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,0) DEFAULT 0,
  `received_amount` decimal(10,0) DEFAULT 0,
  `remaining_amount` decimal(10,0) DEFAULT 0,
  `total_items` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_invoice
-- ----------------------------
INSERT INTO `tbl_invoice` VALUES ('120', '1', '2019-03-17 06:19:06', '70', '26800', '6800', '20000', '3', '3', '14');
INSERT INTO `tbl_invoice` VALUES ('121', '2', '2019-03-17 06:11:18', '71', '900', '0', '900', '1', '3', '14');

-- ----------------------------
-- Table structure for tbl_invoice_products
-- ----------------------------
DROP TABLE IF EXISTS `tbl_invoice_products`;
CREATE TABLE `tbl_invoice_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `invoice_no` int(11) DEFAULT NULL,
  `sale_price` decimal(10,0) DEFAULT NULL,
  `discount_price` decimal(10,0) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_invoice_products
-- ----------------------------
INSERT INTO `tbl_invoice_products` VALUES ('136', '137', '2', '2019-03-17 05:58:53', '1', '1000', '900', '14', '70');
INSERT INTO `tbl_invoice_products` VALUES ('137', '144', '1', '2019-03-17 05:59:52', '1', '29000', '25000', '14', '70');
INSERT INTO `tbl_invoice_products` VALUES ('138', '137', '1', '2019-03-17 06:11:18', '2', '1000', '900', '14', '71');

-- ----------------------------
-- Table structure for tbl_order
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_status` varchar(255) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `effecte_by_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_order
-- ----------------------------
INSERT INTO `tbl_order` VALUES ('68', 'Placed', '14', '2019-03-17 08:04:45', '3');
INSERT INTO `tbl_order` VALUES ('69', 'pending', null, '2021-02-13 16:47:41', null);

-- ----------------------------
-- Table structure for tbl_products_store
-- ----------------------------
DROP TABLE IF EXISTS `tbl_products_store`;
CREATE TABLE `tbl_products_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT 0,
  `product_quantity` int(11) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `date_send_return` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_products_store
-- ----------------------------
INSERT INTO `tbl_products_store` VALUES ('81', '144', '14', '94', '2019-03-17 08:04:45', '3', '2019-03-07');
INSERT INTO `tbl_products_store` VALUES ('82', '137', '14', '4', '2019-03-17 06:11:18', '3', '2019-03-14');

-- ----------------------------
-- Table structure for tbl_products_store_history
-- ----------------------------
DROP TABLE IF EXISTS `tbl_products_store_history`;
CREATE TABLE `tbl_products_store_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT 0,
  `date_time_db` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `date_send_return` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_products_store_history
-- ----------------------------
INSERT INTO `tbl_products_store_history` VALUES ('157', '144', '14', '100', '2019-03-17 02:28:12', '3', '2019-03-07', 'Send');
INSERT INTO `tbl_products_store_history` VALUES ('158', '137', '14', '20', '2019-03-17 02:30:13', '3', '2019-03-14', 'Send');
INSERT INTO `tbl_products_store_history` VALUES ('159', '137', '14', '1', '2019-03-17 04:09:56', '3', null, 'Sales Return');
INSERT INTO `tbl_products_store_history` VALUES ('160', '144', '14', '1', '2019-03-17 04:56:52', '3', null, 'Sales Return');
INSERT INTO `tbl_products_store_history` VALUES ('161', '144', '14', '1', '2019-03-17 04:58:03', '3', null, 'Sales Return');
INSERT INTO `tbl_products_store_history` VALUES ('162', '144', '14', '1', '2019-03-17 04:59:36', '3', null, 'Sales Return');
INSERT INTO `tbl_products_store_history` VALUES ('163', '144', '14', '1', '2019-03-17 04:59:43', '3', null, 'Sales Return');
INSERT INTO `tbl_products_store_history` VALUES ('164', '144', '14', '1', '2019-03-17 05:00:16', '3', null, 'Sales Return');
INSERT INTO `tbl_products_store_history` VALUES ('165', '144', '14', '1', '2019-03-17 05:07:10', '3', null, 'Sales Return');
INSERT INTO `tbl_products_store_history` VALUES ('166', '144', '14', '1', '2019-03-17 05:12:46', '3', null, 'Sales Return');
INSERT INTO `tbl_products_store_history` VALUES ('167', '144', '14', '1', '2019-03-17 05:24:37', '3', null, 'Sales Return');
INSERT INTO `tbl_products_store_history` VALUES ('168', '144', '14', '1', '2019-03-17 05:59:51', '3', null, 'Sales Return');

-- ----------------------------
-- Table structure for tbl_purchase_from_vendor
-- ----------------------------
DROP TABLE IF EXISTS `tbl_purchase_from_vendor`;
CREATE TABLE `tbl_purchase_from_vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_purchase_price` decimal(10,0) DEFAULT NULL,
  `total_amount` decimal(10,0) DEFAULT NULL,
  `date_time` timestamp(6) NULL DEFAULT current_timestamp(6),
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_purchase_from_vendor
-- ----------------------------
INSERT INTO `tbl_purchase_from_vendor` VALUES ('59', '144', '37', '222', '990', '20000', '19800000', '2019-03-17 02:21:32.983191', '3');
INSERT INTO `tbl_purchase_from_vendor` VALUES ('60', '137', '37', 'sss', '200', '1000', '200000', '2019-03-17 02:29:42.844976', '3');
INSERT INTO `tbl_purchase_from_vendor` VALUES ('61', '119', '39', 'xyz', '100', '10', '1000', '2019-03-17 06:16:22.968509', '3');

-- ----------------------------
-- Table structure for tbl_vendor_invoices
-- ----------------------------
DROP TABLE IF EXISTS `tbl_vendor_invoices`;
CREATE TABLE `tbl_vendor_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_amount` decimal(10,0) DEFAULT 0,
  `total_items` int(11) DEFAULT 0,
  `paid_amount` decimal(10,0) DEFAULT 0,
  `payable_amount` decimal(10,0) DEFAULT 0,
  `invoice_date` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_vendor_invoices
-- ----------------------------
INSERT INTO `tbl_vendor_invoices` VALUES ('23', '222', '37', '2019-03-17 03:00:24', '19800000', '1000', '10000000', '9800000', '2019-03-06', '3');
INSERT INTO `tbl_vendor_invoices` VALUES ('24', 'sss', '37', '2019-03-17 02:29:42', '200000', '200', '0', '200000', '2019-03-21', '3');
INSERT INTO `tbl_vendor_invoices` VALUES ('25', 'xyz', '39', '2019-03-17 06:16:23', '1000', '100', '0', '1000', '2019-03-15', '3');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `useremail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'admin', 'admin@gmail.com', 'admin', '2018-12-13 10:16:35', 'admin', 'Active');
INSERT INTO `users` VALUES ('9', 'sohailgoheer', 'sohailgoheer@gmail.com', '123', '2019-03-15 17:27:02', 'saler', 'Active');
INSERT INTO `users` VALUES ('12', 'qasim', 'qasim@gmail.com', '123', '2018-09-14 12:06:45', 'saler', 'Active');

-- ----------------------------
-- Table structure for user_messages
-- ----------------------------
DROP TABLE IF EXISTS `user_messages`;
CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_messages
-- ----------------------------
INSERT INTO `user_messages` VALUES ('2', 'Muhammad Sohail Akbar', 'sohailgoheer@gmail.com', ' ', 'dddd', '2021-02-13 17:31:05');
INSERT INTO `user_messages` VALUES ('3', 'Muhammad Sohail', 'sohailgoheer@gmail.com', ' ', 'ddd', '2021-02-13 17:31:03');
INSERT INTO `user_messages` VALUES ('4', 'Muhammad Sohail', 'sohailgoheer@gmail.com', ' ', 'f', '2021-02-13 17:31:02');
INSERT INTO `user_messages` VALUES ('5', 'Muhammad Sohail', 'sohailgoheer@gmail.com', 'GIS, Geo-Spatial Databases', 'asdf', '2018-08-31 17:19:08');
INSERT INTO `user_messages` VALUES ('6', 'Muhammad Sohail', 'sohailgoheer@gmail.com', ' ', 'ddd', '2021-02-13 17:31:00');

-- ----------------------------
-- Table structure for vendor
-- ----------------------------
DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `f_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_customer` tinyint(4) DEFAULT 0,
  `customer_id` int(11) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `house_street` varchar(255) DEFAULT NULL,
  `town_city` varchar(255) DEFAULT NULL,
  `zip_code_postal` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `countary` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vendor
-- ----------------------------
INSERT INTO `vendor` VALUES ('37', '2019-03-17 02:19:46', 'Muhammad', '923337858384', 'sohailgoheer@gmail.com', '3', '0', null, 'Sohail', 'Lahore, xyz', 'Lahore', '63000', 'Punjab', 'India');
INSERT INTO `vendor` VALUES ('38', '2019-03-17 02:53:16', 'qasim', '923337858384', 'sohailgoheer@gmail.com', '3', '1', '69', 'shah', 'Lahore, xyz', 'Lahore', '63000', 'Punjab', 'Pakistan');
INSERT INTO `vendor` VALUES ('39', '2019-03-17 06:11:10', 'Waqas', '923337858384', 'sohailgoheer@gmail.com', '3', '1', '71', 'Alim', 'Lahore, xyz', 'Lahore', '63000', 'Punjab', 'India');

-- ----------------------------
-- Table structure for vendors_bill_summary
-- ----------------------------
DROP TABLE IF EXISTS `vendors_bill_summary`;
CREATE TABLE `vendors_bill_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `total_products` int(11) DEFAULT 0,
  `amount_on_total_produts` double DEFAULT 0,
  `paid_amount` double DEFAULT 0,
  `remaining_amount` double DEFAULT 0,
  `total_return_products` double DEFAULT 0,
  `amount_return_products` double DEFAULT 0,
  `date_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vendors_bill_summary
-- ----------------------------
INSERT INTO `vendors_bill_summary` VALUES ('24', '37', '1190', '20000000', '10000000', '10000000', '10', '200000', '2019-03-17 03:00:24', '3');
INSERT INTO `vendors_bill_summary` VALUES ('25', '38', '0', '0', '0', '0', '0', '0', '2019-03-17 02:53:16', '3');
INSERT INTO `vendors_bill_summary` VALUES ('26', '39', '100', '1000', '0', '1000', '0', '0', '2019-03-17 06:16:23', '3');
