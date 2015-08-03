<?php

    //Database connection details
    $servername = "sql2.freemysqlhosting.net";
    $username = "sql285759";
    $password = "bJ3!kE6!";
    $database = "sql285759";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);


    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //get values posted from from
    $first_name = "";
    $surname = "";
    $email_address = "";
    $telephone = "";
    $gender = "";
    $dob = "";
    $comments = "";

    if(isset($_POST['firstName']))
    {
       $first_name = $_POST['firstName'];
    }

    if(isset($_POST['surname']))
    {
       $surname = $_POST['surname'];
    }

    if(isset($_POST['emailAddress']))
    {
       $email_address = $_POST['emailAddress'];
    }

    if(isset($_POST['telephoneNumber']))
    {
       $telephone = $_POST['telephoneNumber'];
    }

    if(isset($_POST['gender']))
    {
       $gender = $_POST['gender'];
    }

    if(isset($_POST['comments']))
    {
       $comments = $_POST['comments'];
    }

    if(isset($_POST['dobDay']) && isset($_POST['dobMonth']) && isset($_POST['dobYear']))
    {

        $dob = date ("Y-m-d H:i:s", strtotime($_POST['dobDay'] . '-' . $_POST['dobMonth'] . '-' . $_POST['dobYear']));

    }

    //Insert into database
    $sql = "INSERT INTO USER_DETAILS (FIRSTNAME, SURNAME, EMAIL, TELEPHONE, GENDER, COMMENTS, DOB) VALUES ('" . $first_name ."', '" . $surname .  "', '" . $email_address . "', '" . $telephone . "','" . $gender ."', '" . $comments . "', '" . $dob . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    //Close connection
    $conn->close();

?>