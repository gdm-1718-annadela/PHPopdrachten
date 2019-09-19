<?php

if( ! function_exists('get_products')) {
    function get_products($sort = 'name'){
        global $db;

        $sql = 'SELECT product.*, brand.name as brand FROM product 
                LEFT JOIN brand ON brand.brand_id = product.brand_id
                ORDER BY '.$sort;

        $result = $db->query($sql)->fetchAll();

        return $result;
    }
}

if( ! function_exists('get_product_by_id')) {
    function get_product_by_id($product_id){
        global $db;
        
        $sql = 'SELECT * FROM product WHERE product_id = :product_id';

        $sth = $db->prepare($sql);
        $sth->execute([':product_id' => $product_id]);
        $result = $sth->fetchObject();

        return $result;
    }
}