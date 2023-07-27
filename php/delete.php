<?php 
include('connection.php');
include ('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>eREGISTRY</title>
	</head>
<body>
   		<div class="icon">
   			<center><h2 class="logo" style="font-family: forte; font-size: 50px;">eREGISTRY</h2></div></center>
                 <center><form action="#" method="POST" class="box">  
                      Are you sure you want to delete</br></br></br>    
                      <input type="submit" name="yes" value="Yes">
                      <input type="submit" name="no" value="No">
                  </form></center>
   			
	
<?php
if(isset($_POST['yes'])){
if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	
	$sql=mysqli_query($conn,"DELETE FROM phone WHERE PhoneId='$id'");
	if($sql){
		?>
           <script>
		alert("data deleted")
	      </script>
		<?php
        header("location:search.php");		
	}

}
}
if(isset($_POST['no'])){
	header("location:search.php");
}

?>
