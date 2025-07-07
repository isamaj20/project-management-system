#  Project Management System – Benue State University

A web application that digitizes the management of final year projects in the Department of Computer Science, Benue State University. Built using PHP and MySQL, this system streamlines supervisor assignment, project topic submissions, and grading workflows.

##  Features

- Student registration and project topic submission
- Supervisor login to approve and manage projects
- Admin dashboard for user and project oversight
- Grading module for supervisors
- Search and reporting functionality

##  Tech Stack

- PHP (Procedural)
- MySQL
- HTML5 / CSS3
- XAMPP / Apache

##  Screenshots

Check `/screenshots/` folder for all Screenshots
   - [Home Page](screenshots/home.png)  
   - [Student Dashboard](screenshots/student-home.png)  
   - [Supervisor Panel](screenshots/supervisor-home.png)  
   - [Admin Interface](screenshots/cordinator-home.png)
   - [Student topic submission page](Screenshots/student-topic.png)
   - [Supervisior project listing](Screenshots/project-topics.png)

##  Setup Instructions

1. Clone the repository  
   ```bash
   git clone https://github.com/isamaj20/project-management-system.git

2. Install [XAMPP / Apache](https://www.apachefriends.org/) and setup MySQL database


3. Import the Database

   - Go to http://localhost/phpmyadmin

   - Click "New", create a new database (e.g., my_project)

   - Click the database name, then go to the Import tab

   - Import `projectmgt_system.sql` from `/db` folder and click Go
   

4. Update DB Connection in PHP
   - Go to `/php` and update `db_connection.php`
   
   ```bash
    $host="localhost";
    $user="root";
    $password="your-db-password";//or leave blank if no password
    $dbName="projectmgt_system"; //or database name you created

    
5. Launch via XAMPP or local server and visit `
http://localhost/project-management-system`

## Folder Structure 
		/images      - images and icon files 
		/php         - all php source codes
		/db          - Database and function files  
		/css         - CSS, JS  
		
## License

Academic and demo use only.
Feel free to fork and adapt with credit.

## Author
John Isama – [LinkedIn](https://www.linkedin.com/in/isama-john-adeyi/) | [GitHub](https://github.com/isamaj20/)