<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Home</title>
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
          max-width: 900px;
          margin: auto;
          padding: 10px;
      }

      .row-cols-5 {
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
      }

      .col {
          flex-basis: 20%;
          max-width: 20%;
          padding: 10px;
          text-align: center;
      }

      .col a {
          display: block;
          padding: 20px;
          border-radius: 5px;
          background-color: #f2f2f2;
          text-decoration: none;
          color: #333;
          transition: background-color 0.3s;
      }

      .col a:hover {
          background-color: #e0e0e0;
      }

      .col i {
          display: block;
          font-size: 24px;
          margin-bottom: 10px;
      }

      .col span {
          display: block;
      }

      .btn {
          font-size: 16px;
          border-radius: 3px;
      }

      .btn-dark {
          background-color: #333;
          color: #fff;
          border-color: #333;
      }

      .btn-dark:hover {
          background-color: #555;
          border-color: #555;
      }

      .btn-primary {
          background-color: #007bff;
          color: #fff;
          border-color: #007bff;
      }

      .btn-primary:hover {
          background-color: #0069d9;
          border-color: #0062cc;
      }

      .btn-warning {
          background-color: #ffc107;
          color: #fff;
          border-color: #ffc107;
      }

      .btn-warning:hover {
          background-color: #e0a800;
          border-color: #d39e00;
      }

  </style>
</head>
<body>
    <?php 
        include "inc/navbar.php";
     ?>
     <div class="container mt-5">
         <div class="container text-center">
             <div class="row row-cols-5">
               <a href="teacher.php" 
                  class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-user-md fs-1" aria-hidden="true"></i><br>
                  Teachers
               </a> 
               <a href="student.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-graduation-cap fs-1" aria-hidden="true"></i><br>
                  Students
               </a> 
               <a href="registrar-office.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-pencil-square fs-1" aria-hidden="true"></i><br>
                  Registrar Office
               </a> 
               <a href="class.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-cubes fs-1" aria-hidden="true"></i><br>
                  Class
               </a> 
               <a href="section.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-columns fs-1" aria-hidden="true"></i><br>
                  Section
               </a> 
               <a href="course.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-book fs-1" aria-hidden="true"></i><br>
                  Course
               </a> 
               <a href="message.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-envelope fs-1" aria-hidden="true"></i><br>
                  Message
               </a> 
               <a href="settings.php" class="col btn btn-primary m-2 py-3 col-5">
                 <i class="fa fa-cogs fs-1" aria-hidden="true"></i><br>
                  Settings
               </a> 
               <a href="../logout.php" class="col btn btn-warning m-2 py-3 col-5">
                 <i class="fa fa-sign-out fs-1" aria-hidden="true"></i><br>
                  Logout
               </a> 
             </div>
         </div>
     </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(1) a").addClass('active');
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