# Bros-In-A-Bun
CPSC471 - Final Project - Group 72

This project will be using XAMPP to host the PHP website, and will be using phpMyAdmin to host the MySQL database.

This project was based off of code found here: https://www.youtube.com/watch?v=BUCiSSyIGGU&ab_channel=TraversyMedia

We used their code as a template to start the project off of

To run this project:
1. Install XAMPP
2. Have the control panel run Apache and MySQL
3. Have the folder this project is in be in the XAMPP/htdocs folder
4. In VS Code, install Live Server, PHP Server, and PHP Intelephense
5. Then in VS Code, Go Live
6. Select the home/home.php, and have the PHP server serve the project
7. A server should now be running on localhost:3000

The database for this project is hosted on phpMyAdmin
1. Create a database called bros
2. Then, select the database and create a new user
    - Username: bro
    - Password: bros-in-a-bun-secure-password
    - Host name: localhost
    - Type: global
    - Privileges: all
3. After creating the database and user, import SQL_Exports/*.sql into phpMyAdmin by selecting the database on the left, then selecting import
4. Make sure to import it in the order of
    1. customer.sql, manager.sql
    2. order.sql, inventory.sql
    3. orderitem.sql, sides.sql, drinks.sql, ingredients.sql
5. The sql should be up to date

To log in the website, either sign up a new customer account, or sign in with one of the following credentials
| Role | Email | Password |
| :----: | :----: | :----: |
| Customer | max@mail.com | password |
| Customer | stevan@email.com | password |
| Customer | test@mail.ca | test |
| Customer | guest@mail.com | guest |
| Manager | manager@mail.com | password |
