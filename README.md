# EncryptionExample

This should be a simple example of some php encryption code. There is a webform to input data to a MySQL database for encryption, and that's basically everything :)


## Running the code

Create a MySQL server with a table named 'personal_info' and the column headings and types as shown in the table below.

                                ==========================
                                |     personal_info      |
    ========================================================================================
    |   ID    |   Name    |   Address   |   Postcode  |  PhoneNumber   |   MobileNumber    |
    | int(11) |                         varchar(108)                                       |
    ========================================================================================

  Alternatively you can import the SQL database provided in the repo.

  Then run the index.html file, input data into the forms and it should be encrypted and added to the database. The program will the base64_encode the encrypted data to echo to the browser, and decrypt this to echo out afterwards as a demo of decryption as well as encryption.
