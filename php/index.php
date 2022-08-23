<?php
session_start();
if(!isset($_SESSION['authenticated'])){
    header('Location: /stockosio/');
    exit;
}
else{
require "config.php";
include "header2.php";
$comp =mysqli_query($conn,"SELECT color,nb From clients");
$car =mysqli_query($conn,"SELECT quantity FROM cartouche");
$ton =mysqli_query($conn,"SELECT quantity FROM tonerbag");
$img =mysqli_query($conn,"SELECT quantity FROM imageunit");
$cl =mysqli_query($conn,"SELECT * FROM clients");
$count_car=0; $count_ton=0; $count_img=0; $c=0; $counter_mach=0;
while($row=mysqli_fetch_array($car)){
    $count_car=$count_car+$row["quantity"];
}
while($row=mysqli_fetch_array($ton)){
    $count_ton=$count_ton+$row["quantity"];
}
while($row=mysqli_fetch_array($img)){
    $count_img=$count_img+$row["quantity"];
}
while($row=mysqli_fetch_array($cl)){
    $c++;
}
while($row=mysqli_fetch_array($comp)){
    $counter_mach=$counter_mach+$row["color"]+$row["nb"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Dash</title>
    <link rel="stylesheet" href="/stockosio/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="/stockosio/img/s-fab.png" rel="icon" type="image/x-icon" />
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="dash"> 
                <div class="action">
                    <button><img src="/stockosio/img/cartouche.svg" style="width: 20px !important;"><a href="/stockosio/php/cartouche.php">Cartouche</a></button>
                    <button><a href="/stockosio/php/tonerbag.php">Toner-bag</a></button>
                    <button><a href="/stockosio/php/unitimage.php">Unit-Image</a></button>
                    <button><img src="/stockosio/img/client.svg" style="width: 20px !important;"><a href="/stockosio/php/client.php">Client-Info</a></button>
                    <button><img src="/stockosio/img/cart.svg" style="width: 20px !important;"><a href="/stockosio/php/livrasion_list.php">Livrasion</a></button>
                    <button><img src="/stockosio/img/printer.svg" style="width: 20px !important;"><a href="/stockosio/php/machine.php">Machine</a></button>
                    <button><img src="/stockosio/img/counter.svg" style="width: 20px !important;"><a href="/stockosio/php/addcounter.php">compteur</a></button>
                    <button><img src="/stockosio/img/gear.svg" style="width: 20px !important;"><a href="/stockosio/php/intervension.php">Intervension</a></button>
                </div>
            </div>
            <div class="dash">
                <div class="show">
                    <h1><img src="/stockosio/img/stock.svg" style="width: 35px !important;">Total Stock</h1>
                </div>
                <div class="show" >
                    <?php echo htmlentities("Cartouche: ".$count_car);?><br>
                    <?php echo htmlentities("Toner-bags: ".$count_ton);?><br>
                    <?php echo htmlentities("Image-unit: ".$count_img);?><br>
                    <?php echo htmlentities("Total-Clients: ".$c);?><br>
                    <?php echo htmlentities("Total-Compter: ".$counter_mach);?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="dash">
            <?php
            $counter_color = mysqli_query($conn,"SELECT * FROM clients ORDER BY color DESC");
            $counter_nb = mysqli_query($conn,"SELECT * ORDER BY color DESC");
            ?>
            <div class="card" style="margin:auto;">
                </h3>
                <div class="col">
                    <h3><img src="/stockosio/img/counter.svg" style="width: 35px !important;">Higest compter<?php echo(date('(M/Y)'));?></h3>
                    <?php $i=0;
                        while($row3=mysqli_fetch_array($counter_color)){
                            $i++;?>
                            <diV class="left">
                                <h4><a href="/stockosio/php/clientinfo.php?id=<?php echo($row3['id']);?>">
                                    <img src="/stockosio/img/<?php echo $row3['image'];?>"><?php echo $row3['name'];?></a>
                                </h4>
                                <table class="table table-light">
                                    <thead>
                                        <tr>
                                            <th scope="col">Client</th>
                                            <th scope="col">compter</th>
                                        </tr>
                                        <tr>
                                            <th scope="col"><?php echo "Client ID";?></th>
                                            <td><?php echo $row3['id'];?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col"><?php echo "Client";?></th>
                                            <td><?php echo $row3['name'];?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col"><?php echo "Machine Ref.";?></th>
                                            <td><?php echo $row3['color'];?></td>
                                        </tr>
                                    </thead>
                                </table>
                            </diV>
                            <?php
                            if($i>1){
                                break;
                                exit();
                            }
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>