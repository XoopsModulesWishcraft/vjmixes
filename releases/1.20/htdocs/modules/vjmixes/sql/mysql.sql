CREATE TABLE `vjmixes_video_category` (                    
	`cid` INT(13) UNSIGNED NOT NULL AUTO_INCREMENT,  
	`weight` INT(13) UNSIGNED DEFAULT '1',
	`name` VARCHAR(128) DEFAULT NULL,                
	`image` VARCHAR(255) DEFAULT NULL,
	`description` MEDIUMTEXT,                        
	PRIMARY KEY (`cid`)                              
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

CREATE TABLE `vjmixes_video` (                            
	`id` INT(13) UNSIGNED NOT NULL AUTO_INCREMENT,  
	`cid` INT(13) UNSIGNED DEFAULT '0',             
	`name` VARCHAR(128) DEFAULT NULL, 
	`image` VARCHAR(255) DEFAULT NULL,
	`description` MEDIUMTEXT,                       
	`embedded` MEDIUMTEXT,                          
	`hits` INT(6) UNSIGNED DEFAULT '0',             
	`uid` INT(12) UNSIGNED DEFAULT NULL,            
	`created` INT(13) UNSIGNED DEFAULT '0',
	`comments` INT(6) UNSIGNED DEFAULT '0',             
	`video_tags` VARCHAR(255) DEFAULT NULL,
	PRIMARY KEY (`id`)                              
) ENGINE=MYISAM DEFAULT CHARSET=utf8;