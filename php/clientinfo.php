<?php include "header2.php"; require "config.php";
session_start();
$sql = "SELECT * FROM machine";
$sql2 = "SELECT * FROM clients";
$st_id= $_GET['id'];
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql2);
$result4 = $conn->query($sql);
$z=0; $y=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client-info</title>
    <link rel= "stylesheet" href="/stockosio/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link href="/stockosio/img/s-fab.png" rel="icon" type="image/x-icon" />
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
</head> 
<body>
    <div class="wrap">
        <div class="container-left">
            <div class="card">
            <?php 
            $rst_logo =mysqli_query($conn, "SELECT image FROM clients where id='$st_id'"); 
            $row11=mysqli_fetch_array($rst_logo);
            ?>
            <div class="top"><h1><img src="/stockosio/img/client.svg" style="width: 40px !important;">client</h1></div>
            <div class="col">
                <?php
                    $sql3 =mysqli_query($conn, "SELECT *  from clients where id='$st_id'"); 
                    $row3=mysqli_fetch_array($sql3);
                    $st_name=$row3['name'];?>
                    <diV class="left">
                        <h1><img src="/stockosio/img/<?php echo $row11['image']; ?>"></h1>
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Details</th>
                                </tr>
                                <tr>
                                    <th><?php echo "ID";?></th>
                                    <td><?php echo $st_id;?></td>
                                </tr>
                                <tr>
                                    <th><?php echo "Client";?></th>
                                    <td><?php echo $row3['name'];?></td>
                                </tr>
                                <tr>
                                    <th><?php echo "Ph.";?></th>
                                    <td><?php echo $row3['phone'];?></td>
                                </tr>
                                <tr>
                                    <th><?php echo "Add.";?></th>
                                    <td><?php echo $row3['address'];?></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="col">
                    <?php
                    $sql3 =mysqli_query($conn, "SELECT *  from clients");
                    $sql4 =mysqli_query($conn, "SELECT * from machine");
                    while($row3=mysqli_fetch_array($sql3)){
                        if($row3['id']==$st_id){
                            while($row4=mysqli_fetch_array($sql4)){
                                if($row3['machine']==$row4['name']){?>
                                    <div class="head">
                                        <div class="top"><h1><img src="/stockosio/img/printer.svg"><?php echo $row4['name'];?></h1></div>
                                        <div class="right">
                                            <table class="table table-light">
                                                <thead>
                                                    <tr>
                                                        <th>Machine</th>
                                                        <th>Type</th>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Image";?></th>
                                                        <td><img src="/stockosio/img/<?php echo $row4['image'];?>" id="table_logo"></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "ID";?></th>
                                                        <td><?php echo $row3['id'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Machine";?></th>
                                                        <td><?php echo $row4['name'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Machine";?><br>
                                                            <?php echo "Ref.";?></th>
                                                        <td><?php echo $row3['ref'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Type";?></th>
                                                        <td><?php echo $row4['type'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Ink";?></th>
                                                        <td><?php echo $row4['ink'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo("Compter");?></th>
                                                        <td><?php echo(date('(M/Y)'));?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "NB";?><br></th>
                                                        <td><?php echo $row3['nb'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Color";?></th>
                                                        <td><?php echo $row3['color'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <?php $total_compter= $row3['nb']+$row3['color'];?>
                                                        <th><?php echo "Total-compter";?></th>
                                                        <td><?php echo $total_compter;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Revenue(€)";?></th>
                                                        <td><?php echo $row3['total'];?></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </diV>
                                    </div>
                                    <?php
                                        $select = mysqli_query($conn, "SELECT * from clients where id !='$st_id'");
                                        while($row7=mysqli_fetch_array($select)){
                                            if($st_name==$row7['name']){
                                                $st_mach=$row7['machine'];
                                                $select2 =mysqli_query($conn, "SELECT * from machine where name='$st_mach'");
                                                $row8=mysqli_fetch_array($select2);
                                    ?>
                                    <div class="head">
                                        <div class="top"><h1><img src="/stockosio/img/printer.svg"><?php echo $row8['name'];?></h1></div>
                                        <diV class="right">
                                            <table class="table table-light" >
                                                <thead>
                                                    <tr>
                                                        <th>Machine</th>
                                                        <th>Type</th>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Image";?></th>
                                                        <td><img src="/stockosio/img/<?php echo $row8['image'];?>" id="table_logo"></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "ID";?></th>
                                                        <td><?php echo $row7['id'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Machine";?></th>
                                                        <td><?php echo $row8['name'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Machine";?><br>
                                                            <?php echo "Ref.";?></th>
                                                        <td><?php echo $row7['ref'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Type";?></th>
                                                        <td><?php echo $row7['type'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Ink";?></th>
                                                        <td><?php echo $row8['ink'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo("Compter");?></th>
                                                        <td><?php echo(date('(M/Y)'));?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "NB";?><br></th>
                                                        <td><?php echo $row7['nb'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Color";?></th>
                                                        <td><?php echo $row7['color'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <?php $total_compter= $row3['nb']+$row3['color'];?>
                                                        <th><?php echo "Total-compter";?></th>
                                                        <td><?php echo $total_compter;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo "Revenue(€)";?></th>
                                                        <td><?php echo $row7['total'];?></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </diV>
                                    </div>
                                    <?php }}
                                }
                            }
                        }
                    }
                ?>
                </div>
            </div>
        </div>
        <?php
        $sql5 =mysqli_query($conn, "SELECT * from livrasion where name='$st_name'");
        $row5=mysqli_fetch_array($sql5);
        $sql6 =mysqli_query($conn, "SELECT * from intervension where client='$st_name'");
        $row6=mysqli_fetch_array($sql6);
        if(!empty($row5['name']||!empty($row6['client']))){
        ?>
        <div class="container">
            <div class="card" style="width:auto;">
                <div class="top"><h1><img src="/stockosio/img/info.svg" style="width: 35px !important;">A Prop</h1></div>
                <?php if($row5['name']==$st_name){ ?>
                    <div class="col">
                        <diV class="right" id="liv2">
                            <h1><img src="/stockosio/img/cart.svg">Derniere Livraision</h1>
                            <table class="table table-light">
                                <thead>
                                    <tr>
                                        <th><?php echo "ID";?></th>
                                        <th><?php echo "Name";?></th>
                                        <th><?php echo "Machine";?></th>
                                        <th><?php echo "Type";?></th>
                                        <th><?php echo "Ref";?></th>
                                        <th><?php echo "Quantity";?></th>
                                        <th><?php echo "Date/Time";?></th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row5['ID'];?></td>
                                        <td><?php echo $row5['name'];?></td>
                                        <td><?php echo $row5['machine'];?></td>
                                        <th><?php echo $row5['type'];?></th>
                                        <td><?php echo $row5['ref'];?></td>
                                        <td><?php echo $row5['quantity'];?></td>
                                        <td><?php echo $row5['date'];?><br>
                                            <?php echo $row5['time'];?></td>
                                    </tr>
                                </thead>
                            </table>
                        </diV>
                    </div>
                    <?php }
                    if($row6['client']==$st_name){?>
                    <div class="col">
                        <diV class="right" id="liv">
                            <div class="top"><h1><img src="/stockosio/img/gear.svg">Derniere Intervension</h1></div>
                            <table class="table table-light">
                                <thead>
                                    <tr>
                                        <th><?php echo "ID";?></th>
                                        <th><?php echo "Client";?></th>
                                        <th><?php echo "Machine";?></th>
                                        <th><?php echo "Depanage";?></th>
                                        <th><?php echo "Compteur";?><br>
                                            <?php echo "depanage";?></th>
                                        <th><?php echo "Description";?></th>
                                        <th><?php echo "Date/Time";?></th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row6['id'];?></td>
                                        <td><?php echo $row6['client'];?></td>
                                        <td><?php echo $row6['machine'];?></td>
                                        <td><?php echo $row6['depanage'];?></td>
                                        <td>nb: <?php echo $row6['nbD'];?><br>
                                            C: <?php echo $row6['colorD'];?></td>
                                        <th><?php echo $row6['description'];?></th>
                                        <td><?php echo $row6['date'];?><br>
                                            <?php echo $row6['time'];?></td>
                                    </tr>
                                </thead>
                            </table>
                        </diV>
                    </div>
                </div>
            </div>
            <?php }
            }?>
        </div>
    </div>
</body>
</html>