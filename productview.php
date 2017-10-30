<?php
// database Connect
include 'classes/dbConfig.php';
include 'includes/dbconfig.php';

// header
include 'templates/userheader.php';

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
 <div class="container">
    <h1>All Products</h1>
    <div id="products" class="row list-group">
        <?php
        //get rows query
        $query = $db->query("SELECT p.id,p.title,p.image,p.description,p.price,c.category_title FROM products p, categories c where p.category_id=c.category_id ORDER BY RAND ()");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        <div class="item col-lg-4">
            <div class="thumbnail"  >
                <div class="caption">
                    <h4 class="list-group-item-heading"><?php echo $row["title"]; ?></h4>
                    <p class="list-group-item-text"><img src='admin_area/images/<?php echo $row["image"]; ?>' style="height: 200px; width: 330px" alt=></p></br>
                    <p class="list-group-item-text"><?php echo $row["description"]; ?></p></br>
                    <p class="lead"><?php echo 'Category: '.$row["category_title"]; ?></p>
                    <div class="row">
                        
                        <div class="col-md-6">
                            
                            <p class="lead"><?php echo $row["price"].' Rs'; ?></p>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
    </div>
</div>
</body>
</html>