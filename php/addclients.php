<?php 
require "config.php";
include "header2.php";
$sql = "SELECT * From machine";
$sql2 = "SELECT * From clients";
$result =mysqli_query($conn,$sql);
$cl =mysqli_query($conn,$sql2);
$c=0;
while($row=mysqli_fetch_array($cl)){
    $c++;
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta name = "viewport" content = "with=device-width, initial scale = 1.0">
    <title>ADD-Clients</title>
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
    }.
    </script>
</meta>
</head>
<body>
    <!-- partial:index.partial.html -->
    <script>
        file.onchange = evt => {
        const [file] = file.files
        if (file) {
            blah.src = URL.createObjectURL(file)
            }
        }
    </script>
    <div class="login-form">
        <form action="" method= "POST">
            <div class="container"><img src="/stockosio/img/s-fab.png"></div>
            <h1>ADD-Clients</h1>
            <div class="show">
                <?php echo htmlentities("Total-Clients: ".$c);?>
            </div>
            <div class="content">
                <div class="input-field">
                    <img id="output"/>
                    <input accept="image/*" type='file' id="file" onchange="loadFile(event);"/>
                    <script>
                    var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                        }
                    };
                    </script>
                </div>
                <div class="input-field">
                    <label>Client</label>
                    <input type="name" name="name" placeholder="METROPOLE" autocomplete="nope" >
                </div>
                <div class="input-field">
                    <label>Number</label>
                    <input type="phone" name="phone" placeholder="0764215478" autocomplete="nope" >
                </div>
                <div class="input-field">
                    <label>Address</label>
                    <input type="address" name="address" placeholder="123 abc, rue Mtp France" autocomplete="nope" >
                </div>
                <div class="input-field">
                    <label>Machine-name</label>
                    <select name="machine" type="machine">
                        <?php while($row = $result->fetch_array()){?>
                        <option name="machine" type="machine"><?php echo $row['name'];}?></option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Machine-Type</label>
                    <select name="type">
                        <option type="type">A4</option>
                        <option type="type">A3</option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Machine-ref</label>
                    <input type="name" name="ref" placeholder="045BHT67LMKZ" autocomplete="nope">
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
    $image =$_POST['image'];
    $name =$_POST['name'];
    $phone =$_POST['phone'];
    $address =$_POST['address'];
    $machine =$_POST['machine'];
    $type =$_POST['type'];
    $ref =$_POST['ref'];
    if(empty($image)|| empty($name) ||empty($phone)|| empty($address)|| empty($machine)|| empty($type)||empty($ref)){
        ?><script>Swal.fire("Attention", "All feilds required", "warning")</script><?php
        mysqli_close($conn);
    }
    else{
        $sql =mysqli_query($conn, "SELECT ref from clients");
        while($row=mysqli_fetch_array($sql)){
            if($row["ref"]==$ref){
                #echo htmlentities($row["ref"]);
                $i++;
            }
        }
        if($i==0){
            $query ="insert into clients(date,time,image,name,phone,address,machine,type,ref) values('$date','$time','$name','$image','$phone','$address','$machine','$type','$ref')";
            $run = mysqli_query($conn,$query);
            ?><script>swal.fire("Perfect", "Client added", "success")</script><?php
        }else{
            ?><script>swal.fire("Desole", "Machine-reference already Exits", "warning")</script><?php
        }
    }
    mysqli_close($conn);
}
?>
</html>