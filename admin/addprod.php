<?php

require 'connection.php';
$error=array();
if (isset($_POST['submit'])) {
    $name=isset($_POST['name'])?$_POST['name']:'';

    $price=isset($_POST['price'])?$_POST['price']:'';
    $image=isset($_POST['image'])?$_POST['image']:'';
    $select=isset($_POST['dropdown'])?$_POST['dropdown']:'';
    $textfield=isset($_POST['textfield'])?$_POST['textfield']:'';
    $short=isset($_POST['short'])?$_POST['short']:'';
    



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

        $sql = "INSERT INTO products 
        (name, price, image, short_description, long_description, category_id)
        VALUES ('".$name."', '".$price."', '".$filename."', 
    '".$short."',  '".$textfield."', '".$select."')";



        if ($conn->query($sql) === true) {
            echo "New record created successfully <br>";
            if (move_uploaded_file($tempname, $folder)) { 
                echo "Image uploaded successfully"; 
            } else { 
                echo "Failed to upload image"; 
            } 
         

        } else {

        }
      
    }   
    if (count($error)>0) {
        foreach ($error as $err) {
            $display=$err['msg'];

        }
            header("Location:addproduct.php?id1=$display");
    }

        
    $sql3 = "SELECT product_id FROM products WHERE name='".$name."'";
    $result3 = $conn->query($sql3);

    if ($result3->num_rows > 0) {
        while ($row2 = $result3->fetch_assoc()) {
            $pid=$row2['product_id'];
        }
    } else {
        echo "0 results";
    }

    $sql5 = "INSERT INTO tags_products (product_id, tag_id)
VALUES ('".$pid."', '".$jsonarr."')";

    if ($conn->query($sql5) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql5 . "<br>" . $conn->error;
    }

      
    $sql22 = "INSERT INTO colors (product_id, color, quantity)
    VALUES ('".$pid."', '".$color."', '1')";
    
    if ($conn->query($sql22) === true) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    



    $conn->close();



    header("Location:index.php");    



    
}







?>