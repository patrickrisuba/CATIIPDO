<?php
require 'db.php';
$id = $_GET['Cid'];
$sql = 'DELETE FROM christian_tbl WHERE Cid=:Cid';
$statement = $connection->prepare($sql);
if ($statement->execute([':Cid' => $id])) {
  header("Location: display.php");
}
?>