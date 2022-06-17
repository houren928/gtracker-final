<?php 
$dbName = "gtracker_db";
$dbUserName= "hebat";
$dbHostName = "localhost";
$dbPassword = "hebat123";
$portNo = 3307; // Our database is connected to port 3307 (default is 3306), if you're using the default, ignore this code
// Build connection to our database
$conn = mysqli_connect($dbHostName, $dbUserName, $dbPassword, $dbName,$portNo);
// When there's connection error, we should find it out & print it
if(mysqli_connect_errno()){
    die("Databse connection fail!\n"+mysqli_connect_error());
}
?>