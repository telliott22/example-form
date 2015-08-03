<?php

    //Database connection details
    $servername = "sql2.freemysqlhosting.net";
    $username = "sql285759";
    $password = "bJ3!kE6!";
    $database = "sql285759";

    // Create connection
    $conn = mysql_connect($servername, $username, $password);
    $dbs = mysql_select_db($database, $conn);

    //Select all records from database
    $result = mysql_query("SELECT * FROM USER_DETAILS");

    $data = array();
    while ( $row = mysql_fetch_row($result) )
    {

      //Format date
      $row[5] = date('m/d/Y', strtotime($row[5]));
      $data[] = $row;

    }

    //Return JSON
    echo json_encode( $data );

?>