
<div id="sidebar">
   <div id="sidebar-wrapper">
      <!-- Sidebar with logo and menu -->
      <h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
      <?php
		
      $filename=basename($_SERVER['REQUEST_URI']);
      $productmenu=array('addproduct.php',
      'managecategories.php','managetags.php');
       $usermenu=array('adduser.php','manageuser.php');
       $ordermenu=array('manageorder.php');

        ?>
      <!-- Logo (221px wide) -->
      <a href="#"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>
      <!-- Sidebar Profile links -->
      <div id="profile-links">
         Hello, <a href="#" title="Edit your profile">John Doe</a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
         <br />
         <a href="#" title="View the Site">View the Site</a> | <a href="#" title="Sign Out">Sign Out</a>
      </div>
      <ul id="main-nav">
         <!-- Accordion Menu -->
         <li>
            <a href="index.php" class="nav-top-item no-submenu <?php if ($filename=='index.php') : ?>current<?php endif;?>">
               <!-- Add the class "no-submenu" to menu items with no sub menu -->
               Dashboard
            </a>
         </li>
         <li>
<a href="#" class="nav-top-item <?php if (in_array($filename, $productmenu)) : ?>current<?php endif; ?>">
               <!-- Add the class "current" to current menu item -->
               Products
            </a>
            <ul>
<li><a <?php if ($filename=='addproduct.php') : ?>class="current"<?php endif;?> href="addproduct.php">Add/Manage Products</a></li>
               <!-- Add class "current" to sub menu items also -->
               <li><a <?php if ($filename=='managecategories.php') : ?>class="current"<?php endif;?> href="managecategories.php">Add/Manage Categories</a></li>
               <li><a <?php if ($filename=='managetags.php') : ?>class="current"<?php endif;?> href="managetags.php">Add/Manage Tags</a></li>
            </ul>
         </li>
         <li>
            <a href="#" class="nav-top-item <?php if (in_array($filename, $usermenu)) : ?>current<?php endif; ?>">
            Users
            </a>
            <ul>
               <li><a <?php if ($filename=='adduser.php') : ?>class="current"<?php endif;?> href="adduser.php">Add Users</a></li>
               <li><a <?php if ($filename=='manageuser.php') : ?>class="current"<?php endif;?> href="manageuser.php">Manage Userss</a></li>
            </ul>
         </li>
         <li>
            <a href="#" class="nav-top-item <?php if (in_array($filename, $ordermenu)) : ?>current<?php endif; ?>">
            Orders
            </a>
            <ul>
               <li><a <?php if ($filename=='manageorder.php') : ?>class="current"<?php endif;?> href="manageorder.php">Manage Orders</a></li>
            </ul>
         </li>
         <li>
            <a href="#" class="nav-top-item">
            Settings
            </a>
            <ul>
               <li><a href="#">General</a></li>
               <li><a href="#">Design</a></li>
               <li><a href="#">Your Profile</a></li>
            </ul>
         </li>
      </ul>
      <!-- End #main-nav -->
      <div id="messages" style="display: none">
         <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
         <h3>3 Messages</h3>
         <p>
            <strong>17th May 2009</strong> by Admin<br />
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
            <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
         </p>
         <p>
            <strong>2nd May 2009</strong> by Jane Doe<br />
            Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
            <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
         </p>
         <p>
            <strong>25th April 2009</strong> by Admin<br />
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
            <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
         </p>
         <form action="#" method="post">
            <h4>New Message</h4>
            <fieldset>
               <textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
            </fieldset>
            <fieldset>
               <select name="dropdown" class="small-input">
                  <option value="option1">Send to...</option>
                  <option value="option2">Everyone</option>
                  <option value="option3">Admin</option>
                  <option value="option4">Jane Doe</option>
               </select>
               <input class="button" type="submit" value="Send" />
            </fieldset>
         </form>
      </div>
      <!-- End #messages -->
   </div>
</div>
<!-- End #sidebar -->