CREATE DATABASE htmlpages;

CREATE TABLE pages(
    id INT PRIMARY KEY,
    title VARCHAR(40),
    url VARCHAR(255)
);

INSERT INTO pages VALUES
    (1, 'T-shirts', 'T-shirts.php'),
    (2, 'Button-downs', 'button-downs.php'),
    (3, 'Sweat-shirts', 'sweat-shirts.php'),
    (4, 'Long-sleeves', 'long-sleeves.php'),
    (5, 'Jerseys', 'jerseys.php'),
    (6, 'Accessories', 'accessories.php'),
    (7, 'IIHM', 'iihm.php');

/* UPDATE pages SET url = REPLACE(url, '.html', '.php'); */ /*no need for this*/

CREATE TABLE comments(
    person VARCHAR(30) PRIMARY KEY,
	comment_text VARCHAR(600) 
);




/*RATING*/
CREATE TABLE `posts` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `content` text COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `rating` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `post_id` int(11) NOT NULL,
 `rating_number` int(11) NOT NULL,
 `user_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User IP Address',
 `submitted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;