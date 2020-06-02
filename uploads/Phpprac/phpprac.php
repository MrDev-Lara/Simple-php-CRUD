<?php 
	include "functions.php";
?>

<?php 
require ('header.php');
?>
	<div class="Hae">
		
		
		<h2>Prepared Statement</h2>
		
		<?php
			$db = new mysqli("localhost","root","","userdata");
			
			
			
			if(mysqli_connect_errno()){
				echo "connection failed";
				exit();
			}else{
				echo "successfully connected";
			}
			
			$sql = "insert into tbl_user(name,skill,dept)values(?,?,?)";
			$result = $db->prepare($sql);
			$result->bind_param('sss',$name,$skill,$dept);
			$name="shafa";
			$skill="python";
			$dept="ETE";
			$result->execute();
			$result->close();
			$db->close();
			
		
		
		
		
			
		?>
		
		
		
		
	</div>
</body>
</html>