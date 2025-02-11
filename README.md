# voting-system
# Web-Based Departmental Executive Voting System

This project is a web-based voting system designed for departmental executive elections. It is built using HTML, CSS, JavaScript, PHP, and MySQL (using XAMPP). The system allows students to securely log in and cast their votes for the positions of President, Vice President, and Secretary.

## Project Structure

project/ 
    ├── backend/ 
    │ ├── authenticate.php 
    │ ├── db_connection.php 
    │ ├── logout.php 
    │ └── process_vote.php 
    ├── frontend/ 
    │ ├── login.php 
    │ ├── voting.php 
    │ ├── styles.css 
    │ └── validate.js 
    └── schema.sql


- **backend/**: Contains PHP scripts responsible for user authentication, database connections, vote processing, and logout functionality.
- **frontend/**: Contains the HTML, CSS, and JavaScript files that define the user interface for the login and voting pages.
- **schema.sql**: The SQL schema file used to set up the MySQL database, including tables for `students` and `votes`.

## Setup Instructions

### Prerequisites

- **XAMPP:** Make sure XAMPP (or a similar local server environment) is installed and that Apache, MySQL, and PHP are running.
- **Web Browser:** A modern browser to access the application.

### Database Setup

1. **Start XAMPP:** Open the XAMPP Control Panel and start both the **Apache** and **MySQL** services.
2. **Open phpMyAdmin:** Navigate to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. **Import the Database Schema:**
   - Click the **"Import"** tab in phpMyAdmin.
   - Select the `schema.sql` file from the project folder.
   - Click **"Go"** to execute the script, which will create the `voting_db` database along with the necessary tables.
   
   Alternatively, you can copy the contents of `schema.sql` into the SQL tab and execute it manually.

### Configuring the Application

1. **Database Connection:**
   - Open `backend/db_connection.php` and ensure the connection settings match your XAMPP configuration. By default:
     ```php
     $host = 'localhost';
     $db   = 'voting_db';    // Must match the database name created from schema.sql
     $user = 'root';         // XAMPP default username
     $pass = '';             // XAMPP default password (usually empty)
     ```
2. **Folder Paths:**
   - Since the front-end and back-end are in separate folders, ensure that any PHP redirection or include paths in your files are adjusted accordingly. For example, in `backend/authenticate.php`, if redirecting to the login page in the `frontend` folder, use:
     ```php
     header("Location: ../frontend/login.php");
     exit();
     ```

### Adding a Test User

To test the login functionality, add a test student record to the `students` table via phpMyAdmin or by running an SQL query. For example:

```sql
INSERT INTO students (student_id, name, email, password)
VALUES (1001, 'Xamion', 'xamion@example.com', 'xamion');
