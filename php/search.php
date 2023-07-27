<?php 
include("session.php");
include("connection.php");
$user=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eREGISTRY</title>
    <style>
        table{
            width:70%;
            color:green;
        }
    </style>
</head>
<body>
    <center><form action="search.php" method="POST">
        <h1>Make a view of you phone</h1>
        <table>
            <tr ><td>Email:</td><td><input type="text" name="email" value="<?php echo $user;?>" readonly></td></tr>
            <tr><td>From :</td><td><input type="date" name="date1"></td><td>To :</td><td><input type="date" name="date2"></td></tr>
            <tr><td></td><td><input type="submit" name="ok" value="Search"></td></tr>
        </table>
    </form>
  <?php 
   if(isset($_POST['ok'])){
   $email=$_POST['email']; 
   $date1=$_POST['date1'];
   $date2=$_POST['date2'];
  $select = mysqli_query($conn, "SELECT * FROM phone WHERE 	DateOfPurchase BETWEEN '$date1' AND '$date2' AND Email = '$email'");
      if(mysqli_num_rows($select) == 0){
    echo "<h2>No Data found</h2>";
   }
   else{
     ?>
     <table border="2"><tr><td>ImeiNumber_1</td><td>ImeiNumber_2</td><td>Brand</td><td>Model</td><td>DateOfPurchase</td>
    <td>Description</td><td>PhoneStatus</td><td>Email</td><td colspan="2">Operation</td></tr>
    <?php
     while($row=mysqli_fetch_array($select)){
        ?>
        <tr><td><?php echo $row['1'];?></td><td><?php echo $row['2'];?></td><td><?php echo $row['3'];?></td><td><?php echo $row['4'];?></td>
        <td><?php echo $row['5'];?></td><td><?php echo $row['6'];?></td><td><?php echo $row['7'];?></td><td><?php echo $row['8'];?></td>
        <td><a href="update.php?update=<?php echo $row['0'];?>">Edit</a></td>
         <td><a href="delete.php?delete=<?php echo $row['0'];?>">Delete</a></td>
    </tr>
        <?php
     }
     ?></table><?php
   }
  

   }
  ?>
  </center>
</body>
</html>