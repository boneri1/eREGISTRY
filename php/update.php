<?php 
include ('session.php');
 include('connection.php');
 if(isset($_GET['update'])){
  $_SESSION['id']=$id=$_GET['update'];
  $select=mysqli_query($conn,"SELECT * FROM Phone WHERE PhoneId='$id'");
  $data=mysqli_fetch_array($select);
 }
 ?>
 <center><form action="update.php" method="POST">
		<h1>Make Update On Phone</h1>
      <table>
         <tr><td><input type="number" name="phoneId" value="<?php echo $data['PhoneId']; ?>"  hidden></td></tr>
      	  <tr><td>Email :</td>
      	  	<td><input type="email" name="email" value="<?php echo $data['Email']; ?>" readonly ></td>
      	  </tr>
    	  <tr><td><input type="checkbox" id="disableCheckbox" onclick="checkSim()"/>
    	     I use Single Simcard In My Phone</td>
    	  </tr>
          <tr>
          	<td>First Imei:</td>
            <td><input type="text" name="firstImei" value="<?php echo $data['ImeiNumber_1'];?>"></td>
          </tr>
          <tr id="second">
        	<td>Second Imei:</td>
        	<td><input type="text" name="secondImei" value="<?php echo $data['ImeiNumber_2'];?>"></td>
         </tr>
         <tr><td>Brand Name</td><td><input type="text" name="brand" value="<?php echo $data['Brand'];?>" required></td></tr>
         <tr><td>Model</td><td><input type="text" name="model" value="<?php echo $data['Model'];?>" required></td></tr>
         <tr><td>Date Of Purchase</td><td><input type="date" name="dateOfPuchase" value="<?php echo $data['DateOfPurchase'];?>" required></td></tr>
         <tr><td>Price Of Phone</td><td><input type="text" name="priceOfPhone" value="<?php echo $data['priceOfPhone'];?>"required></td></tr>
         <tr><td>Description</td><td><textarea name="description"><?php echo $data['Description'];?></textarea></td></tr>
         <tr><td>Phone Status</td><td>
        <select name="phonestatus" value="<?php echo $data['Description'];?>">
         	<option value="Null"><?php echo $data['PhoneStatus'];?></option>
            <option value="Active">Active</option>
         	<option value="Stolen">Stolen</option>
         	<option value="Lost">Lost</option>
        </select></td></tr>
        <tr><td></td><td><input type="submit" name="ok" value="Record"></td></tr>
       </table>
      </form>
 </center>
 <script>
    function checkSim() {
      var secondColumn = document.getElementById("second");
      var checkbox = document.getElementById("disableCheckbox");
      secondColumn.hidden = checkbox.checked;
    }
  </script>
<?php 
if(isset($_POST['ok'])){
    $phoneId=$_POST['phoneId'];
    $firstImei=$_POST['firstImei'];
    $secondImei=$_POST['secondImei'];
    $brand=$_POST['brand'];
    $model=$_POST['model'];
    $dateOfPurchase=$_POST['dateOfPuchase'];
    $priceOfPhone=$_POST['priceOfPhone'];
    $description=$_POST['description'];
    $phonestatus=$_POST['phonestatus'];
    $gmail=$_POST['email'];
    $update=mysqli_query($conn,"UPDATE `phone` SET `ImeiNumber_1` = '$firstImei',`ImeiNumber_2` = '$secondImei',`Brand` = '$brand',`Model` = '$model', 
    `DateOfPurchase` = '$dateOfPurchase',`priceOfPhone` = '$priceOfPhone',`Description` = '$description',`PhoneStatus` = '$phonestatus',`Email` =`$gmail` WHERE `PhoneId` = `$phoneId`").mysqli_error();
    if($update){
        
        header("location:search.php");
    }
    else{
                echo "something went wrong";
    }
}
?>