<?php 
require "config.php";
include "header2.php";
$sql = "SELECT * From intervension";
$mach =mysqli_query($conn,$sql);
$count_mach=0;
while($row=mysqli_fetch_array($mach)){
    $count_mach++;
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta name = "viewport" content = "with=device-width, initial scale = 1.0">
    <title>ADD-Intervension</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;400&display=swap" rel="stylesheet">           
    <link rel= "stylesheet" href="/stockosio/css/style_adminpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link href="/stockosio/img/s-fab.png" rel="icon" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
</meta>
</head>
<body>
    <!-- partial:index.partial.html -->
    <div class="login-form">
        <form action="" method= "POST">
            <div class="container"><img src="/stockosio/img/s-fab.png"></div>
            <h1><img src="/stockosio/img/gear.svg">ADD-Intervension</h1>
            <div class="show">
                <?php echo htmlentities("Total: ".$count_mach);?>
            </div>
            <div class="content">
                <div class="input-field">
                    <label>Client-Name</label>
                    <select name="client" id="name" >
                        <?php $sql3 = "SELECT * from clients";
                        $cl = mysqli_query($conn,$sql3);
                        while($row=mysqli_fetch_array($cl)){?>
                        <option name="name"><?php echo $row['name'];}?></option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Machine-Name</label>
                    <select name="machine" id="machine">
                        <?php $sql2 = "SELECT * from clients";
                        $result = mysqli_query($conn,$sql2);
                        while($row2=mysqli_fetch_array($result)){?>
                        <option name="name"><?php echo $row2['machine'];}?></option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Depanage</label>
                    <input type="text" name="depanage" placeholder="305CS" autocomplete="nope">
                </div>
                <div class="input-field">
                    <label>Color</label>
                    <input type="number" name="colorD" placeholder="14265" autocomplete="nope">
                </div>
                <div class="input-field">
                    <label>N/B</label>
                    <input type="number" name="nbD" placeholder="22257" autocomplete="nope">
                </div>
                <div class="input-field">
                    <label>Description</label>
                    <input type="text" name="description" placeholder="Description" autocomplete="nope">
                </div>
            </div>
            <div class="action">
                <button type = "submit" name="submit">Upload</button>
            </div>
        </form>
    </div>
    <!-- partial -->
    <script  src="./script.js"></script>                                                                                                     
</body>

<?php
$i=0;
if(isset($_POST['submit'])){
    $date = date('Y/m/d');
    $time = date("H:i:s");
    $client =$_POST['client'];
    $machine =$_POST['machine'];
    $depanage =$_POST['depanage'];
    $nbD =$_POST['nbD'];
    $colorD =$_POST['colorD'];
    $description =$_POST['description'];
    if(empty($client) ||empty($machine)|| empty($description)){
        ?><script>swal.fire("Attention", "All feilds required", "warning")</script><?php
        mysqli_close($conn);
    } 
    else{
        $query ="insert into intervension(date,time,client,machine,depanage,nbD,colorD,description) values('$date','$time','$client','$machine','$depanage','$nbD','$colorD','$description')";
        $run = mysqli_query($conn,$query);
        ?><script>swal.fire("Good Job", "Intervension updated", "success")</script><?php
    }
}
?>
</html>