<?php require ("config.php");
include "header2.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livrasions</title>
    <link rel= "stylesheet" href="/stockosio/css/dash.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link href="/stockosio/img/s-fab.png" rel="icon" type="image/x-icon" />
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
</head>
<body>
</html>
<div class="btn">
    <button><img src="/stockosio/img/plus.svg" style="width: 20px !important;"><a href="/stockosio/php/livrasion.php">Livrasion</a></button>
</div>
<?php
    $sql = "SELECT id, date, time, name, machine, ref, type, quantity FROM livrasion ORDER BY date DESC";
    $result = $conn->query($sql);
    if ($result->num_rows==0){?>
        <div class="txt">
            <h1>No data yet</h1>
        </div><?php
    }
    else{?>
        <div class="content-header">
            <section>
                <h1>Livrasion</h1>
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
                                            <th>Client<br>ID</th> 
                                            <th>Date(Y-M-D) /<br>Time(h-m-s)</th>
                                            <th>Client-Nom</th>
                                            <th>Machine-name</th>
                                            <th>Type</th>
                                            <th>Ref.</th>
                                            <th>Quantity</th>          
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
        while($row = $result->fetch_array()){
            $st_name=$row['name'];
            $sql=mysqli_query($conn, "SELECT id,image from clients where name='$st_name'");
            $row2=mysqli_fetch_array($sql);
            ?>
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
                                                <td><?php echo $row2['id'];?></td>
                                                <td><?php echo $row['date'];?><br>
                                                    <?php echo $row['time'];?></td>
                                                <th><a href="/stockosio/php/clientinfo.php?id=<?php echo($row2['id']);?>">
                                                    <img src="/stockosio/img/<?php echo $row2['image'];?>" id="table_logo">
                                                    <?php echo $row['name'];?></a></th>
                                                <td><?php echo $row['machine'];?></td>
                                                <td><?php echo $row['type'];?></td>
                                                <td><?php echo $row['ref'];?></td>
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
</html>