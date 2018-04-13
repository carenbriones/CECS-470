#!/usr/local/php5/bin/php-cgi
<?php 
$genres = array("Abstract", "Baroque", "Gothic", "Renaissance");
$subjects = array("Animals", "Landscape", "People");

function arrayToOptions($arr){
    foreach($arr as $value){
        echo "<option value=\"$value\">$value</option>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="utf-8">
    <title>Chapter 12</title>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/misc.js"></script>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<?php include 'header.inc.php'; ?>
    
<main>
<form class="form"  id="mainForm" method="post" action="art-process.php">
   <fieldset class="form__panel">
      <legend class="form__heading">Edit Art Work Details</legend>
        <p class="form__row">
           <label for="title">Title</label><br/>
           <input id="title"type="text" name="title" class="form__input form__input--large" required/>
       </p>
       <p class="form__row">
           <label for="description">Description</label><br/>
           <input id="description" type="text" name="description" class="form__input form__input--large" required>
       </p>            
       <p class="form__row"> 
           <label for="genre">Genre</label><br/>
           <select id="genre" name="genre" class="form__input form__select">
              <option value="placeholder1">Choose genre</option> 
               <?php arrayToOptions($genres); ?>
           </select>
       </p>
       <p class="form__row"> 
           <label for="subject">Subject</label><br/>
           <select id="subject" name="subject" class="form__input form__select">
              <option value="placeholder2">Choose subject</option> 
               <?php arrayToOptions($subjects); ?>
           </select>
       </p>
       <p class="form__row">	
           <label for="medium">Medium</label><br/>               
           <input id="medium" type="text" name="medium" class="form__input form__input--medium" />
       </p>
       <p class="form__row">	
           <label for="year">Year</label><br/>               
           <input id="year" type="text" name="year" class="form__input form__input--small" />
       </p>  
       <p class="form__row">	
           <label for="museum">Museum</label><br/>               
           <input id="museum" type="text" name="museum" class="form__input form__input--medium"/>
       </p>                             

       <div class="form__box"> 
          <input type="submit" value="Submit" class="form__btn"> <input type="reset" value="Clear Form" class="form__btn">      
       </div>
   </fieldset>
</form>
</main>
    
    <?php
    echo "Last modified: ". date("F d Y H:i:s", getlastmod());
    ?>
</body>
</html>
