<?php

require_once '../../app.php';

//TODO: DELETE
$product_id = 0;
if(isset( $_GET['product_id'] )){
    $product_id = $_GET['product_id'];
}

$sql = 'DELETE from product 
                WHERE product_id=:product_id';

        //prepare and execute
        $sth = $db->prepare($sql);
        $sth->execute([
            ':product_id' => $product_id,
        ]);

header('Location: index.php ');