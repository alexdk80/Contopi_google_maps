<!DOCTYPE html>
<html>
    <head>
        <script>
            function r(){
              document.location="manage_container_c.php?alert=Error";
            }
        </script>        
    </head>
    <body onload="r();">        
        <?php echo "<pre>line:".__LINE__." file:".basename(__FILE__)."</pre>";?>        
    </body>
</html>