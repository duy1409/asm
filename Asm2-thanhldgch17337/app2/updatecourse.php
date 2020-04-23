<?php 
        

          
if(isset($_POST['cid'])){    
    
    include('connect.php'); 
    
    $stmt = $conn->prepare("UPDATE course SET cname = :cname WHERE cid = :cid ");
    $stmt->bindValue(':cid', $_POST['cid'], PDO::PARAM_INT);
    $stmt->bindValue(':cname', $_POST['cname'], PDO::PARAM_STR);
    
    $pdoResult = $stmt->execute();                         

        if ($pdoResult)
            echo "update success <a href='managecourse.php'>back</a>";
        else
            echo "error. <a href='managecourse.php'>back</a>";
    }
?>