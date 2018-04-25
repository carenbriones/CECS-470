#!/usr/local/php5/bin/php-cgi
<?php 
session_start();

    echo "Name: ";
    echo $_SESSION['name'];
    echo "<br>";
    echo "Email: ";
    echo $_SESSION['email'];
    echo "<br>";
    echo "Website: ";
    echo $_SESSION['website'];
    echo "<br>";
    echo "Comment: ";
    echo $_SESSION['comment'];
    echo "<br>";
    echo "Gender: ";
    echo $_SESSION['gender'];
    echo "<br><br>";
    
    echo "Last modified: ". date("F d Y H:i:s", getlastmod());


?>