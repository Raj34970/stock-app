<?php 
date_default_timezone_set('Europe/Paris');
require "config.php";
include "header2.php";
$sql = "SELECT * From clients";
$sql2 = "SELECT * From cartouche";
$sql3 = "SELECT * From tonerbag";
$sql4 = "SELECT * From imageunit";
$sql5 = "SELECT * From machine";
$liv =mysqli_query($conn,$sql);
$result1 = $conn->query($sql);
$result2 = $conn->query($sql5);
$result3 = $conn->query($sql);
$result4 = $conn->query($sql3);
$result5 = $conn->query($sql4);
$result6 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta name = "viewport" content = "with=device-width, initial scale = 1.0">
    <title>Livrasion</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            <div class="content"><img src="/stockosio/img/s-fab.png"></div>
            <h1><img src="/stockosio/img/cart.svg">Livrasion</h1>
            <div class="container">
                <div class="input-field">
                    <label>Client-Name</label>
                    <select name="name" id="name" onchange="myFunction()">
                        <?php while($row = $result1->fetch_array()){?>
                        <option name="name" id="name"><?php echo $row['name'];}?></option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Material</label>
                    <select name="type" id="material">
                        <option name="type">cartouche</option>
                        <option name="type">toner-bag</option>
                        <option name="type">image-unit</option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Machine-name</label>
                    <select name="machine">
                        <?php while($row = $result2->fetch_array()){?>
                        <option name="machine"><?php echo $row['name'];}?></option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Reference-Material</label>
                    <select name="ref">
                        <?php while($row = $result3->fetch_array()){?>
                        <option name="ref"><?php echo $row['ref'];}?></option>
                        <?php while($row = $result4->fetch_array()){?>
                        <option name="ref"><?php echo $row['ref'];}?></option>
                        <?php while($row = $result5->fetch_array()){?>
                        <option name="ref"><?php echo $row['ref'];}?></option>
                        <?php while($row = $result6->fetch_array()){?>
                        <option name="ref"><?php echo $row['ref'];}?></option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Quantity</label>
                    <input type="number" name="quantity" id="quantity" placeholder="2" autocomplete="nope">
                </div>
            </div>
            <div class="action">
                <button type = "submit" name="submit" id="action">Update</button>
            </div>
        </form>
    </div>
    <!-- partial -->
    <script  src="./script.js"></script>                                                                                                     
</body>
<!-- php to js API -->
<?php 

$test=
'<script>
    function myFunction() {
        var x = document.getElementById("name").value;
        document.writeln(x);
    }
</script>';

$i=0; $d=0; $x=0; $y=0; $z=0;
if(isset($_POST['submit'])){
    $date = date("Y/m/d");
    $time = date("H:i:s");
    $name =$_POST['name'];
    $machine =$_POST['machine'];
    $type =$_POST['type'];
    $ref =$_POST['ref'];
    $num =$_POST['quantity'];
    if(empty($name) ||empty($type)|| empty($ref)|| empty($num)|| empty($machine)){
        ?><script>swal.fire("Attention", "All feilds required", "warning")</script><?php
        mysqli_close($conn);
    }
    else{
        #echo ($name);?><br><?php
        #echo ($machine);?><br><?php
        #echo ($type);?><br><?php
        #echo $ref;?><br><?php
        #echo $num;
        if($num>0){
            $hist_car =mysqli_query($conn, "SELECT * from cartouche");
            $hist_ton =mysqli_query($conn, "SELECT * from tonerbag");
            $hist_img =mysqli_query($conn, "SELECT * from imageunit");
            $query =mysqli_query($conn, "SELECT * from livrasion");
            while($row=mysqli_fetch_array($query)){
                while($qty=mysqli_fetch_array($hist_car)){
                    if($ref==$qty["ref"]){
                        $st_id=$qty["id"];
                        $st_ref=$qty["ref"];
                        $get_quantity=$qty["quantity"];
                        $i++;
                        $x++;
                        #echo ($st_ref);
                        #echo ($st_id);
                        #echo ($get_quantity);
                        #echo $i;
                        break;
                    }
                }
                while($qty=mysqli_fetch_array($hist_ton)){
                    if($ref==$qty["ref"]){
                        $st_id=$qty["id"];
                        $st_ref=$qty["ref"];
                        $get_quantity=$qty["quantity"];
                        $i++;
                        $y++;
                        #echo ($st_ref);
                        #echo ($st_id);
                        #echo ($get_quantity);
                        #echo $i;
                        break;
                    }
                }
                while($qty=mysqli_fetch_array($hist_img)){
                    if($ref==$qty["ref"]){
                        $st_id=$qty["id"];
                        $st_ref=$qty["ref"];
                        $get_quantity=$qty["quantity"];
                        $i++;
                        $z++;
                        #echo ($st_ref);
                        #echo ($st_id);
                        #echo ($get_quantity);
                        #echo $i;
                        break;
                    }
                }
            }
            if($i!=0){
                $t=$get_quantity-$num;
                if($t>=0){
                    $insert ="insert into livrasion(name,machine,type,ref,quantity,date,time) values('$name','$machine','$type','$ref','$num','$date','$time')";
                    $run = mysqli_query($conn,$insert);
                    if($x!=0){$update_tb= "UPDATE cartouche SET quantity='$t' WHERE id=$st_id";}
                    elseif($y!=0){$update_tb= "UPDATE tonerbag SET quantity='$t' WHERE id=$st_id";}
                    elseif($z!=0){$update_tb= "UPDATE imageunit SET quantity='$t' WHERE id=$st_id";}
                    $run_upate = mysqli_query($conn,$update_tb);
                    ?><script>swal.fire("Perfect", "added", "success")</script><?php
                }
                else{
                    ?><script>swal.fire("Attention", "Demand is more than stock", "warning")</script><?php
                }
            }
            else{
                ?><script>swal.fire("Error", "No ref matched", "error")</script><?php
            }
        }
    }
}
?>

</html>