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
    $name=isset($_POST['name'])?$_POST['name']:'';

    $price=isset($_POST['price'])?$_POST['price']:'';
    $image=isset($_POST['image'])?$_POST['image']:'';
    $select=isset($_POST['dropdown'])?$_POST['dropdown']:'';
    $textfield=isset($_POST['textfield'])?$_POST['textfield']:'';
    $short=isset($_POST['short'])?$_POST['short']:'';
    $color=isset($_POST['color'])?$_POST['color']:'';
  


    if ($name=="" || $price=="" || $textfield=="" || $short=="" || !empty($_POST['image'])) {
        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
    }
    if ($select=="Select") {
        $error[]=array("id"=>'form','msg'=>"Please select Catelogy");
    }
    


   
    $arr=array();
            


    if (!empty($_POST['check_list'])) {
        foreach ($_POST['check_list'] as $selected) {
            //echo "<p>".$selected ."</p>";
            array_push($arr, $selected);
        }
        $jsonarr=json_encode($arr);
        //print_r($jsonarr);
        
    } else {
        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
    }

    $filename = $_FILES["image"]["name"]; 
    $tempname = $_FILES["image"]["tmp_name"];     
        $folder = "images/".$filename; 
    
    if (count($error)==0) {

        $sql = "UPDATE products SET
        name='".$name."', price='".$price."', image='".$filename."',
         short_description='".$short."', long_description='".$textfield."', category_id='".$select."' WHERE product_id=".$upid."";



        if ($conn->query($sql) === true) {
            echo "<p style='margin-left:18%;color:green;font-size:30px'><b><a href='addproduct.php'>Product Updated successfully , Click here to View Changes</a><b></p> <br>";
            if (move_uploaded_file($tempname, $folder)) { 
                 } else { 
                echo "Failed to upload image"; 
            } 
         

        } else {

        } 
    }   
    if (count($error)>0) {
        foreach ($error as $err) {
            echo "<script>alert('".$err['msg']."')</script>";

        }
    }

    if (count($error)==0) {   
       
         $sql5 = "UPDATE tags_products SET  tag_id='".$jsonarr."' WHERE product_id=".$upid."";

        if ($conn->query($sql5) === true) {
            echo " record Update successfully";
        } else {
            echo "Error: " . $sql5 . "<br>" . $conn->error;
        }
        $sql22 = "UPDATE colors SET color='".$color."', quantity='1' WHERE product_id=".$upid."";
    
        if ($conn->query($sql22) === true) {
            
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
                $sql50 = "SELECT * FROM products where product_id=".$upid."";
                $result50 = $conn->query($sql50);

                if ($result50->num_rows > 0) {
                // output data of each row
                while($row50 = $result50->fetch_assoc()) {
                  
                ?>

               <fieldset>
                  <!-- Set class to "column-left" or "column-right"
                     on fieldsets to divide the form into columns -->
                  <p>
                     <label>Name</label>
                     <input class="text-input medium-input datepicker" type="text" id="medium-input"
                        name="name" value="<?php echo $row50['name'] ?>" /> 
                   </p>
                  <p>
                     <label>Price</label>
                     <input class="text-input small-input" type="text" id="small-input"
                        name="price" value="<?php echo $row50['price'] ?>"/>
                     <!-- Classes for input-notification: success, error, information, attention -->
                     <br /><small>Price of the product</small>
                  </p>
                  
                  <p>
                     <label>Images</label>
                     <input class="text-input small-input" type="file" id="small-input"
                        name="image" value="<?php echo $row50['image'] ?>" />
                  </p>

                  <p>
                     <label>Color</label>
                     <input class="text-input small-input" type="color" id="small-input"
                        name="color" value="#ADD8E6" />
                  </p>
                  


                  <p>
                  <?php
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);
                    
                   ?>
                     <label>Category</label>              
                     <select name="dropdown" class="small-input">
                        <option value="select">Select</option>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                            }
                        } else {
                            echo "0 results";
                        }
                         
                        ?>

                        
                     </select>
                  </p>
                  
                  <p>
                     <label>Tags</label>

                     <?php
                        $sql1 = "SELECT * FROM tags";
                        $result1 = $conn->query($sql1);
                        
                        if ($result1->num_rows > 0) {
                            while ($row1 = $result1->fetch_assoc()) {
                                echo "<input type='checkbox' name='check_list[]' value='".$row1['id']."' />".$row1['name']."";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    
                  
                  </p>

                  <p>
                     <label>Short Description</label>
                     <input class="text-input small-input" type="text" id="small-input"
                        name="short" value="<?php echo $row50['short_description'] ?>" />
                  </p>
                 

                  <p>
                     <label>Description</label>
                     <textarea class="text-input textarea wysiwyg" id="textarea" 
                        name="textfield" value="<?php echo $row50['long_description'] ?>" cols="79" rows="15" ></textarea>
                  </p>
                  <p>
                     <input class="button" type="submit" value="Submit" name="submit" />
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