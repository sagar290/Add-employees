# Add-employees
### Database information

1.mysql> CREATE DATABASE employees;

2. Next, create a table to hold the employee records:table name employees
Database changed
mysql> CREATE TABLE employees  column(
-> id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
-> name VARCHAR(255) NOT NULL,
-> designation VARCHAR(255) NOT NULL
-> );

#now run the employee.php
