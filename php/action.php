<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
<?php
  require_once 'config.php';

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $query = "SELECT * FROM clients WHERE name LIKE '%$inpText%'";
    $query2 = "SELECT * FROM clients WHERE machine LIKE '%$inpText%'";
    $result = $conn->query($query);
    $result2 = $conn->query($query2);
    if ($result->num_rows>0) {
      while ($row=$result->fetch_assoc()) {?>
        <table class="table table-striped">
          <thead>
            <tr>                                                                            
              <th scope="col">
                <a href="/stockosio/php/clientinfo.php?id=<?php echo($row['id']);?>">
                  <img src="/stockosio/img/<?php echo $row['image'];?>" style="width:25px !important;"/>
                  <?php echo $row['name'];?>
                </a>
              </th>
            </tr>
          </thead>
        </table>
        <?php
      }
    }
    elseif ($result2->num_rows>0) {
      while ($row2=$result2->fetch_assoc()) {?>
        <table class="table table-striped">
          <thead>
            <tr>                                                                            
              <th scope="col">
                <a href="/stockosio/php/clientinfo.php?id=<?php echo($row2['id']);?>">
                  <img src="/stockosio/img/<?php echo $row2['image'];?>" style="width:25px !important;"/>
                  <?php echo $row2['machine'];?><br><?php echo $row2['name']?>
                </a>
              </th>
            </tr>
          </thead>
        </table>
        <?php
      }
    }
    else{
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>
<style>
  table.table.table-striped{
    margin: 3px !important;
    border-radius: 8px;
    background: beige;
  }
</style>