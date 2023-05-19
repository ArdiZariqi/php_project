<?php 
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {

       include "faqdata.php";
       $sections = getAllSections($conn);

       $question = '';
       $answer = '';
    
       if (isset($_GET['question'])) $question = $_GET['question'];
       if (isset($_GET['answer'])) $answer = $_GET['answer'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
</head>
<body>
<form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/student-add.php">
        <h3>Ask new question</h3><hr>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>
        <div class="mb-3">
          <label class="form-label">Question</label>
          <textarea  
                 class="form-control"
                 value="<?=$question?>" 
                 name="question">
          </div>
        

</body>
</html>
<?php

  } else {
    header("Location: ../login.php");
    exit;
  }
} else {
  header("Location: ../login.php");
  exit;
}

?>