<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO myguys (firstname, lastname, email) 
    VALUES (:firstname, :lastname, :email)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);

    // insert a row
    $firstname = "Stephen";
    $lastname = "Brule";
    $email = "dr.steveBrule@timanderic.com";
    $stmt->execute();

    // insert another row
    $firstname = "Tim";
    $lastname = "Hiedecker";
    $email = "tim@timanderic.com";
    $stmt->execute();

    // insert another row
    $firstname = "Eric";
    $lastname = "Warheim";
    $email = "Eric@timanderic.com";
    $stmt->execute();

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;