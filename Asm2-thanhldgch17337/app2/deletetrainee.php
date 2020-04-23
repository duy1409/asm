<?php
if(isset($_POST['trid'])){    
    
    include('connect.php'); 
    
    $stmt = $conn->prepare("DELETE FROM trainee WHERE trid = :trid");
    $stmt->bindValue(':trid', $_POST['trid'], PDO::PARAM_INT);
    $pdoResult = $stmt->execute();
                          
    
    if ($pdoResult)
        echo "Delete success <a href='managetrainee.php'>back</a>";
    else
        echo "error. <a href='managetrainee.php'>back</a>";
}
?>