<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/section.php";
       $sections = getAllSections($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Section</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
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
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
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
        if ($sections != 0) {
     ?>
     <div class="container mt-5">
        <a href="section-add.php"
           class="btn btn-dark">Add New Section</a>

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
                    <th scope="col">Section</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($sections as $section ) { 
                    $i++;  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td>
                      <?php 
                          echo $section['section'];
                       ?>
                    </td>
                    <td>
                        <a href="section-edit.php?section_id=<?=$section['section_id']?>"
                           class="btn btn-warning">Edit</a>
                           
                        <a href="section-delete.php?section_id=<?=$section['section_id']?>"
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
             $("#navLinks li:nth-child(5) a").addClass('active');
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