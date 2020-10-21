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
           </ul>
         <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">

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
          <th>Order id</th>
          
          <th>Cart Data</th>
          <th>Total</th>
          <th>Status</th>
          <th>date</th>
          
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
                 $sql44 = "SELECT * FROM orders";
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
                $sql32 = "SELECT * FROM orders LIMIT {$offset},{$limit}";
             $result32 = $conn->query($sql32);
             
             if ($result32->num_rows > 0) {
                 while ($row32 = $result32->fetch_assoc()) {
                    echo '<tr>';
                   echo '<td><input type="checkbox" /></td>';
               
                      echo'<td>'.$row32['id'].'</td>';
                      echo '<td>'.$row32['cartdata'].'</td>';
                      echo '<td>'.$row32['total'].'</td>';
                      echo '<td>'.$row32['status'].'</td>';
                      echo '<td>'.$row32['datetime'].'</td>';
                      echo '<td>';
                      echo '<a href="#updateproduct.php?upid='.$row32['id'].'" title="Edit">';
                      echo '<img src="resources/images/icons/pencil.png" alt="Edit" /></a>';
                      echo '<a href="#" title="Delete">';
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