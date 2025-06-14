1) ## User Management System:

  This "User Management System" built using Core PHP (RESTful API and a **frontend with HTML/CSS/JavaScript**. This system allows users to be created, read, updated, and deleted (CRUD operations) through an interactive interface.


##  Features:

  - RESTful API in Core PHP
  - CRUD operations: Create, Read, Update, Delete Users
  - Fields: `name`, `email`, `password`, `dob`
  - HTML/CSS frontend to interact with the API
  - API tested using Postman

  ##  Project Structure

  /project-root(goqii)
  ├── api/
  │ ├── config.php
  │ └── user_api.php
  ├── frontend/
  │ ├── index.php
  │ ├── style.css
  │ └── script.js
  └── README.md


2) ## Database Configuration
   
  Import the following SQL to create the database:
  
  CREATE DATABASE goqi;
  
  USE goqi;
  
  CREATE TABLE users (
      id int(11) NOT NULL,
      name varchar(100) DEFAULT NULL,
      email varchar(100) DEFAULT NULL,
      password varchar(255) DEFAULT NULL,
      dob DATE DEFAULT NULL
  );
  
   -> Update database connection in api/config.php:
 
3) ## Run Locally
   
  Start a local PHP server from the project root:
  
  http://localhost/goqii/
  
  Access the frontend at:
  
  http://localhost/goqii/index.php


4) ## How to Use
   
    Add User: Fill the form and click “Submit”.
    
    View Users: A table shows all existing users.
    
    Edit/Delete: Each user row has buttons to update or remove them.
    
    All actions interact with the backend API (user_api.php) via AJAX (fetch()).


5) ## Technologies Used
   
      Backend: Core PHP
      
      Frontend: HTML, CSS, JavaScript
      
      Database: MySQL
      
      Tools: sublime text, Postman, Git

