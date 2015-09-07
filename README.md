# Add-employees
Database information
mysql> CREATE DATABASE employees;
Query OK, 1 row affected (0.20 sec)
Next, create a table to hold the employee records:
mysql> USE employees;
Database changed
mysql> CREATE TABLE employees (
-> id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
-> name VARCHAR(255) NOT NULL,
-> designation VARCHAR(255) NOT NULL
-> );
Query OK, 0 rows affected (0.26 sec)
now run the employee.php
