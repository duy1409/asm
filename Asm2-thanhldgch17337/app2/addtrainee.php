<form action = "addtrainee.php" method = "post">    
        <legend>Add trainee</legend>
        <fieldset class = "fitContent">
        <br>Name<br>
        <input type="text" name="trname"/>
        <br>Address<br>
        <input type="text" name="traddress"/>
        <br>Education<br>
        <input type="text" name="treducation"/>
        <br>IELTS score<br>
        <input type="text" name="trscore"/>
        <br><br>
        <input type="submit" value="Add" /><br>           
        </fieldset>  
</form>

<?php
if(isset($_POST['trname'])){
    $name = $_POST['trname'];    
    $address = $_POST['traddress'];
    $education = $_POST['treducation'];
    $score = $_POST['trscore'];
    
    include('connect.php'); 
    
    $stmt = $conn->prepare("INSERT INTO trainee (trname, traddress, treducation, trscore) VALUE ('{$name}', '{$address}', '{$education}', '{$score}')");
    $pdoResult = $stmt->execute();                          
    
    if ($pdoResult)
        echo "Adding success <a href='managetrainee.php'>back</a>";
    else
        echo "error. <a href=''>back</a>";
}
?>