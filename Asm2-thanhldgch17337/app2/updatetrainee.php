<?php
if(isset($_POST['trid'])){    
    
    include('connect.php'); 
    
    $stmt = $conn->prepare("UPDATE trainee SET trname = :trname, traddress = :traddress, treducation = :treducation, traddress = :traddress, trscore = :trscore WHERE trid = :trid ");
    $stmt->bindValue(':trid', $_POST['trid'], PDO::PARAM_INT);
    $stmt->bindValue(':trname', $_POST['trname'], PDO::PARAM_STR);
    $stmt->bindValue(':traddress', $_POST['traddress'], PDO::PARAM_STR);
    $stmt->bindValue(':treducation', $_POST['treducation'], PDO::PARAM_STR);
    $stmt->bindValue(':trscore', $_POST['trscore'], PDO::PARAM_INT);
    $pdoResult = $stmt->execute();
                          
    
    if ($pdoResult)
        echo "update success <a href='managetrainee.php'>back</a>";
    else
        echo "error. <a href='managetrainee.php'>back</a>";
}
?>