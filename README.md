### Table of Contents
- [DiceCRM](#EduTechSoft)
- [Features of EduTechSoft](#features-of-EduTechSoft)
- [Requirements](#requirements)
- [Installation](#installation)

_Current Version: 0.0.5_

<img src="/EduTechSoft.png" alt="EduTechSoft"/>

## EduTechSoft

EduTechSoft is a simple PHP Laravel based software which is opensource intentionally built for managing and improving learning experience and operations in education system. 


## Features of EduTechSoft
Following are the few features of the product:

- Intuitive Dashboard
- User Management
- Manage Curriculum 
- Manage Orders
- Manage Services
- Manage Delivery
- Manage Payment
- Track Assignments in Calendar
- Messaging System
- Individual profile management
- Multi-tenancy Architecture
- User Alerts and Notifications


## Requirements
- PHP >= 7.4
- Composer >= 1.0
- Laravel >= 8.0
- MySQL


## Installation

To install EduTechSoft in your server, follow the below steps:
1. Clone the repository with **git clone** / Download and extract the files from the repository **EduTechSoft**
2. Copy **.env.example** file to **.env**
3. Edit **.env** file with the details such as app url, app name, database credentials, mail, and other credentials wherever needed.
4. Run **composer install** or **php composer.phar install**
5. Remove the specific packages from **composer.json** if any error occurs
6. Go to **config** folder and open **database.php**. Rewrite charset to '**utf8**' and collation to '**utf8_unicode_ci**'
7. Run **php artisan key:generate**
8. Run **php artisan migrate --seed** <br/>
_**Note:** **Seed is mandatory as it will create the first admin user.**_
9. For file or image attachments, run **php artisan storage:link** command
10. Start php server with command **php artisan serve**
11. Launch the main **URL**.
12. To log in to adminpanel, go to **/login** URL and log in with credentials <br/>
_Username: admin@admin.com <br/>
Password: password_ <br/>
13. For other users, email address is user's email and password is user's password

### Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

### License
This project is licensed under an [MIT license](https://github.com/RaamAnalyst/DiceCRM/blob/main/LICENSE).
