<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add employee</title>
  </head>
  <style type="text/css">
    div#message {
        text-align:center;
        margin-left:auto;
        margin-right:auto;
        width:40%;
        border: solid 2px green
        }
    table {
        border-collapse: collapse;
        width: 320px;
        }
    tr.heading {
      font-weight: bolder;
      }
    td {
      border: 1px solid black;
      padding: 0 0.5em;
      }
</style>
  <body>
    <h2>Adding employee</h2>

    <?php
    //attempt to connect mysql database
        $mysqli = new mysqli("localhost", "root", "", "employees");
        if ($mysqli === false) {
          die('cannot connect to data base'. mysqli_connect_error());
        }
      //if the form submitted
      //process from input
      if (isset($_POST['submit'])) {
        //open message book
        echo '<div id="message">';

        //retrive and check input values
        $inputError = false ;
        if (empty($_POST['emp_name'])) {
          echo "Error: please enter valid employee name <br>";
          $inputError = true;
        }else {
          $name = $mysqli->escape_string($_POST['emp_name']);
        }
        $inputError = false ;
        if (empty($_POST['emp_desig'])) {
          echo "Error: please enter valid employee designation <br>";
          $inputError = true;
        }else {
          $designation = $mysqli->escape_string($_POST['emp_desig']);
        }
        //add values to database using insert query
        if ($inputError != true) {
          $sql = "INSERT INTO employees (name, designation)
                  VALUES ('$name', '$designation')";
                  if ($mysqli->query($sql) === true) {
                      echo 'New employee recroded with ID '.$mysqli->insert_id;
                  } else{
                    echo "Error could not Execute the query: $sql " . $mysqli->error;
                  }
        }

        //close message block
        echo "</div>";
        
      }

     ?>
   </div>
    <form action="employee.php" method="post">
      Employee name: <br>
      <input type="text" name="emp_name" size="40">
      <p>
      Employee designation: <br>
      <input type="text" name="emp_desig" size="40">
    </p>
      <input type="submit" name="submit" value="submit">
    </form>
    <h3>Employee lists</h3>
    <?php 

      //get records 
      // formate as HTML table
      $sql = "SELECT id, name, designation FROM employees";
      if ($result = $mysqli->query($sql)) {
          if ($result->num_rows > 0) {
            echo "<table>\n";
            echo "<tr class=\"heading\" > \n ";
            echo "  <td>ID </td> \n";
            echo "  <td>Name </td> \n";
            echo "  <td>Designation </td> \n";
            echo "</tr>\n";

           echo 'Total employees are: ' .$result->num_rows.'<br>'; 
            while ($row = $result->fetch_object()) {
                  
                echo "<tr class=\"heading\"> \n ";
                echo " <td> ".$row->id."</td> \n";
                echo " <td>".$row->name."</td> \n";
                echo " <td>".$row->designation."</td> \n";
                echo "</tr>\n";
            }
            echo "</table>\n";
            
            $result->close();
          }else{
            echo "No employees in this database";
          }
      }else{
            echo "Error: Could not execute query: $sql.". $mysqli->error;
     }
      //close connection
      $mysqli->close();

     ?>

  </body>
</html>
