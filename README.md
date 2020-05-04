# Mini-Dropbox
Local file hosting service with HTML, PHP & MySQL

## File Structure
  - **index.html** - Login page created with basic HTML.
  - **auth.php** - MySQL builder for connecting to the local database.
  - **home.php** - Homepage for uploading files as a user.
  - **upload.php** - PHP backend framework for uploading files the local database.
  - **logout.php** - Secure logout by destroying session.
  - **/upload** - Storage of user files.

## Features
  - Login system with secure sessions.
  - Upload, download and preview files.
  - Autogenerated subfolders for new users.
  - Rename files with same name.

## Installation
**Mini-Dropbox** requires any form of software stack to run (WAMP, MAMP, XAMPP...).

- Download and unzip source to a desired directory
- Run software stack (WAMP, MAMP, XAMPP...)
- Open phpMyAdmin and create a new database with the name 'users'
- Insert the following SQL query:

SQL:
```SQL
CREATE TABLE IF NOT EXISTS `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(15) NOT NULL,
  	`password` varchar(200) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`) VALUES (1, 'admin', 'admin');
```
- Be sure that the localhost SQL has the following credentials on phpMyAdmin (by default):
$SQL_USER = 'root';
$SQL_PASS = '';

- Run Mini-Dropbox/index.html and login with 'admin' & 'admin'
- Feel free to create multiple users on PHPmyAdmin

## Development
- Marcelino Patrick Pini, 3d1
- Tobias Nordholm-Højskov, 3d1
