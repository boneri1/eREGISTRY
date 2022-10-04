<html>
  <head></head>
  <body>
    <center><form action="index.php" method="POST">
	 <table>
	 <h1>Login Form</h1>
	  <tr><td>Username</td><td><input type="text" name="usn"></td></tr>
	  <tr><td>Password</td><td><input type="password" name="psd"></td></tr>
	  <tr><td></td><td><input type="submit" name="ok" value="Login"></td></tr>
	 </table>
	</form></center>
	<?php 
	 $con=mysqli_connect("localhost","root","","drafty");
	 if(isset($_POST['ok'])){
		 $usn=$_POST['usn'];
		 $psd=$_POST['psd'];
		 $insert=mysqli_query($con,"INSERT INTO user(username,password)VALUES('$usn','$psd')");
		 if($insert){
			 ?>
			  <script>
			   window.alert("inserted");
			  </script>
			 <?php
	 }
	 }
	?>
  </body>
</html>