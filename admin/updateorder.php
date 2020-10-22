<?php

require 'connection.php';
require 'header.php'?>

<?php
require 'asider.php'
?>

<?php
if (isset($_GET['upid'])) {
    $upid=$_GET['upid'];
    echo $upid;
}

$limit=10;
if (isset($_GET['pageid'])) {
    $page=$_GET['pageid'];  
} else {
    $page=1;
}
$offset=($page-1)*$limit;

?>




<?php

$error=array();
if (isset($_POST['submit'])) {
    $total=isset($_POST['total'])?$_POST['total']:'';

    $status=isset($_POST['status'])?$_POST['status']:'';
    


    if ($total=="" || $status=="") {
        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
    }

    
    
    if (count($error)==0) {

        $sql = "UPDATE orders SET
        total='".$total."', status='".$status."' WHERE id=".$upid."";



        if ($conn->query($sql) === true) {
            echo "<p style='margin-left:18%;color:green;font-size:30px'><b><a href='manageorder.php'>User's Updated successfully , Click here to View Changes</a><b></p> <br>";
            

        } else {

        } 
    }   
    if (count($error)>0) {
        foreach ($error as $err) {
            echo "<script>alert('".$err['msg']."')</script>";

        }
    }

            




    


} 

   
    







?>






<div id="main-content">

<h2>Welcome John</h2>
   <p id="page-intro">What would you like to do?</p>
   <div class="clear"></div>
   <!-- End .clear -->
   <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
         <h3>Content box</h3>
         <ul class="content-box-tabs">
            <!-- href must be unique and match the id of target div -->
            <li><a href="#tab2" class="default-tab">Add</a></li>
         </ul>
         <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
      <div class="tab-content default-tab" id="tab2">
            <form action="#" method="post" enctype="multipart/form-data">
                <?php
                $sql50 = "SELECT * FROM orders where id=".$upid."";
                $result50 = $conn->query($sql50);

                if ($result50->num_rows > 0) {
                // output data of each row
                while($row50 = $result50->fetch_assoc()) {
                  
                ?>

               <fieldset>
                  <!-- Set class to "column-left" or "column-right"
                     on fieldsets to divide the form into columns -->
                     <p>
                     <label>ID</label>
                     <input class="text-input small-input" type="text" id="small-input"
                        name="id" value="<?php echo $row50['id'] ?>" readonly/>
                     <!-- Classes for input-notification: success, error, information, attention -->
                     </p>
                  
                  
                  
                  <p>
                     <label>Total</label>
                     <input class="text-input medium-input" type="text" id="small-input"
                        name="total" value="<?php echo $row50['total'] ?>" />
                  </p>

                  
                  
                  <p>
                     <label>status</label>
                     <input class="text-input small-input" type="text" id="small-input"
                        name="status" value="<?php echo $row50['status'] ?>" />
                  </p>
                 

                  <p>
                     <input class="button" type="submit" value="Update" name="submit" />
                  </p>
               </fieldset>
               <?php
                 }
                } else {
                echo "0 results";
                }
               ?>
               <div class="clear"></div>
               <!-- End .clear -->
            </form>
         </div>
         <!-- End #tab2 -->        
      
        </div>
      <!-- End .content-box-content -->
   </div>
   <!-- End .content-box -->
</div>
           

<?php
require 'footer.php'
?>7