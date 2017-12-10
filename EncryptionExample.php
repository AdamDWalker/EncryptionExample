<?php

  // File Name: EncryptionExample.php
  // Author: Adam Walker
  // Date Created: 10/12/2017
  // Last Edited: 10/12/2017

  // Validate the information

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
  // Encrypt Data





?>
