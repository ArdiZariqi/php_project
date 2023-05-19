<?php  

function getQuestionById($feq_id, $conn){
   $sql = "SELECT * FROM feq
           WHERE feq_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$feq_id]);

   if ($stmt->rowCount() == 1) {
     $feq = $stmt->fetch();
     return $feq;
   }else {
    return 0;
   }
}


function getAllQuestion($conn){
   $sql = "SELECT * FROM feq";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $feq = $stmt->fetchAll();
     return $feq;
   }else {
   	return 0;
   }
}


   