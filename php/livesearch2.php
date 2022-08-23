<?php require "config.php";?>

<?php
if(isset($input)){
    $sql = "SELECT * FROM cartouche WHERE name LIKE '%{$input}%'";
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
                                            <th>Date-Liv.<br>(Y-M-D)</th>
                                            <th>Time<br>(h-m-s)</th>
                                            <th>Machine-name</th>
                                            <th>Ref.</th>
                                            <th>Color</th>
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
                                                <th><?php echo $row['id'];?></th>
                                                <th><?php echo $row['date'];?></th>
                                                <th><?php echo $row['time'];?></th>
                                                <th><?php echo $row['name'];?></th>
                                                <th><?php echo $row['ref'];?></th>
                                                <th><?php echo $row['color'];?></th>
                                                <th><?php echo $row['quantity'];?></th>                                       
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
}
else{
    echo htmlentities($input);
}?>
</body>