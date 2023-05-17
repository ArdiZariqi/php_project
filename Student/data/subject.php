<?php 

// All Subjects
function getAllSubjects($conn){
   $sql = "SELECT * FROM subjects";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $subjects = $stmt->fetchAll();
     return $subjects;
   }else {
   	return 0;
   }
}

// Get Subjects by ID
function getSubjectById($subject_id, $conn){
   $sql = "SELECT * FROM subjects
           WHERE subject_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$subject_id]);

   if ($stmt->rowCount() == 1) {
     $subject = $stmt->fetch();
     return $subject;
   }else {
   	return 0;
   }
}

function removeCourse($id, $conn){
  $sql  = "DELETE FROM subjects
          WHERE subject_id=?";
  $stmt = $conn->prepare($sql);
  $re   = $stmt->execute([$id]);
  if ($re) {
    return 1;
  }else {
   return 0;
  }
}



function getStudentSubjects($conn, $student_id) {
    $sql = "SELECT subjects.subject, subjects.subject_code
            FROM subjects
            INNER JOIN student_subjects ON subjects.subject_id = student_subjects.subject_id
            WHERE student_subjects.student_id = :student_id";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}
?>





