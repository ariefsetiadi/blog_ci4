## Title

Blog CI 4

## Description

Blog using CodeIgniter 4 & MySql

## Requirements

- [x] Composer >= 2.9.1
- [x] PHP >= 7.2
- [x] MySql

## How To Install

- [x] Open Terminal / Command Prompt / Git Bash
- [x] Clone repo, **https://github.com/ariefsetiadi/blog_ci4.git**
- [x] Go to folder **blog_ci4**
- [x] Run **composer install**
- [x] Copy & rename file **env** to **.env**
- [x] Run **composer install**
- [x] Open file **.env**,
  - Change **# CI_ENVIRONMENT = production** to **CI_ENVIRONMENT = development**
  - Change **# database.tests.hostname = localhost** to **database.tests.hostname = localhost**
  - Change **# database.tests.database = ci4** to **database.tests.database = Your_database**
  - Change **# database.tests.username = root** to **database.tests.username = Your_database_username**
  - Change **# database.tests.password = root** to **database.tests.password = Your_database_password**
  - Change **# database.tests.DBDriver = MySQLi** to **database.tests.DBDriver = MySQLi**
  - Change **# database.tests.DBPrefix =** to **database.tests.DBPrefix =**
- [x] Run **php spark migrate**
- [x] Run **php spark db:seed DatabaseSeeder**
