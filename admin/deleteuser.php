<?php

require 'connection.php';
if (isset($_GET['delid'])) {
    $delid=$_GET['delid'];

}




$sql = "DELETE FROM users WHERE id=".$delid."";

if ($conn->query($sql) === true) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

header("Location:adduser.php");
?>
