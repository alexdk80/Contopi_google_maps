<?php

class Install_v{
    
    
}//end of class

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-control" content="no-cache">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta http-equiv="Lang" content="en">        
        <meta name="description" content="">
        <meta name="keywords" content="">
        
        <title >Contopi Google maps Test</title>
        <link rel="stylesheet" type="" href="">
                
    </head>
    <body>        
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" id="form1">
            <input type="hidden" name="command" value="" id="command">
            <input type="button" value="Install" name="btn_install" 
                   onclick="javascript:document.getElementById('command').value=
                               'install';document.getElementById('form1').submit();">            
        </form>
    </body>
</html>