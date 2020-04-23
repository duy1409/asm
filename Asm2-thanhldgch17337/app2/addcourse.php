<h1 align='center'>Add course</h1>
<form action = "Addcourse.php" method = "post">    
        
            <table align='center'>
                <tr>
                    <td> Name </td>
                    <td><input type="text" name="cname" /></td>
                    <td><input type="submit" value="Add" /><br> </td>
                </tr>            
                              
            </table>      
        
</form>

<?php
if(isset($_POST['cname'])){
    $name = $_POST['cname'];  
    
        
    include('connect.php'); 
    
    $stmt = $conn->prepare("INSERT INTO course (cname) VALUE ('{$name}')");
    $pdoResult = $stmt->execute();                          
    
    if ($pdoResult)
        echo "Adding success <a href='managecourse.php'>back</a>";
    else
        echo "error. <a href='managecourse.php'>back</a>";
}
?>