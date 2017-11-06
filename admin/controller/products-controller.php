<?php

require_once '../config/site-config.php';
require_once '../model/product.php';
require_once '../service/helper-method.php'; // write some if login check
if (!checkLogin()) {
    header("Location: " . base_url . "/admin/login");
}

if (!isset($_REQUEST['target'])) {
    $result = (new product())->list_product();
}

if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'addProduct') {
    foreach ($_POST as $key => $value) {
        $filteredKey = htmlspecialchars($key);
        $$filteredKey = htmlspecialchars($value);
    }
    $imageFileName = htmlspecialchars(image_uploader());
    $col_val = array(
        'title' => $name,
        'category_id' => $category_id,
        'description' => $description,
        'offer' => $offer,
        'quantity' => $quantity,
        'price' => $price,
        'image' => $imageFileName
    );
    $result = (new product())->add_product($col_val, $product_id);
    header("Location: " . base_url . "/admin/products");
}

if (isset($_REQUEST['id']) && $_REQUEST['target'] == 'editProduct') {
    $id = htmlspecialchars($_REQUEST['id']);
    $result = (new product())->get_product($id);
    $items = $result[0];
}

if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'updateProduct') {
    foreach ($_POST as $key => $value) {
        $filteredKey = htmlspecialchars($key);
        $$filteredKey = htmlspecialchars($value);
    }

    if (!empty($_FILES["imageFile"]["name"])) {
        $imageFileName = htmlspecialchars(image_uploader());
        $col_val = array(
            'title' => $name,
            'category_id' => $category_id,
            'description' => $description,
            'offer' => $offer,
            'quantity' => $quantity,
            'price' => $price,
            'image' => $imageFileName
        );
    } else {
        $col_val = array(
            'title' => $name,
            'category_id' => $category_id,
            'description' => $description,
            'offer' => $offer,
            'quantity' => $quantity,
            'price' => $price
        );
    }
    $result = (new product())->update_product($col_val, $product_id);
    header("Location: " . base_url . "/admin/products");
}

if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'deleteProduct') {
    $product_id = htmlspecialchars($_GET['id']);
    $result = (new product())->delete_product("id", $product_id);
    if ($result) {
        header("Location: " . base_url . "/admin/products");
    }
}

function image_uploader() {
    require_once '../rootDirSet.php';
    $target_dir = rootDir . "/admin/images/";
    $target_file = $target_dir . basename($_FILES["imageFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION); // checking things
// Check if image file is a actual image or fake image
//    if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imageFile"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


//    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["imageFile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["imageFile"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    return basename($_FILES["imageFile"]["name"]);
}
