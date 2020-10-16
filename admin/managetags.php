<?php

require 'connection.php';
require 'header.php'?>

<?php
require 'asider.php'
?>

<?php
$error=array();
if (isset($_POST['submit'])) {
    $tags=isset($_POST['tags'])?$_POST['tags']:'';
    if ($tags=="") {
        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
    
    }
    if (count($error)==0) {

        $sql = "INSERT INTO tags (name)
VALUES ('".$tags."')";

        if ($conn->query($sql) === true) {
            echo "<script> alert('New Tag added successfully')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    } else {
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
            <li><a href="#tab1" >
               Manage</a>
            </li>
            <!-- href must be unique and match the id of target div -->
            <li><a href="#tab2" class="default-tab">Add</a></li>
         </ul>
         <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
      <div class="tab-content default-tab" id="tab2">
            
      <form method="post" action="#">
<fieldset>
    <p>
    <label>Tag Name(TO BE ADDED)</label>
    <input type="text" name="tags" class="text-input small-input">
    </p>
    <p>
    <input class="button" type="submit" value="Submit" name="submit" />
    </p>
               
</fieldset>
              
</form>
</div>
         <!-- End #tab2 -->        
      
         <div class="tab-content" id="tab1">
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
                     <th>Column 1</th>
                     <th>Column 2</th>
                     <th>Column 3</th>
                     <th>Column 4</th>
                     <th>Column 5</th>
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
                           <a href="#" title="First Page">&laquo; 
First</a><a href="#" title="Previous Page">&laquo; Previous</a>
                           <a href="#" class="number" title="1">1</a>
                           <a href="#" class="number" title="2">2</a>
                           <a href="#" class="number current" title="3">3</a>
                           <a href="#" class="number" title="4">4</a>
                           <a href="#" title="Next Page">
Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
                        </div>
                        <!-- End .pagination -->
                        <div class="clear"></div>
                     </td>
                  </tr>
               </tfoot>
               <tbody>
                  <tr>
                     <td><input type="checkbox" /></td>
                     <td>Lorem ipsum dolor</td>
                     <td><a href="#" title="title">Sit amet</a></td>
                     <td>Consectetur adipiscing</td>
                     <td>Donec tortor diam</td>
                     <td>
                        <!-- Icons -->
                        <a href="#" title="Edit">
                        <img src="resources/images/icons/pencil.png"
                        alt="Edit" /></a>
                        <a href="#" title="Delete">
                        <img src="resources/images/icons/cross.png"
                         alt="Delete" /></a> 
                        <a href="#" title="Edit Meta">
                        <img src="resources/images/icons/hammer_screwdriver.png" 
                        alt="Edit Meta" /></a>
                     </td>
                  </tr>
                  <tr>
                     <td><input type="checkbox" /></td>
                     <td>Lorem ipsum dolor</td>
                     <td><a href="#" title="title">Sit amet</a></td>
                     <td>Consectetur adipiscing</td>
                     <td>Donec tortor diam</td>
                     <td>
                        <!-- Icons -->
                        <a href="#" title="Edit">
<img src="resources/images/icons/pencil.png" 
alt="Edit" /></a>
                        <a href="#" title="Delete">
                        <img src="resources/images/icons/cross.png" alt="Delete" /></a> 
                        <a href="#" title="Edit Meta">
                        <img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
                     </td>
                  </tr>
                  <tr>
                     <td><input type="checkbox" /></td>
                     <td>Lorem ipsum dolor</td>
                     <td><a href="#" title="title">Sit amet</a></td>
                     <td>Consectetur adipiscing</td>
                     <td>Donec tortor diam</td>
                     <td>
                        <!-- Icons -->
                        <a href="#" title="Edit">
                        <img src="resources/images/icons/pencil.png" alt="Edit" /></a>
                        <a href="#" title="Delete">
                        <img src="resources/images/icons/cross.png" alt="Delete" /></a> 
                        <a href="#" title="Edit Meta">
                        <img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
                     </td>
                  </tr>
                  <tr>
                     <td><input type="checkbox" /></td>
                     <td>Lorem ipsum dolor</td>
                     <td><a href="#" title="title">Sit amet</a></td>
                     <td>Consectetur adipiscing</td>
                     <td>Donec tortor diam</td>
                     <td>
                        <!-- Icons -->
                        <a href="#" title="Edit">
                        <img src="resources/images/icons/pencil.png" alt="Edit" /></a>
                        <a href="#" title="Delete">
                        <img src="resources/images/icons/cross.png" alt="Delete" /></a> 
                        <a href="#" title="Edit Meta">
                        <img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
                     </td>
                  </tr>
                  <tr>
                     <td><input type="checkbox" /></td>
                     <td>Lorem ipsum dolor</td>
                     <td><a href="#" title="title">Sit amet</a></td>
                     <td>Consectetur adipiscing</td>
                     <td>Donec tortor diam</td>
                     <td>
                        <!-- Icons -->
                        <a href="#" title="Edit">
                        <img src="resources/images/icons/pencil.png" alt="Edit" /></a>
                        <a href="#" title="Delete">
                        <img src="resources/images/icons/cross.png" alt="Delete" /></a> 
                        <a href="#" title="Edit Meta">
                        <img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
                     </td>
                  </tr>
                  <tr>
                     <td><input type="checkbox" /></td>
                     <td>Lorem ipsum dolor</td>
                     <td><a href="#" title="title">Sit amet</a></td>
                     <td>Consectetur adipiscing</td>
                     <td>Donec tortor diam</td>
                     <td>
                        <!-- Icons -->
                        <a href="#" title="Edit">
                        <img src="resources/images/icons/pencil.png" alt="Edit" /></a>
                        <a href="#" title="Delete">
                        <img src="resources/images/icons/cross.png" alt="Delete" /></a> 
                        <a href="#" title="Edit Meta">
                        <img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
                     </td>
                  </tr>
                  <tr>
                     <td><input type="checkbox" /></td>
                     <td>Lorem ipsum dolor</td>
                     <td><a href="#" title="title">Sit amet</a></td>
                     <td>Consectetur adipiscing</td>
                     <td>Donec tortor diam</td>
                     <td>
                        <!-- Icons -->
                        <a href="#" title="Edit">
                        <img src="resources/images/icons/pencil.png" alt="Edit" /></a>
                        <a href="#" title="Delete">
                        <img src="resources/images/icons/cross.png" alt="Delete" /></a> 
                        <a href="#" title="Edit Meta">
                        <img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
                     </td>
                  </tr>
                  <tr>
                     <td><input type="checkbox" /></td>
                     <td>Lorem ipsum dolor</td>
                     <td><a href="#" title="title">Sit amet</a></td>
                     <td>Consectetur adipiscing</td>
                     <td>Donec tortor diam</td>
                     <td>
                        <!-- Icons -->
                        <a href="#" title="Edit">
                        <img src="resources/images/icons/pencil.png" alt="Edit" /></a>
                        <a href="#" title="Delete">
                        <img src="resources/images/icons/cross.png" alt="Delete" /></a> 
                        <a href="#" title="Edit Meta">
                        <img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
                     </td>
                  </tr>
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