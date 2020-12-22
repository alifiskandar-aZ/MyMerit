<?php

// connect ke database
include('dbconfig.php');

// set variable 'id' dari db
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
// get the 'id' variable 
$id = $_GET['id'];

// delete record from database
if ($stmt = $mysqli->prepare("DELETE FROM report WHERE id = ? LIMIT 1"))
{
$stmt->bind_param("i",$id);
$stmt->execute();
$stmt->close();
}
else
{
echo "ERROR: could not prepare SQL statement.";
}
$mysqli->close();

echo "<script>alert('Report Removed');
            window.location = 'viewReport.php';</script>";

}
else
// if the 'id' variable isn't set, redirect the user
{
header("Location: viewReport.php");
}

?>