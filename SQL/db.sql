CREATE DATABASE unity_care;
USE unity_care;

CREATE TABLE departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(20),

    age INT NOT NULL,
    registration_date DATE NOT NULL,

    department_id INT,
    FOREIGN KEY (department_id) REFERENCES departments(id)
        ON DELETE SET NULL
);

CREATE TABLE doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(20),

    years_of_service INT NOT NULL,
    department_id INT,

    FOREIGN KEY (department_id) REFERENCES departments(id)
        ON DELETE SET NULL
);
