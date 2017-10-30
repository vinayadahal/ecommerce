<?php
include 'templates/userheader.php';
include 'classes/dbConfig.php';
include 'includes/dbconfig.php';

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM customers WHERE id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>


<body>
<div class="content " >
    <label >Welcome : <?php print($userRow['username']); ?></label>

</div>
 
</body>
</html>