<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT INTO myguys (firstname, lastname, email) 
    VALUES ('John', 'Doe', 'john@example.com')");
    $last_id = $conn->lastInsertId();
    echo "<br> New record created successfully. Last inserted ID is: " . $last_id;

    $conn->exec("INSERT INTO myguys (firstname, lastname, email) 
    VALUES ('Mary', 'Moe', 'mary@example.com')");
    $last_id = $conn->lastInsertId();
    echo "<br> New record created successfully. Last inserted ID is: " . $last_id;

    $conn->exec("INSERT INTO myguys (firstname, lastname, email) 
    VALUES ('Julie', 'Dooley', 'julie@example.com')");
    $last_id = $conn->lastInsertId();
    echo "<br> New record created successfully. Last inserted ID is: " . $last_id;

    // commit the transaction
    $conn->commit();
    echo "<br> New records created successfully";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;
?>