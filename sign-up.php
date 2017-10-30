<?php
// database Connect
require_once 'includes/dbconfig.php';

// header
include 'templates/header.php';


// check if already logged in
if($user->is_loggedin()!="")
{
    $user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
   $uname = trim($_POST['uname']);
   $umail = trim($_POST['umail']);
   $upass = trim($_POST['upass']); 
   $fname = trim($_POST['firstname']); 
   $lname = trim($_POST['lastname']); 
   $phone = trim($_POST['phone']); 
   $address = trim($_POST['address']); 
 
   if($uname=="") {
      $error[] = "provide username !"; 
   }
   else if($umail=="") {
      $error[] = "provide email id !"; 
   }
   else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($upass=="") {
      $error[] = "provide password !";
   }
   else if($fname=="") {
      $error[] = "provide first name !";
   }else if($lname=="") {
      $error[] = "provide last name !";
   }else if($phone=="") {
      $error[] = "provide phone no. !";
   }else if($address=="") {
      $error[] = "provide address !";
   }
   else if(strlen($upass) < 6){
      $error[] = "Password must be atleast 6 characters"; 
   }
   else
   {
      try
      {
         $stmt = $DB_con->prepare("SELECT username,email FROM customers WHERE username=:uname OR email=:umail");
         $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['username']==$uname) {
            $error[] = "sorry username already taken !";
         }
         else if($row['email']==$umail) {
            $error[] = "sorry email id already taken !";
         }
         else
         {
            if($user->register($uname,$umail,$upass,$fname,$lname,$phone,$address)) 
            {
                $user->redirect('sign-up.php?joined');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign up : cleartuts</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
<div class="container">
     <div class="form-container">
        <form method="post">
            <h2>Sign up.</h2><hr />
            <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
            }
            ?>
            <div class="form-group">
            <input type="text" class="form-control" name="uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="umail" placeholder="Enter E-Mail ID" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="upass" placeholder="Enter Password" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" />
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="phone" placeholder="Enter Phone" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Enter Address" />
            </div>
            
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">
                 <i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <label>have an account ! <a href="login.php">Sign In</a></label>
        </form>
       </div>
</div>

</body>
</html>