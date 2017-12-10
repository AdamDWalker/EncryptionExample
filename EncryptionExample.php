<?php

  // File Name: EncryptionExample.php
  // Author: Adam Walker
  // Date Created: 10/12/2017
  // Last Edited: 10/12/2017

  // Validate the information
  $servername = "localhost";
  $username = "root";
  $password = ""; // Super secure - I know


  // Encryption Properties
  $AES_key = "TestKey"; // PHP Docs recommend generation a cryptographically safe key prior to encryption - This is only for an example
  $cypher = "AES-256-CBC";

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

    // Get the Data
    $name = $_POST["name"];
    $address = $_POST["address"];
    $postcode = $_POST["postcode"];
    $phone_number = $_POST["phonenumber"];
    $mobile_number = $_POST["mobilenumber"];

    $data_to_encrypt = array("name" => $name,
                             "address" => $address,
                             "postcode" => $postcode,
                             "phonenumber" => $phone_number,
                             "mobilenumber" => $mobile_number);


    // Encrypt the data

    // These are used for AES256, taken from php docs - http://php.net/manual/en/function.openssl-encrypt.php
    $ivlen = openssl_cipher_iv_length($cypher);
    $iv = openssl_random_pseudo_bytes($ivlen);

    foreach ($data_to_encrypt as &$data)
    {
      // First use sha256
      $data = hash("sha256", $data);

      // Then use AES256
      $data = openssl_encrypt($data, $cypher, $AES_key, $options=0, $iv);
    }
    //echo var_dump($data_to_encrypt);

    //echo var_dump(openssl_get_cipher_methods());

    // Enter into the database
    $query = "INSERT INTO personal_info (Name, Address, Postcode, PhoneNumber, MobileNumber) VALUES (:Name, :Address, :Postcode, :PhoneNumber, :MobileNumber)";

    $result = $conn->prepare($query);
    $result->bindParam(":Name", $data_to_encrypt["name"]);
    $result->bindParam(":Address", $data_to_encrypt["address"]);
    $result->bindParam(":Postcode", $data_to_encrypt["postcode"]);
    $result->bindParam(":PhoneNumber", $data_to_encrypt["phonenumber"]);
    $result->bindParam(":MobileNumber", $data_to_encrypt["mobilenumber"]);

    $result->execute();
    echo "Completed the thingy";
  }
  catch (PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }





?>
