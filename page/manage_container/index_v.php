
<?php
include_once 'dbconfig.php';
if(!$user->is_loggedin())
{
 $user->redirect('page/login.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM user WHERE id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="resources/style/bootstrap.min.css" type="text/css"  />
        <link rel="stylesheet" href="resources/style/style.css" type="text/css"  />
        <title>welcome - <?php print($userRow['email']); ?></title>
        <style>
            /*body{
                text-align:center;
            }
            .button{
                background-color: #4CAF50; /* Green 
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;                
                border-radius: 2px;
            }
            .button:hover{
                cursor:pointer;
            }
            label{
                color:grey;
                font-size:20px;                
            }
            h1{
                color:grey;
            }*/
        </style>
    </head>
    <body>
        <div class="header">
            <div class="left">
            <label><a href="http://www.contopi.com/">Contopi Home Page</a></label>
            </div>
            <div class="right">
            <label><a href="logout_c.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> Logout</a></label>
            </div>
        </div>
        <div class="content">
            Welcome : <?php print($userRow['name']); ?>
        </div>
        
        <h1 style="color:grey; text-align: center">Choose an action you would like to do with containers</h1>
        <div class="container">
            <div class="form-container">
                <div class="form-group"><label>Show Map: </label><button class="btn btn-block btn-primary" type="button" name="insert" value="insert" onclick="document.location='page/map2.php';"/>
                <i class="glyphicon glyphicon-open-file"></i>&nbsp;Show Map</button>    
            </div>
            <div class="form-group"><label>Insert Container: </label><button class="btn btn-block btn-primary" type="button" name="insert" value="insert" onclick="document.location='manage_container_c.php?command=display_insert';"/>
                <i class="glyphicon glyphicon-open-file"></i>&nbsp;Insert Container</button>    
            </div>
            <div class="form-group"><label>Update Container: </label><button class="btn btn-block btn-primary" type="button" name="update" value="update" onclick="document.location='manage_container_c.php?command=display_update';" />
                <i class="glyphicon glyphicon-open-file"></i>&nbsp;Update Container</button>
            </div>
            <div class="form-group"><label>Delete Container: </label><button class="btn btn-block btn-primary" type="button" name="delete" value="delete" onclick="document.location='manage_container_c.php?command=display_delete';" />
                <i class="glyphicon glyphicon-open-file"></i>&nbsp;Delete Container</button>
            </div>
            <div class="form-group"><label>Select Container: </label><button class="btn btn-block btn-primary" type="button" name="select" value="select" onclick="document.location='manage_container_c.php?command=select';" />
                <i class="glyphicon glyphicon-open-file"></i>&nbsp;Select Container</button>
            </div>
            </div>
        </div>    
        
    </body>
    
</html>