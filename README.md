# Add-employees
Database information
mysql> CREATE DATABASE employees;

# Next, create a table to hold the employee records:
table name employees
Database changed
mysql> CREATE TABLE employees  column(
-> id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
-> name VARCHAR(255) NOT NULL,
-> designation VARCHAR(255) NOT NULL
-> );

#now run the employee.php
