

<!DOCTYPE html>
<html>
<head>
  
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DISPLAY ALL CHRISTIANS </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-info">

<?php
require 'db.php';
$sql = 'SELECT * FROM christian_tbl';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>



<!doctype html>
<html lang="en">
  <head>
    <title>System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootst">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="/">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="adminLogout.php">Logout</a>
      </li></ul></div></nav>


<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All people</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>District</th>
          <th>Sector</th>
          <th>Church Name</th>
          <th>Pastor Name</th>
          <th>Telephone</th>
          <th>Email</th>
          <th>Registration Number</th>
          <th>IMAGE</th>
          <th colspan="2">ACTION</th>

        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->Cid; ?></td>
            <td><?= $person->Cfname; ?></td>
            <td><?= $person->Clname; ?></td>
            <td><?= $person->District; ?></td>
            <td><?= $person->Sector; ?></td>
            <td><?= $person->Church; ?></td>
            <td><?= $person->Pastor_Name; ?></td>
            <td><?= $person->Telephone; ?></td>
            <td><?= $person->Email; ?></td>
            <td><?= $person->Reg_Num; ?></td>
            <td><img class="img-fluid px-3 px-sm-0 mt-1 mb-1" style="width: 25rem;"
                                            src="../phpcat2/images/<?php echo $person->Attachment; ?>" alt="..."></td>
           
            <td>
              <a href="edit.php?Cid=<?= $person->Cid ?>" class="btn btn-info">Edit</a></td>
              <td><a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?Cid=<?= $person->Cid ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>



<?php require 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>