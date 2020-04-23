<?php
    include('connect.php');
    $trid = $_POST['trid'];      
    $cid   = $_COOKIE['newcid'];
    
    $stmt = $conn->prepare("INSERT INTO coursetrainee (cid, trid) VALUE ('{$cid}', '{$trid}')");
    $pdoResult = $stmt->execute();     
    if ($pdoResult){
        echo "Assign successfully <a href='managecourse.php'>back</a>";        	
        setcookie("newcid", "", time()-3600);
    }
    else
        echo "This trainee has been assigned. <a href='javascript: history.go(-1)'>back</a>";
?>    
    

