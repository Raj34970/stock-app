<?php 
require "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock-OSIO</title>
    <link rel="stylesheet" href="/stockosio/css/style_hd.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="/stockosio/img/s-fab.png" rel="icon" type="image/x-icon" />
</head>
<body>
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="/stockosio/php/index.php" id="head"><img src="/stockosio/img/s-fab.png" class="logo"><h1>Stock-OSIO</h1></a></li>
            <li><a href="/stockosio/php/cartouche.php"><img src="/stockosio/img/cartouche.svg" style="width: 20px !important;"></a></li>
            <li><a href="/stockosio/php/tonerbag.php">TB</a></li>
            <li><img src="/stockosio/img/search.svg" id="search_img"><input class="bar-search" id="bar-search" type="search" placeholder="search"></li>
            <li><a href="/stockosio/php/unitimage.php">UI</a></li>
            <li><a href="/stockosio/php/client.php"><img src="/stockosio/img/client.svg" style="width: 20px !important;"></a></li>
            <li><a href="/stockosio/php/livrasion_list.php"><img src="/stockosio/img/cart.svg" style="width: 20px !important;"></a></li>
            <li><a href="/stockosio/php/machine.php"><img src="/stockosio/img/printer.svg" style="width: 20px !important;"></a></li>
            <li><a href="/stockosio/php/addcounter.php"><img src="/stockosio/img/counter.svg" style="width: 20px !important;"></a></li>
            <li><a href="/stockosio/php/intervension.php"><img src="/stockosio/img/gear.svg" style="width: 20px !important;"></a></li>
        </ul>
        <div class="list-group" id="show-list"></div>
    </div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/stockosio/js/search.js"></script>

