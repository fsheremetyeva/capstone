# Capstone Project - Community Helper

Documentation can be found in the [Docs](docs) directory

### Local installation instructions

This web application depends upon a "LAMP" stack for running. Or more specifically, a
 web server with [PHP](https://php.net/) support as well as a [MySQL](https://mysql.com/) / [MariaDB](https://mariadb.org/) database server.

 If running on macOS, [MAMP](https://www.mamp.info/en/) provides an easy and compatible Apache / MySQL / PHP stack.

 Setting up this web application can be done by:

 1. Copying the entire contents of the `communityhelper` folder within the root directory of the Git repository to your htdocs / public_html folder depending upon your web server configuration. The directory must be the path or virtual host expected by your HTTP server.

 2. Included at `database/community.sql` is a MySQL dump of the test database. You must import this to your running MySQL/MariaDB server instance via phpMyAdmin, the MySQL command line, or related
 import methods.

 3. Depending upon your host's configuration, you may need to edit the database name
 and the SQL server username/password credentials. That can be done by editing `communityhelper/index.php` with the "config" options at the start of the file for dbname / dbuser / dbpass.

