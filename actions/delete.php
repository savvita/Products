<?php
include_once '../db/ProductRepository.php';

if(isset($_POST["id"]) && !empty($_POST["id"])) {
    $repo = new \db\ProductRepository(\db\DB::getInstance());

    $res = $repo->delete($_POST["id"]);
    if($res === true) {
        header("Location: ../index.php");
    } else {
        echo 'Something went wrong';
    }
}
?>