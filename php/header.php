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
    <nav class="navbar">
        <a href="/stockosio/php/index.php"><div class="title"><img src="/stockosio/img/s-fab.png" alt="logo" class="logo">Stock-OSIO</div></a>
        <form class = "form-inline">
            <ul>
                <li><img src="/stockosio/img/search.svg" style="width:5% !important;"><input class="bar-search" id="bar-search" type="search" placeholder="Search" aria-label="Search"></li>
                <li><button class="btn-search"><a href="/stockosio/php/livrasion_list.php"><img src="/stockosio/img/cart.svg" alt="home" class="home">Livrasion</a></button></li>
                <li><button class="btn-search"><a href="/stockosio/php/client.php"><img src="/stockosio/img/client.svg" alt="user" class="home">clients</a></button></li>
                <li><button class="btn-search"><a href="/stockosio/php/addcounter.php"><img src="/stockosio/img/counter.svg" alt="home" class="home">add-compter</a></button></li>
            </ul>
        </form>
    </nav>
</body>
</html>

