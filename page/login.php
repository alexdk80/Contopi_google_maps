
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>-->
<link rel="stylesheet" href="../resources/style/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="../resources/style/style.css" type="text/css"  />
<link rel="stylesheet" href="resources/style/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="resources/style/style.css" type="text/css">
</head>
<body>
<div class="container">
     <div class="form-container">
        <form method="post">
            <h2>Login</h2><hr />            
            <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
            <div class="form-group">
             <input type="text" class="form-control" name="name_email" placeholder="Username or Email" required />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="password" placeholder="Your Password" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" name="login" class="btn btn-block btn-primary">
                 <i class="glyphicon glyphicon-log-in"></i>&nbsp;LOGIN
                </button>
            </div>
            <br />
            <label>Don't have account yet ! <a href="register_c.php">Register</a></label>
        </form>
       </div>
</div>

</body>
</html>