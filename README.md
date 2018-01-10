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

## What to do

- Start up a WAMP server and give it the index.html and encryptionexample.php files.
- On localhost you should see the simple form from the index.html page
- Input some data (there is only validation to ensure each field is used, nothing else)
- When you press done, the data is encrypted by AES256 and put into the database
- The page should then echo out the encrypted data as base64 encoded text followed by decrypted text as an example of the decryption code.
