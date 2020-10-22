<?php

require 'connection.php';
require 'header.php'?>

<?php
require 'asider.php'
?>

<?php
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
    $confirm_password=isset($_POST['confirm_password'])
    ?$_POST['confirm_password']:'';
    $email=isset($_POST['email'])?$_POST['email']:'';
    $dob=isset($_POST['dob'])?$_POST['dob']:'';
    $address=isset($_POST['address'])?$_POST['address']:'';
   


    if ($name=="" || $password=="" || $confirm_password=="" || $email=="" || $address=="") {
        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
    }
    if ($password!=$confirm_password) {
        $error[]=array("id"=>'form',"msg"=>'Confirm Password does match');
    } 

    $sql61 = "SELECT * FROM users";
    $result61 = $conn->query($sql61);

    if ($result61->num_rows > 0) {
        while ($row61 = $result61->fetch_assoc()) {
            if ($row61['username']==$name) {
                $error[]=array("id"=>'form',"msg"=>'username already present please try with another username');    
            
            }    
        
        }
    } 

    $date=date("Y-m-d", strtotime($dob));
    if (count($error)==0) {

        $sql = "INSERT INTO users 
        (username, userpass, email, dob, address)
        VALUES ('".$name."', '".$password."', '".$email."', 
    '".$date."',  '".$address."')";



        if ($conn->query($sql) === true) {
            echo "<p style='margin-left:18%;color:green'><b>User details inserted successfully<b></p> <br>";
           

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
            <li><a href="#tab1" class="default-tab">
               Manage</a>
            </li>
            <!-- href must be unique and match the id of target div -->
            <li><a href="#tab2">Add</a></li>
         </ul>
         <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
      <div class="tab-content" id="tab2">
            <form action="#" method="post" enctype="multipart/form-data">
               <fieldset>
                  <!-- Set class to "column-left" or "column-right"
                     on fieldsets to divide the form into columns -->
                  <p>
                     <label>Username</label>
                     <input class="text-input small-input datepicker" type="text" id="medium-input"
                        name="username" /> 
                   </p>
                  <p>
                     <label>Password</label>
                     <input class="text-input small-input" type="password" id="small-input"
                        name="password"/>
                     <!-- Classes for input-notification: success, error, information, attention -->
                    </p>
                  
                  <p>
                     <label>Confirm Password</label>
                     <input class="text-input small-input" type="password" id="small-input"
                        name="confirm_password" />
                        <br /><small>Please Re-enter the same password as above</small>
                  
                  </p>

                  <p>
                     <label>Email</label>
                     <input class="text-input medium-input" type="text" id="small-input"
                        name="email" />
                  </p>
                  


                  <p>
                  <label>Date Of Birth</label>
                     <input class="text-input small-input" type="date" id="small-input"
                        name="dob" />
                 
                  </p>
                  
                 
                  <p>
                     <label>Address</label>
                     <input class="text-input large-input" type="text" id="small-input"
                        name="address" />
                  </p>
                 

                  <p>
                     <input class="button" type="submit" value="Submit" name="submit" />
                  </p>
               </fieldset>
               <div class="clear"></div>
               <!-- End .clear -->
            </form>
         </div>
         <!-- End #tab2 -->        
      
         <div class="tab-content default-tab" id="tab1">
            <!-- This is the target div. id must match the href of this div's tab -->
            <div class="notification attention png_bg">
               <a href="#" class="close">
               <img src="resources/images/icons/cross_grey_small.png" 
                  title="Close this notification" alt="close"/></a>
               <div>
                  This is a Content Box. You can put
                  whatever you want in it. By the way, 
                  you can close this notification with the top-right cross.
               </div>
            </div>
            <table>
               <thead>
                  <tr>
                     <th><input class="check-all" type="checkbox" /></th>
                     <th>User id</th>
                     
                     <th>Username</th>
                     <th>Password</th>
                     <th>Email</th>
                     <th>Date of Birth</th>
                     <th>Address</th>
                     
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <td colspan="6">
                        <div class="bulk-actions align-left">
                           <select name="dropdown">
                              <option value="option1">Choose an action...</option>
                              <option value="option2">Edit</option>
                              <option value="option3">Delete</option>
                           </select>
                           <a class="button" href="#">Apply to selected</a>
                        </div>
                        <div class="pagination">
                           <?php
                            if ($page>1) {
                                echo '<a href="addproduct.php?pageid='.($page-1).'" title="Previous Page">&laquo; Previous</a>';
                            }
                            ?>
                           <?php  
                            require 'connection.php';
                            $sql44 = "SELECT * FROM users";
                            $result44 = $conn->query($sql44);

                            if ($result44->num_rows > 0) {
                                $length=$result44->num_rows;
                                $pages=ceil($length/$limit);
                                for ($i=1;$i<=$pages;$i++) {
                                   
                                    if ($i==$page) {
                                        $active="active";
                                    } else {
                                        $active="";

                                    }
                                    echo '<a href="addproduct.php?pageid='.$i.'" class="number" title="1">'.$i.'</a>';

                                }
                           
                           
                            } else {
                                echo "0 results";
                            }
                            if ($pages > $page) {
                                echo ' <a href="addproduct.php?pageid='.($page+1).'" title="Next Page">Next &raquo;</a>  ';
                            } 
                            ?>     </div>
                        <!-- End .pagination -->
                        <div class="clear"></div>
                     </td>
                  </tr>
               </tfoot>
               <tbody>
                     <?php 
                           $sql32 = "SELECT * FROM users LIMIT {$offset},{$limit}";
                        $result32 = $conn->query($sql32);
                        
                        if ($result32->num_rows > 0) {
                            while ($row32 = $result32->fetch_assoc()) {
                                 echo '<tr>';
                                 echo '<td><input type="checkbox" /></td>';
                                
                                 echo'<td>'.$row32['id'].'</td>';
                                 echo '<td>'.$row32['username'].'</td>';
                                 echo '<td>'.$row32['userpass'].'</td>';
                                 echo '<td>'.$row32['email'].'</td>';
                                 echo '<td>'.$row32['dob'].'</td>';
                                 echo '<td>'.$row32['address'].'</td>';
                                 echo '<td>';
                                 echo '<a href="updateuser.php?upid='.$row32['id'].'" title="Edit">';
                                 echo '<img src="resources/images/icons/pencil.png" alt="Edit" /></a>';
                                 echo '<a href="deleteuser.php?delid='.$row32['id'].'" title="Delete">';
                                 echo '<img src="resources/images/icons/cross.png"
                                  alt="Delete" /></a>'; 
                                 echo '</td>';
                                 echo '</tr>';
                                    
                                
                                 

                            }
                        } else {
                        echo "0 results";
                        }
                                    ?>
                     
               </tbody>
            </table>
         </div>
         <!-- End #tab1 -->
        </div>
      <!-- End .content-box-content -->
   </div>
   <!-- End .content-box -->
</div>
           

<?php
require 'footer.php'
?>