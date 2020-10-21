<?php

if (isset($_POST['proid'])) {
$pid=$_POST['proid'];  
    
    



    $sql6 = "SELECT * FROM products WHERE product_id=".$pid."";
    $result6 = $conn->query($sql6);
    
    if ($result6->num_rows > 0) {
      // output data of each row
      while($row6 = $result6->fetch_assoc()) {

        echo '<a class="simpleLens-lens-image" data-lens-image="admin/images/'.$row6['image'].'">';
        echo '<img src="admin/images/'.$row6['image'].'" class="simpleLens-big-image">';
    echo '</a>';
    
  }
} else {
          echo "0 results";
  }
?>

       
 