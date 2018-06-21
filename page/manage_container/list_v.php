<?php
//
$ob=null;
if(false){
  $ob=new con_container_main();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            th,td{
                border: 1 px solid #dddddd;
                /*border-bottom:1px solid grey;*/
                padding: 8px;
                text-align: left;
            }
            table{
                border-collapse: collapse;
                width:100%;     
                font-family: arial,sans-serif;
            }
            th{
                /*height: 35px;*/
            }
            tr:nth-child(even){
                background-color: #dddddd;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align: center;">List of containers</h2>      
        
        <table>
            <tr>
                <th>Picture</th>
                <th>Identifier</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><img src="../../image/container1.jpg" border="1" width="100" height=auto alt="container"/></td>
                <td>Identifier 1</td>
                <td>Description 1</td>
            </tr>
            <tr>
                <td><img src="../../image/containers.gif" border="1" width="100" height=auto alt="container"/></td>
                <td>Identifier 2</td>
                <td>Description 2</td>                
            </tr>
            <tr>
                <td><img src="../../image/container1.jpg" border="1" width="100" height=auto alt="container"/></td>
                <td>Identifier 3</td>
                <td>Description 3</td>
            </tr>
        </table>
        
        <!--<//?php
        foreach(Manage_container_c::$v_arr_container as $ob){           
            
        }
        ?>-->
    </body>
</html>

