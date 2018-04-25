#!/usr/local/php5/bin/php-cgi
<?php


$nameErr = $emailErr = $addressErr = $cityErr = $stateErr = $zipErr = $name = $email = $address1 = $city = $state = $zip = $confirmMsg = "";

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required.";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and whitespace allowed."; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required.";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format."; 
    }
  }

  if (empty($_POST["address1"])) {
    $addressErr = "Address is required.";
  } else {
    $address1 = test_input($_POST["address1"]);
    }

  if (empty($_POST["city"])) {
    $cityErr = "City is required.";
  } else {
    $city = test_input($_POST["city"]);
  }

  if (empty($_POST["state"])) {
    $stateErr = "State is required.";
  } else {
    $state = test_input($_POST["state"]);
  }

  if (empty($_POST["zip"])) {
    $zipErr = "Zip code is required.";
  } else {
    $zip = test_input($_POST["zip"]);
  }
    
    if ($address1 !== "" && $city !== "" && $state !== "" && $zip !== "") {
        $confirmMsg = "Here is the information you submitted.";
    }
}

if($address1 !== "" && $city !== "" && $state !== "" && $zip !== "") {
    $data = $_POST['address1'] . "\n" . $_POST['city'] . "\n" . $_POST['state'] . "\n" . $_POST['zip'] . "\n";
    $ret = file_put_contents('data.txt', $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file\n";
        echo "<form action='http://web.csulb.edu/~013430025/PHPhomework/index.html'>";
        echo "<input type='submit' value='Back to Home Page'/>";
        echo "</form>";
        echo "<form action='http://web.csulb.edu/~013430025/PHPhomework/data.txt'>";
        echo "<input type='submit' value='View .txt file'/>";
        echo "</form>";
    }
}
else {
   die('no post data to process');
}  
?>