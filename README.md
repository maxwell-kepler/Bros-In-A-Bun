# Bros-In-A-Bun
CPSC471 - Final Project - Group 72

This project will be using XAMPP to host the PHP website, and will be using phpMyAdmin to host the MySQL database.

This project was based off of code found here: https://www.youtube.com/watch?v=BUCiSSyIGGU&ab_channel=TraversyMedia

We used their code as a template to start the project off of

To run this project:
1. Install XAMPP
2. Have the control panel run Apache and MySQL
3. In vscode, Go Live
4. Select the home.php, and have the PHP server serve the project
5. A server should now be running on localhost:3000

The database for this project is hosted on phpMyAdmin
1. Create a database called bros
2. Then, select the database and create a new user
    - Username: bro
    - Password: bros-in-a-bun-secure-password
    - Host name: localhost
    - Type: global
    - Privileges: all
3. After creating the database and user, import *.sql into phpMyAdmin by selecting the database on the left, then selecting import
4. The sql should be up to date