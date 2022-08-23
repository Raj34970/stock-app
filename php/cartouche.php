<?php require ("config.php");
include "header2.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartouche</title>
    <link rel= "stylesheet" href="/stockosio/css/dash.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link href="/stockosio/img/s-fab.png" rel="icon" type="image/x-icon" />
</head>
<body>
</html>
<div class="btn">
    <button><img src="/stockosio/img/plus.svg" style="width: 15px !important;"><a href="/stockosio/php/addcartouche.php">Cartouche</a></button>
    <button><img src="/stockosio/img/cart.svg" style="width: 20px !important;"><a href="/stockosio/php/livrasion.php">Livrasion</a></button>
</div>
<?php
    $sql = "SELECT * FROM cartouche ORDER BY date,time DESC";
    $result = $conn->query($sql);
    if ($result->num_rows==0){?>
        <div class="txt">
            <h1>No data yet</h1>
        </div><?php
    }
    else{?>
        <div class="content-header">
            <section>
                <h1>Cartouche</h1>
            </section>
        </div>
        <div class="content">
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-body table-responsive">
                                <table id="" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>                                                  
                                            <th>#</th>
                                            <th>ID</th> 
                                            <th>Date(Y-M-D) /<br>
                                                Time(h-m-s)</th>
                                            <th>Machine-name</th>
                                            <th>Ref.</th>
                                            <th>Color</th>
                                            <th>Stock<br>Quantity</th>     
                                        </tr>                             
                                    </thead>
                                </table>
                            </diV>
                        </diV>
                    </diV>
                </diV>
            </section>
        </div>
        <?php $i=1;
        while($row = $result->fetch_array()){?>
            <div class="content">
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-body table-responsive">
                                    <table id="" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th><?php echo $i;?></th>                                                                                
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['date'];?><br>
                                                    <?php echo $row['time'];?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <th><a href="/stockosio/php/machcount.php?id=<?php echo($row['id']);?>"><?php echo $row['ref'];?></a></th>
                                                <td><?php echo $row['color'];?></td>
                                                <td><?php echo $row['quantity'];?></td>                                       
                                            </tr>                             
                                        </thead>
                                    </table>
                                </diV>
                            </diV>
                        </diV>
                    </diV>
                </section>
            </div>
        <?php
        $i++; //while loop
    }
}    
?>
</body>