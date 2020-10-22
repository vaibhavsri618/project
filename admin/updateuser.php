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
    $name=isset($_POST['username'])?$_POST['username']:'';

    $password=isset($_POST['password'])?$_POST['password']:'';
    $email=isset($_POST['email'])?$_POST['email']:'';
    $dob=isset($_POST['dob'])?$_POST['dob']:'';
    $address=isset($_POST['address'])?$_POST['address']:'';
    


    if ($name=="" || $password=="" || $email=="" || $address=="" ) {
        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
    }

    $date=date("Y-m-d", strtotime($dob));
    
    
    if (count($error)==0) {

        $sql = "UPDATE users SET
        username='".$name."', userpass='".$password."', email='".$email."',
         dob='".$date."', address='".$address."' WHERE id=".$upid."";



        if ($conn->query($sql) === true) {
            echo "<p style='margin-left:18%;color:green;font-size:30px'><b><a href='adduser.php'>User's Updated successfully , Click here to View Changes</a><b></p> <br>";
            

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
                $sql50 = "SELECT * FROM users where id=".$upid."";
                $result50 = $conn->query($sql50);

                if ($result50->num_rows > 0) {
                // output data of each row
                while($row50 = $result50->fetch_assoc()) {
                  
                ?>

               <fieldset>
                  <!-- Set class to "column-left" or "column-right"
                     on fieldsets to divide the form into columns -->
                  <p>
                     <label>Username</label>
                     <input class="text-input small-input datepicker" type="text" id="medium-input"
                        name="username" value="<?php echo $row50['username'] ?>" readonly /> 
                   </p>
                  <p>
                     <label>Password</label>
                     <input class="text-input small-input" type="text" id="small-input"
                        name="password" value="<?php echo $row50['userpass'] ?>" readonly/>
                     <!-- Classes for input-notification: success, error, information, attention -->
                     </p>
                  
                  <p>
                     <label>Email</label>
                     <input class="text-input medium-input" type="text" id="small-input"
                        name="email" value="<?php echo $row50['email'] ?>" />
                  </p>

                  
                  
                  <p>
                     <label>Date Of Birth</label>
                     <input class="text-input small-input" type="date" id="small-input"
                        name="dob" value="<?php echo $row50['dob'] ?>" />
                  </p>
                 

                  <p>
                     <label>Address</label>
                     <input class="text-input large-input" id="large-input" type="text"
                        name="address" value="<?php echo $row50['address'] ?>">
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