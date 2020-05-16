<?php
    include_once 'database.php';
    $sql = " DELETE FROM employees WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($conn, $sql))
    {
        $delete = "Record deleted successfully";
        header('Location:retrieve.php');
        
    }
        else
    {
        $delete = "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>