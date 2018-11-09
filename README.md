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

 3. The MySQL user credentials and database name configuration are stored in the `config.php.default` file. Modify the MySQL credentials and re-save the file as `config.php` to apply the changes.

### Server deployment instructions

 This web application depends upon a "LAMP" stack for running. Or more specifically, a
  web server with [PHP](https://php.net/) support as well as a [MySQL](https://mysql.com/) / [MariaDB](https://mariadb.org/) database server.  If running on macOS, [MAMP](https://www.mamp.info/en/) provides an easy and compatible Apache / MySQL / PHP stack.

Any LAMP server is fine such as DigitalOcean, shared Linux web hosting plans, etc. The steps for setting up this web application on a server are as follows:

  1. Upload the entire contents of the `communityhelper` folder within the root directory of the Git repository to your public_html folder on your web server. Depending upon your web server the folder name might be slightly different but just needs to be the directory that is web (HTTP) accessible.

  2. Included at `database/community.sql` is a MySQL dump of the test database. You must import this to your running MySQL/MariaDB server instance via phpMyAdmin, the MySQL command line, or any utilities offered by the hosting provider.

  3. The MySQL user credentials and database name configuration are stored in the `config.php.default` file. Modify the MySQL credentials and re-save the file as `config.php` to apply the changes.

  4. Navigate to your cloud/server http://IP-ADDRESS/communityhelper/ and the website should now be working.

### Automation ###

The automated deployment of GitHub updates to the test/production server is handled via GitHub web hooks with [Git-Deploy](https://github.com/vicenteguerra/git-deploy). Git-Deploy is a nice PHP based solution I discovered when researching deployment strategies.

Git-Deploy is placed on the server and has a basic configuration file for specifying the Git URL, desired branch, and other parameters. These parameters are nicely documented by the project's [README](https://github.com/vicenteguerra/git-deploy/blob/master/README.md).

After configuring Git-Deploy, it had to be setup from the GitHub web hooks page to make a request to the URL of the `deploy.php` file for initiating the update process on commits. From there when making new commits to the respected branch, it updates on the server.
