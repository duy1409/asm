<?php    
    
    setcookie('newcid', $_POST['cid'], time() + 3600);
    
    

?>
<table border="1" align='center'>
<tr>
    <th> ID</th>
    <th> Name</th>
    <th> Address</th>
    <th> Education</th>
    <th> IELTS score</th>
    <th> </th>
</tr>
<?php


    
    include('connect.php');
    $stmt = $conn->prepare("SELECT trid, trname, traddress, treducation, trscore  FROM trainee");
               
    $stmt->execute();  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $Id = $row['trid'];
        $name = $row['trname'];
        $address = $row['traddress'];
        $education = $row['treducation'];
        $score = $row['trscore'];        
        echo "<tr>";
        echo "<td>$Id</td>";
        echo "<td>$name</td>";
        echo "<td>$address</td>";
        echo "<td>$education</td>";
        echo "<td>$score</td>";    
    
?>
<td>
    <form action="assigntrainee.php" method="post">
        <input type="hidden" name="trid" value="<?php echo $Id ?>" />
        <input type="submit" value="Assign to course" />
    </form>
</td>
<?php
    echo "</tr>";
}
?>
</table>

