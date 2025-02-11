-- Create the database if it doesn't already exist
CREATE DATABASE IF NOT EXISTS voting_db;
USE voting_db;

-- Create the "students" table
CREATE TABLE IF NOT EXISTS students (
    student_id INT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL  -- In production, store hashed passwords!
) ENGINE=InnoDB;

-- Create the "votes" table
CREATE TABLE IF NOT EXISTS votes (
    vote_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    president VARCHAR(50) NOT NULL,
    vice_president VARCHAR(50) NOT NULL,
    secretary VARCHAR(50) NOT NULL,
    vote_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(student_id),  -- Ensures one vote per student
    FOREIGN KEY (student_id) REFERENCES students(student_id)
) ENGINE=InnoDB;
