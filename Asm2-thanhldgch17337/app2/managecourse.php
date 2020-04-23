<?php session_start(); ?>
<?php 
       if (isset($_SESSION['username'])){
           echo 'Log in as '.$_SESSION['username']."<br>";
           echo '<a href="logout.php">Logout</a>';
       }
       
       ?>
<br>
<a href="managetrainee.php">Manage trainee</a>
<h1 align='center'>List of Course</h1>
<table align='center' border="1">
    <tr>
        <th> ID</th>
        <th> Name</th>                
        <th colspan="3"> Options</th>
        <th> Trainee list</th>
        <th> <a href="addcourse.php">Add course</a></th>
    </tr>
    <?php
    include('connect.php');
    $stmt = $conn->prepare("SELECT cid, cname FROM course");               
    $stmt->execute(); 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $Id = $row['cid'];
        $name = $row['cname'];      
                
        echo "<tr>";
        echo "<td>$Id</td>";

        ?>        

    <form action="Updatecourse.php" method="post">
        <td><input type="text" name="cname" required value="<?php echo $name; ?>" /></td>               
        <input type="hidden" name="cid" value="<?php echo $row['cid'] ?>" />
        <td><input type="submit" value="Update" /></td>
    </form>               
               
                

        <td>
            <form action="Deletecourse.php" method="post" onsubmit="return confirmDelete();">
                <input type="hidden" name="cid" value="<?php echo $row['cid'] ?>" />
                <input type="submit" value="Delete" />
            </form>
        </td>
        
        <td>
            <form action="listtrainee.php" method="post" >
                <input type="hidden" name="cid" value="<?php echo $row['cid'] ?>" />
                <input type="submit" value="Add trainee" />
            </form>
        </td>
        <td>
            <form action="managecourse.php" method="post" >
                <input type="hidden" name="cid" value="<?php echo $row['cid'] ?>" />
                <input type="submit" value="Show" />
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
<br>
<br>
<h1 align='center'>List of trainee assigned courses</h1>

<table align='center'>
    <tr>
        
        <th> Name</th>                
        <th> Address</th>
        <th> Course</th>
    </tr>
<?php
if(isset($_POST['cid'])){
    include('connect.php');
    $stmt = $conn->prepare("SELECT TR.trid, TR.trname, TR.traddress, CR.cid, CR.cname FROM trainee TR, course CR, `coursetrainee` CRTR WHERE CRTR.trid=TR.trid AND CRTR.cid=CR.cid AND CR.cid = :cid");
    $stmt->bindValue(':cid', $_POST['cid'], PDO::PARAM_INT);
    $stmt->execute(); 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $Id = $row['trid'];
        $name = $row['trname'];
        $address = $row['traddress'];
        $cname = $row['cname']    ;  
        echo "<tr>";
        
        echo "<td>$name</td>";
        echo "<td>$address</td>";

        echo "<td>$cname</td>";
        ?>        



        <?php
        echo "</tr>";
    }
} 
?>
    
    
</table>