<?php
if ($_SERVER ["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST ["username"];
    $password = $_POST ["password"];

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "dbtk";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error){
        die ("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($query);

    if ($result->num_rows > 0){
        header ("Location: index.php");
        exit ();
        //login sukses 
    }
    else {
        exit ();
        //login failed 
    }

    $conn->close();
}

?>