# Sneaker-Website
# E-commerce Website Project

## Table of Contents
- [Project Description](#project-description)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Database Schema](#database-schema)
- [File Structure](#file-structure)
- [Contributing](#contributing)
- [License](#license)
- [Acknowledgements](#acknowledgements)

## Project Description
This project is a fully functional e-commerce website. It includes features for product browsing, user authentication, and secure payment processing. The front-end is built with HTML, CSS, and JavaScript, while the back-end is powered by PHP and MySQL.

## Features
- User Registration and Login
- Product Catalog
- Add to Cart
- Secure Checkout Process
- Order Confirmation with Thank You Page
- Admin Panel for Product Management (if applicable)

## Technologies Used
- **Front-end:** HTML, CSS, JavaScript
- **Back-end:** PHP, MySQL
- **Libraries/Frameworks:** None (pure vanilla JS and PHP)
- **Other Tools:** Apache Server (e.g., XAMPP, MAMP)

## Installation
1. **Clone the Repository:**
   ```bash
   git clone https://github.com/yourusername/ecommerce-website.git


   Navigate to the Project Directory:

Set Up the Database:

Create a database named Ecommerce_mgt.
Import the database.sql file included in the project to set up the tables.
Configure the Database Connection:

Update the database connection settings in backend.php and other relevant PHP files.
Start the Server:

Use an Apache server setup like XAMPP or MAMP to serve the project files.
Usage
Open the Website:

Navigate to the project directory in your browser (e.g., http://localhost/ecommerce-website).
Register/Login:

Register a new user or log in with existing credentials.

Database Schema
Table: signup
CREATE TABLE signup (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

Table: purchase
CREATE TABLE purchase (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    loc VARCHAR(255) NOT NULL,
    cardno VARCHAR(12) NOT NULL,
    months INT NOT NULL,
    years INT NOT NULL,
    cvv VARCHAR(3) NOT NULL
);

File Structure
ecommerce-website/
├── css/
│   └── styles.css
├── img/
│   └── [all image files]
├── js/
│   └── script.js
├── backend.php
├── check_login_status.php
├── index.html
├── login.html
├── logout.php
├── signup.html
├── thank_you.php
└── thank_you.css
Contributing
Fork the repository.
Create a new branch (git checkout -b feature-branch).
Make your changes.
Commit your changes (git commit -m 'Add some feature').
Push to the branch (git push origin feature-branch).
Open a pull request.
License
This project is licensed under the MIT License - see the LICENSE file for details.

Acknowledgements
Icons made by Iconfinder and Flaticon
Images from Unsplash


Save this content as `README.md` in your project directory. This will serve as the documentation for your GitHub repository.


