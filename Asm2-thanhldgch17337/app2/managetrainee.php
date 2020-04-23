<?php session_start(); ?>
<?php 
       if (isset($_SESSION['username'])){
           echo 'Log in as '.$_SESSION['username']."<br>";
           echo '<a href="logout.php">Logout</a>';
       }
       
       ?>
<br>
<a href="managecourse.php">Manage course</a>
<h1 align='center'>List of Trainee</h1>
<table align='center'>
    <tr>
        
        <th> Name</th>
        <th> Address</th>
        <th> Education</th>
        <th> IELTS score</th>
        <th colspan="2"> Options</th>
        <th> <a href="addtrainee.php">Add trainee</a></th>
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
        

        ?>        

    <form action="updatetrainee.php" method="post">
                <td><input type="text" name="trname" required value="<?php echo $name; ?>" /></td>
                
                <td><input type="text" size="5" name="traddress" required value="<?php echo $address; ?>"/></td>
                
                <td><input type="text" size="5" name="treducation" required value="<?php echo $education; ?>"/></td>
                
                <td><input type="text" size="5" name="trscore" required value="<?php echo $score; ?>"/></td>
                
                <input type="hidden" name="trid" value="<?php echo $row['trid'] ?>" />
                <td><input type="submit" value="Update" /></td>
            </form>

        <td>
            <form action="deletetrainee.php" method="post" onsubmit="return confirmDelete();">
                <input type="hidden" name="trid" value="<?php echo $row['trid'] ?>" />
                <input type="submit" value="Delete" />
            </form>
        </td>
        <?php
        echo "</tr>";
    }
    ?>
    <script>
        function confirmDelete() {
            var r = confirm("Are you sure you would like to delete ?");
            if (r) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</table>