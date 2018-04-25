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
      if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
      $cityErr = "Only letters and whitespace allowed."; 
          $city = "";
    }
  }

  if (empty($_POST["state"])) {
    $stateErr = "State is required.";
  } else {
    $state = test_input($_POST["state"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
            $stateErr = "Only letters and whitespace allowed."; 
            $state = "";
    }
  }

    if (empty($_POST["zip"])) {
      $zipErr = "Zip code is required.";
    } else {
        $zip = test_input($_POST["zip"]);
        if(!preg_match("/^[0-9]{5}$/", $zip)){
            $zipErr = "Zip code has to be 5-digits.";
            $zip = "";
    }
    }   
    
    if ($address1 !== "" && $city !== "" && $state !== "" && $zip !== "") {
        $confirmMsg = "Here is the information you submitted.";
    }
}

if($address1 !== "" && $city !== "" && $state !== "" && $zip !== "") {
    $file = 'data.txt';
    $current = file_get_contents($file);
    $current .= "Address: \n";
    $current .= "$address1 $address2\n";
    $current .= "$city\n";
    $current .= "$state\n";
    $current .= "$zip\n\n";

    file_put_contents($file, $current);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Order | Caren's Corner</title>
    <script src="js/data.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/javascripthomework.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
    
<body>
    <header>
        <nav>
            <ul>
                <li><img src="images/logo.png" alt="Caren's Corner logo"/></li>
                <li><div class="links"><a href="http://web.csulb.edu/~013430025/phphomework/index.html">Home</a></div></li>
                <li><div class="links"><a href="http://web.csulb.edu/~013430025/phphomework/furniture.html">Furniture</a></div></li>
                <li><div class="links"><a href="http://web.csulb.edu/~013430025/phphomework/order.php">Order</a></div></li>
            </ul>
        </nav>
        <h1>Order</h1>
    </header>
    
    <div id="furnitureOrder">
        <form method="get" action="xx" id="addressForm">
            <table class="furnitureOrderTable">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <script>writeRows();</script>
<!--                    <script></script>-->
                </tbody>
            </table>
        </form>
    </div>
    <br/>
    
    <fieldset>
    <p><span class="required">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
<!--    <form method="post" action="writetxt.php" onsubmit="validateForm(); event.preventDefault();">-->
        Address 1: <input type="text" name="address1" value="">
        <span class="required">* <?php echo $addressErr;?></span>
        <br><br>
        Address 2: <input type="text" name="address2" value="">
        <br><br>
        City: <input type="text" name="city" value="">
        <span class="required">*<?php echo $cityErr;?></span>
        <br><br>
        State: <input type="text" name="state" value="">
        <span class="required">*<?php echo $stateErr;?></span>
        <br><br>
        Zip: <input type="text" name="zip" value="">
        <span class="required">*<?php echo $zipErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;<button type="reset" value="Reset">Reset</button>
        <br><br>
        <p><em>The information submitted will be displayed back to you upon submission, and will be saved to a .txt file for a homework assignment in CECS 470. The information will not be redistributed or used for purposes other than the homework assignment.</em></p>
    </form>
    </fieldset>
    
    <fieldset>
    <?php
    echo $confirmMsg;
    echo "<h2>Your Address:</h2>";
    echo "Address 1: ";
    echo $address1;
    echo "<br>";
    echo "Address 2: ";
    echo $address2;
    echo "<br>";
    echo "City: ";
    echo $city;
    echo "<br>";
    echo "State: ";
    echo $state;
    echo "<br>";
    echo "Zip Code: ";
    echo $zip;
    echo "<br>";
    echo "<form action='http://web.csulb.edu/~013430025/phphomework/data.txt'>";
    echo "<input type='submit' value='View .txt file'/>";
    echo "</form>";
    ?>
    </fieldset>
    
    
<!--
    <div id="addressOrder">
        <form method="get" action="xx" id="addressForm">
            <fieldset>
                <legend>Delivery/Pickup</legend>
                <p>Option: </p>
                <label for="delivery"><input type="radio" name="option" id="option1" value="1">Delivery</label><br/>
                <label for="pickup"><input type="radio" name="option" id="option2" value="2">Pickup</label><br/><br/>
                
                <fieldset class="deliveryfield">
                    <legend>Required for Delivery</legend>
                <p>
                    <label for="address1">Address 1: </label><br/>
                    <input type="text" name="address1" id="address1" class="requiredadd"/>
                </p>
                <p>
                    <label for="address2">Address 2: </label><br/>
                    <input type="text" name="address2" id="address2"/>
                </p>
                <p>
                    <label for="city">City: </label><br/>
                    <input type="text" name="city" id="city" class="requiredadd"/>
                </p>
                <p>
                    <label for="State">State: </label><br/>
                    <input type="text" name="state" id="state" class="requiredadd"/>
                </p>
                <p>
                    <label for="zip">Zip Code: </label><br/>
                    <input type="text" name="zip" id="zip" class="requiredadd"/>
                </p>
                </fieldset>
                
                <p>
                    <label for="name">Name: </label><br/>
                    <input type="text" name="name" id="name" class="required"/>
                </p>
                <p>
                    <label for="number">Phone Number: </label><br/>
                    <input type="text" name="number" id="name" class="required"/>
                </p>
                <p>
                    <label for="email">Email: </label><br/>
                    <input type="text" name="email" id="email" class="required"/>
                </p>
                <input type="submit" value="submit">
            </fieldset>
        </form>
    </div>
-->
    
    <footer>
        <?php
    echo "Last modified: ". date("F d Y H:i:s", getlastmod());
    ?>
        <a href=mailto:carenpbriones@gmail.com>carenpbriones@gmail.com</a>    
    </footer>
</body>
    
</html>