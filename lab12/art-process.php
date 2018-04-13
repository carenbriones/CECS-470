#!/usr/local/php5/bin/php-cgi
<?php 

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
    <section class="results">
        <h2>Results</h2><br/><br/>
    
    <table>
      <caption class="results__caption">Art Work Saved</caption>
      <tr>
        <td class="results__label">Title</td>    
        <td class="results__value"><?php echo($_POST['title']); ?></td> 
      </tr>
      <tr>
        <td class="results__label">Description</td>    
        <td class="results__value"><?php echo($_POST['title']); ?></td> 
      </tr>
      <tr>
        <td class="results__label">Genre</td>    
        <td class="results__value"><?php echo($_POST['genre']); ?></td> 
      </tr>
      <tr>
        <td class="results__label">Subject</td>    
        <td class="results__value"><?php echo($_POST['subject']); ?></td> 
      </tr>
      <tr>
        <td class="results__label">Medium</td>    
        <td class="results__value"><?php echo($_POST['medium']); ?></td> 
      </tr>   
      <tr>
        <td class="results__label">Year</td>    
        <td class="results__value"><?php echo($_POST['year']); ?></td> 
      </tr>  
      <tr>
        <td class="results__label">Museum</td>    
        <td class="results__value"><?php echo($_POST['museum']); ?></td> 
      </tr>          
    </table>
    
    </section>
</main>
    <?php
    echo "Last modified: ". date("F d Y H:i:s", getlastmod());
    ?>
</body>
</html>
