<?php 
require "config.php";
include "header2.php";
$sql = "SELECT * From machine";
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
    <title>ADD-Machine</title>
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
            <h1><img src="/stockosio/img/printer.svg">ADD-Machine</h1>
            <div class="show">
                <?php echo htmlentities("Total: ".$count_mach);?>
            </div>
            <div class="content">
                <div class="input-field">
                    <label>Machine-name</label>
                    <input type="name" name="name" placeholder="2010AC" autocomplete="nope">
                </div>
                <div class="input-field">
                    <label>Machine-type</label>
                    <select name="type">
                        <option name="type">A3</option>
                        <option name="type">A4</option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Cartouche-type</label>
                    <select name="ink">
                        <option name="ink">C</option>
                        <option name="ink">NB</option>
                        <option name="ink">Kit</option>
                    </select>
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
    $name =$_POST['name'];
    $type =$_POST['type'];
    $ink =$_POST['ink'];
    if(empty($name) ||empty($type)|| empty($ink)){
        ?><script>swal.fire("Attention", "All feilds required", "warning")</script><?php
        mysqli_close($conn);
    } 
    else{
        $req =mysqli_query($conn, "SELECT * from machine");
        while($row=mysqli_fetch_array($req)){
            if($row["name"]==$name){
                #echo htmlentities($row["ref"]);
                $i++;
                break;
            }
        }
        if($i==0){
            $query ="insert into machine(date,time,name,type,ink) values('$date','$time','$name','$type','$ink')";
            $run = mysqli_query($conn,$query);
            ?><script>swal.fire("Perfect", "added", "success")</script><?php
        }else{
            ?><script>swal.fire("Attention", "Machine already registered", "warning")</script><?php
        }
    }
}
?>
</html>