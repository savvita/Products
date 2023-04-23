<?php

include_once '../db/ProductRepository.php';

if(isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["price"])) {
    $repo = new \db\ProductRepository(\db\DB::getInstance());

    $entity = [
        'id' =>$_POST['id'],
        'title' => $_POST['title'],
        'price' => $_POST['price']
    ];

    $res = $repo->update($entity);
    if($res === true) {
        header("Location: ../index.php");
    } else {
        echo 'Something went wrong';
    }
}