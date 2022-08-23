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
    <title>CLIENTS-info</title>
    <link rel= "stylesheet" href="/stockosio/css/dash.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/stockosio/css/style_adminpage.css">
    <link href="/stockosio/img/s-fab.png" rel="icon" type="image/x-icon" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
</head>
<body>
<div class="heading"><button name="info" onclick="notes()"><img src="/stockosio/img/info.svg" style="width: 20px !important;">Info</button></div>
<div class="show" id="show"><img src="/stockosio/img/attention.svg" style="width: 35px !important;"><h4>attention</h4><h5>Compter auto reset on 1st of every month on 00:00</h5></div>
<script>
function notes() {
    var x = document.getElementById("show");
    if (x.style.display === "block") {
        x.style.display = "none";
    } 
    else {
        x.style.display = "block";
    }
}
</script>
<div class="btn">
    <button name="clients"><img src="/stockosio/img/plus.svg" style="width: 15px !important;"><a href="/stockosio/php/addclients.php">clients</a></button>
    <button name="clients"><img src="/stockosio/img/update.svg" style="width: 15px !important;"><a href="/stockosio/php/update.php">update clients</a></button>
    <form action="/stockosio/php/client.php" method="POST"><button  name="reset" type="submit"><img src="/stockosio/img/reset.svg" style="width: 15px !important;">compteur</button></form>
</div>
<?php
    $sql = "SELECT * FROM clients";
    $sql2 = "SELECT * FROM machine";      
    $result2 = $conn->query($sql);
    if ($result2->num_rows==0){?>
        <div class="txt">
            <h1>No data yet</h1>
        </div><?php
    }
    else{?>
        <section class="content-header">
        <h1>CLIENT-info</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-body table-responsive">
                            <table id="" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Database<br>ID</th> 
                                        <th>Database<br>Date(Y-M-D)/<br>Time(h-m-s)</th>
                                        <th>client</th>
                                        <th>phone</th>
                                        <th>address</th>
                                        <th>Machine<br>Type<br>Ref.</th>  
                                        <th>COMPTER<br>Month<br><?php echo(date('(M/Y)'));?></th>
                                        <th>Total<br>Print-<br>Revenue(€)</th>        
                                    </tr>                             
                                </thead>
                            </table>
                        </diV>
                    </diV>
                </diV>
            </diV>
        </section>
        <?php $i=1;$st_id='';
        while($row = $result2->fetch_array()){
        ?>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-body table-responsive">
                                <table id="" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>                                                                              
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['date'];?><br>
                                                <?php echo $row['time'];?></td>
                                            <th><a href="/stockosio/php/clientinfo.php?id=<?php echo($row['id']);?>">
                                                <img src="/stockosio/img/<?php echo $row['image'];?>" id="table_logo"><?php echo $row['name'];?></a></th>
                                            <td><?php echo $row['phone'];?></td>
                                            <td><?php echo $row['address'];?></td>
                                            <td>mach :<?php echo $row['machine'];?><br>
                                                type :<?php echo $row['type'];?><br>
                                                ref :<?php echo $row['ref'];?></td> 
                                            <td>color :<?php echo $row['color'];?><br>
                                                N/B :<?php echo $row['nb'];?></td> 
                                            <td><?php echo $row['total'];?></td>                               
                                        </tr>                             
                                    </thead>
                                </table>
                            </diV>
                        </diV>
                    </diV> 
                </diV>
            </section>
        <?php
        $i++; //while loop
    }
    if(isset($_POST['reset']) || date('j', time())==1){
        $v=0;
        while($result2->fetch_array()){
            $rst="UPDATE clients SET color='$v', nb='$v'";
            $run_reset=mysqli_query($conn,$rst);
            echo $row['color'];?><br><?php
            echo $row['nb']; 
        }
    }
}
?> 
</body>
</html>