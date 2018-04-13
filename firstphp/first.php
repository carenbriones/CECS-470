#!/usr/local/php5/bin/php-cgi
<?php $user = "Caren";?>
<!DOCTYPE html>
<html>
    <body>
        <h1>Welcome <?php echo $user; ?></h1>
        <p>
        The server time is <?php echo "<strong>"; echo date("H:i:s"); echo "</strong>";?>
        </p>
    </body>
    
    <?php
    echo "Last modified: ". date("F d Y H:i:s", getlastmod());
    ?>
    
</html>