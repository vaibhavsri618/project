<?php

require 'admin/connection.php';
if(isset($_GET['cartid'])) {
    $cartid=$_GET['cartid'];
}

session_start();
if (isset($_SESSION['cart1'])) {
    $cart1=$_SESSION['cart1'];
} else { 
    $cart1=array();
}



$sql = "SELECT * FROM products WHERE product_id='".$cartid."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
    while ($row = $result->fetch_assoc()) {

        $name=$row['name'];
        $img=$row['image'];
        $price=$row['price'];
        $sd=$row['short_description'];
        $ld=$row['long_description'];
        $cid=$row['category_id'];
        $quantity=1;
       
       
        $cartarray=array(
            "name"=>$name,
            "image"=>$img,
            "price"=>$price,
            "short_description"=>$sd,
            "long_description"=>$ld,
            "category_id"=>$cid,
            "quantity"=>$quantity,
            

            );
           
            $_SESSION['cart1']=$cartarray;
            
        array_push($cart1, $_SESSION['cart1']);

       

        for ($j=0;$j<=count($cart1)-2;$j++) {
            if ($cart1[$j]["name"]==$cartarray["name"] && $cart1[$j]["price"]==$cartarray["price"]) {
                $cart1[$j]["quantity"]=$cart1[$j]["quantity"]+1;
                array_pop($cart1);
            }
        }
        

     

    }

    
    


    
    //header("Location: productsql.php");
    


} else {
    echo "0 results";
}

$conn->close();


$_SESSION['cart1']=$cart1;
header("Location: product.php");
    


    

    
?>
