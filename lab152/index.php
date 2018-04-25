#!/usr/local/php5/bin/php-cgi
<?php
$nameErr = $emailErr = $genderErr = $websiteErr = $name = $email = $gender = $comment = $website = "";

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

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL."; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required.";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <style>
        .required {color: #FF0000;}
    </style>
</head>
<body>


<h2>PHP Form</h2>
<p><span class="required">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name" value="">
        <span class="required">* <?php echo $nameErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="">
        <span class="required">* <?php echo $emailErr;?></span>
        <br><br>
        Website: <input type="text" name="website" value="">
        <span class="required"><?php echo $websiteErr;?></span>
        <br><br>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender"  value="female">Female
        <input type="radio" name="gender"  value="male">Male
        <input type="radio" name="gender"  value="other">Other
        <span class="required">* <?php echo $genderErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;<button type="reset" value="Reset">Reset</button>
    </form>

    <?php
    echo "<h2>Your Input:</h2>";
    echo "Name: ";
    echo $name;
    echo "<br>";
    echo "Email: ";
    echo $email;
    echo "<br>";
    echo "Website: ";
    echo $website;
    echo "<br>";
    echo "Comment: ";
    echo $comment;
    echo "<br>";
    echo "Gender: ";
    echo $gender;
    ?>
    <br><br>
    
    <?php
    echo "Last modified: ". date("F d Y H:i:s", getlastmod());
        ?>
    </p>
    </body>
    
</html>