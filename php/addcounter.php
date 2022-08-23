<?php 
require "config.php";
include "header2.php";
$sql = "SELECT * From clients";
$counter =mysqli_query($conn,$sql);
$result1 =mysqli_query($conn,$sql);
$result2 =mysqli_query($conn,$sql);
$counter_mach=0;
while($row=mysqli_fetch_array($counter)){
    $counter_mach=$counter_mach+$row["color"]+$row["nb"];
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta name = "viewport" content = "with=device-width, initial scale = 1.0">
    <title>ADD-Compter</title>
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
            <h1><img src="/stockosio/img/counter.svg">ADD-Compter</h1>
            <div class="show">
                <?php echo htmlentities(date('M,Y'));?><br>
                <?php echo htmlentities("Total-Compter: ".$counter_mach);?>
            </div>
            <div class="content">
                <div class="input-field">
                    <label>Client-Name</label>
                    <select name="name">
                        <?php while($row = $result1->fetch_array()){?>
                        <option name="name"><?php echo $row['name'];}?></option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Machine-ref</label>
                    <select name="ref">
                        <?php while($row = $result2->fetch_array()){?>
                        <option name="ref"><?php echo $row['ref'];}?></option>
                    </select>
                </div>
                <div class="input-field">   
                    <label>PAGE: Color</label>
                    <input type="number" name="color" placeholder="4565" autocomplete="nope">
                </div>
                <div class="input-field">
                    <label>PAGE: N/B</label>
                    <input type="number" name="nb" placeholder="8540" autocomplete="nope">
                </div>
            </div>
            <div class="action">
                <button type = "submit" name="submit">Update</button>
            </div>
        </form>
    </div>
    <!-- partial -->
    <script  src="./script.js"></script>                                                                                                     
</body>

<?php
$i=0;
if(isset($_POST['submit'])){
    $name =$_POST['name'];
    $ref=$_POST['ref'];
    $color =$_POST['color'];
    $NB =$_POST['nb'];
    if(empty($name) || empty($NB)){
        ?><script>swal.fire("Attention", "Name or N/B cannot be empty !", "warning")</script><?php
        mysqli_close($conn);
    }
    else{
        $req =mysqli_query($conn, "SELECT * from clients");
        while($row=mysqli_fetch_array($req)){
            if($name==$row['name'] and $ref==$row['ref']){
                echo htmlentities($name);
                $update= "UPDATE clients SET color='$color', nb='$NB' WHERE name='$name'";
                $run_upate = mysqli_query($conn,$update);
                ?><script>swal.fire("Perfect", "updated", "success")</script><?php
                $i++;
                break;
            }
        }
        if($i==0){
            ?><script>swal.fire("Error", "reference didn't match", "error")</script><?php
        }
    }
}
?>
</html>