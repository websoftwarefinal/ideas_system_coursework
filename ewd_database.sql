
create database ewd_database;
use ewd_database;

-- Create Roles table
CREATE TABLE Roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL
);

-- Create Categories table
CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL
);

-- Create Department table
CREATE TABLE Department (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(50) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES Roles(role_id)
);

-- Create Staff table
CREATE TABLE Staff (
    staff_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email_address VARCHAR(255) NOT NULL,
    phone_number TEXT NOT NULL,
    password VARCHAR(255) NOT NULL,
    account_status VARCHAR(20) NOT NULL,
    position VARCHAR(50) NOT NULL,
    role_id INT,
    department_id INT,
    FOREIGN KEY (role_id) REFERENCES Roles(role_id),
    FOREIGN KEY (department_id) REFERENCES Department(department_id)
);

-- Create Login_staff table
CREATE TABLE Login_staff (
    login_id INT AUTO_INCREMENT PRIMARY KEY,
    staff_id INT,
    date_time DATETIME NOT NULL,
    FOREIGN KEY (staff_id) REFERENCES Staff(staff_id)
);

-- Create Idea table
CREATE TABLE Idea (
    idea_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date DATE NOT NULL,
    likes INT DEFAULT 0,
    staff_id INT,
    FOREIGN KEY (staff_id) REFERENCES Staff(staff_id)
);

-- Create Idea_Categories (join table)
CREATE TABLE Idea_Categories (
    idea_id INT,
    category_id INT,
    PRIMARY KEY (idea_id, category_id),
    FOREIGN KEY (idea_id) REFERENCES Idea(idea_id),
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

-- Create Comments table
CREATE TABLE Comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    author_id INT,
    idea_id INT,
    date DATE NOT NULL,
    text TEXT NOT NULL,
    FOREIGN KEY (author_id) REFERENCES Staff(staff_id),
    FOREIGN KEY (idea_id) REFERENCES Idea(idea_id)
);

-- Create Likes table
CREATE TABLE Likes (
    idea_id INT,
    author_id INT,
    PRIMARY KEY (idea_id, author_id),
    FOREIGN KEY (idea_id) REFERENCES Idea(idea_id),
    FOREIGN KEY (author_id) REFERENCES Staff(staff_id)
);
