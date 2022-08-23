<?php 
    require ("config.php");
    $json_array = array();
    //$sql = "SELECT * FROM cartouche ORDER BY date,time DESC";
    //$sql = "SELECT * FROM clients";
    $sql = "SELECT * FROM livrasion";
    $result = $conn->query($sql);
    if ($result->num_rows==0){?>
        <div class="txt">
            <h1>No data yet</h1>
        </div><?php
    }
    else{?>
        <?php $i=1;
        while($row = $result->fetch_array()){
            $json_array[]= $row;
            $i++; //while loop
        }
        json_encode($json_array);
        echo $i;                                                                            
        echo json_encode($json_array);
        file_put_contents('livrasion.json', json_encode($json_array));
    }    
?>