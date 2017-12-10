<?php

  // File Name: EncryptionExample.php
  // Author: Adam Walker
  // Date Created: 10/12/2017
  // Last Edited: 10/12/2017

  // Validate the information

  $servername = "localhost";
  $username = "root";
  $password = ""; // Super secure - I know

  $submitted_info = array("name", "address", "postcode", "phonenumber", "mobilenumber");

  // Check the data is all there
  foreach ($submitted_info as $element)
  {
    if (empty($_POST[$element]))
    {
      echo "Invalid form - Please complete all fields";
      die;
    }
  }

  // Connect to database

  try
  {
    $conn = new PDO("mysql:host=$servername;dbname=encryptiontest", $username, $password);

    // Error mode set to Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  }
  catch (PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }


  // Encrypt Data





?>
