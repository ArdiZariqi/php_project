<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/registrar_office.php";
       $r_users = getAllR_users($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Registrar Office</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body{
      background-color: #f5f5f5;
    }
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }

  .btn-dark {
    background-color: #343a40;
    border-color: #343a40;
  }

  .btn-dark:hover {
    background-color: #23272b;
    border-color: #23272b;
  }
  .n-table {
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }

  .table {
    background-color: #fff;
  }

  .table thead th {
    background-color: #343a40;
    color: #fff;
  }

  .table-bordered th,
   .table-bordered td {
    border-color: #dee2e6;
  }

  .alert {
    margin-top: 20px;
  }

  .w-450 {
    width: 450px;
  }

  .mt-5 {
    margin-top: 5rem;
  }

  .m-5 {
    margin: 5rem;
  }

  .active {
    color: #fff;
  }
</style>
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($r_users != 0) {
     ?>
     <div class="container mt-5">
        <a href="registrar-office-add.php"
           class="btn btn-dark">Add New User</a>

           <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" 
                 role="alert">
              <?=$_GET['error']?>
            </div>
            <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" 
                 role="alert">
              <?=$_GET['success']?>
            </div>
            <?php } ?>

           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($r_users as $r_user ) { 
                    $i++;  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$r_user['r_user_id']?></td>
                    <td><a href="registrar-office-view.php?r_user_id=<?=$r_user['r_user_id']?>">
                         <?=$r_user['fname']?></a></td>
                    <td><?=$r_user['lname']?></td>
                    <td><?=$r_user['username']?></td>
                    <td>
                        <a href="registrar-office-edit.php?r_user_id=<?=$r_user['r_user_id']?>"
                           class="btn btn-warning">Edit</a>
                        <a href="registrar-office-delete.php?r_user_id=<?=$r_user['r_user_id']?>"
                           class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Empty!
              </div>
         <?php } ?>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(6) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>