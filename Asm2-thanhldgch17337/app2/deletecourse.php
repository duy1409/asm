<?php
if(isset($_POST['cid'])){    
    
    include('connect.php'); 
    
    $stmt = $conn->prepare("DELETE FROM course WHERE cid = :cid");
    $stmt->bindValue(':cid', $_POST['cid'], PDO::PARAM_INT);
    $pdoResult = $stmt->execute();
                          
    
    if ($pdoResult)
        echo "Delete success <a href='managecourse.php'>back</a>";
    else
        echo "error. <a href='javascript: history.go(-1)'>back</a>";
}
?>