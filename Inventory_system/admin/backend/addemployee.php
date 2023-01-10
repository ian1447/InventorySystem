<?php
include "../../dbcon.php";
$sql = "INSERT INTO `employees` (employee_id,`name`,college,`address`,position)
VALUES ('".$_POST['id']."','".$_POST['name']."','".$_POST['college']."','".$_POST['address']."','".$_POST['position']."')";
if ($conn->query($sql) === TRUE)
{
    echo '<script>alert("Employees Addedd Successfully!") 
    window.location.href="../employees.php"</script>';
}
else{
    echo '<script>alert("Adding Employee Failed!\n Please Check SQL Connection String!") 
    window.location.href="../employees.php"</script>';
}
?>