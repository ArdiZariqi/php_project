<?php

$conn = new PDO("mysql:host=localhost;port=3307;dbname=sms_db", "root", "");

// check if insert form is submitted
if (isset($_POST["submit"])) {
    // create table if not already created
    $sql = "CREATE TABLE IF NOT EXISTS faqs (
        id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
        question TEXT NULL,
        answer TEXT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    $statement = $conn->prepare($sql);
    $statement->execute();

    // insert in faqs table
    $sql = "INSERT INTO faqs (question, answer) VALUES (?, ?)";
    $statement = $conn->prepare($sql);
    $statement->execute([
        $_POST["question"],
        $_POST["answer"]
    ]);
}

// get all faqs from latest to oldest
$sql = "SELECT * FROM faqs ORDER BY id DESC";
$statement = $conn->prepare($sql);
$statement->execute();
$faqs = $statement->fetchAll();

?>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="richtext/richtext.min.css" />

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="richtext/jquery.richtext.js"></script>
<?php 
        include "inc/navbar.php";
     ?>

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <h1 class="text-center">Add FAQ</h1>

            <form method="POST" action="add.php">
                <div class="form-group">
                    <label>Enter Question</label>
                    <input type="text" name="question" class="form-control" required />
                </div>

                <div class="form-group">
                    <label>Enter Answer</label>
                    <textarea name="answer" id="answer" class="form-control" required></textarea>
                </div>

                <input type="submit" name="submit" class="btn btn-info" value="Add FAQ" />
            </form>
        </div>
    </div>

    <div class="row">
        <div class="offset-md-2 col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($faqs as $faq): ?>
                        <tr>
                            <td><?php echo $faq["id"]; ?></td>
                            <td><?php echo $faq["question"]; ?></td>
                            <td><?php echo $faq["answer"]; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $faq['id']; ?>" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <a href="delete.php?id=<?php echo $faq['id']; ?>" class="btn btn-danger btn-sm">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#answer').richText();
    });
</script>


<style>
    .accordion_one .panel-group {
        border: 1px solid #f1f1f1;
        margin-top: 100px;
    }
    a:link {
        text-decoration: none;
    }
    .accordion_one .panel {
        background-color: transparent;
        box-shadow: none;
        border-bottom: 0px solid transparent;
        border-radius: 0;
        margin: 0;
    }
    .accordion_one .panel-default {
        border: 0;
    }
    .accordion-wrap .panel-heading {
        padding: 0px;
        border-radius: 0px;
    }
    h4 {
        font-size: 18px;
        line-height: 24px;
    }
    .accordion_one .panel .panel-heading a.collapsed {
        color: #999999;
        display: block;
        padding: 12px 30px;
        border-top: 0px;
    }
    .accordion_one .panel .panel-heading a {
        display: block;
        padding: 12px 30px;
        background: #fff;
        color: #313131;
        border-bottom: 1px solid #f1f1f1;
    }
    .accordion-wrap .panel .panel-heading a {
        font-size: 14px;
    }
    .accordion_one .panel-group .panel-heading+.panel-collapse>.panel-body {
        border-top: 0;
        padding-top: 0;
        padding: 25px 30px 30px 35px;
        background: #fff;
        color: #999999;
    }
    .img-center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .container {
        margin-top: 100px;
        margin-bottom: 100px;
    }
</style>
