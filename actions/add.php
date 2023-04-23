<?php

include_once '../db/ProductRepository.php';

if(isset($_POST["title"]) && isset($_POST["price"])) {
    $repo = new \db\ProductRepository(\db\DB::getInstance());

    $entity = [
        'title' => $_POST['title'],
        'price' => $_POST['price']
    ];

    $res = $repo->insert($entity);
    if($res !== null) {
        header("Location: ../index.php");
    } else {
        echo 'Something went wrong';
    }
}