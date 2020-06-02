<?php 
    require ('header.php');
	spl_autoload_register(function($class){
		include "classes/".$class.".php";
	});
?>

	<div class="Hae">
	
		
		<div class="upper_section">
			<h3>Simple project = 01 by Moni Uddin</h3>
			<?php echo "<a href='phpprac.php' class='new'>For Student</a>" ;?>
			<?php echo "<a href='phppracteacher.php' class='new1'>For Teacher</a>" ;?>
		</div>
		<div class="middle_section">
			<div class="form_part">
			<?php
				$user = new student();
	
				if(isset($_POST['btn'])){
					$name = $_POST['name'];
					$dept = $_POST['dept'];
					$skill = $_POST['skill'];
					
					$user->setName($name);
					$user->setDept($dept);
					$user->setSkill($skill);
					
				if($user->insert()){
					echo"<span class='success'>Data inserted Successfully;</span>";
					}
				}
				
				if(isset($_POST['update'])){
					$id = $_POST['id'];
					$name = $_POST['name'];
					$dept = $_POST['dept'];
					$skill = $_POST['skill'];
					
					$user->setName($name);
					$user->setDept($dept);
					$user->setSkill($skill);
					
				if($user->update($id)){
					echo"<span class='success'>Data updated Successfully;</span>";
					}
				}
			?>
			<?php
				if(isset($_GET['action']) && $_GET['action']=='delete'){
					$id = (int)$_GET['id'];
					if($user->deletebyid($id)){
						echo "<span class='delete'>Data deleted successfully.</span>";
					}
				}
			?>
			<?php
				if(isset($_GET['action']) && $_GET['action']=='update'){
					$id = (int)$_GET['id'];
					$result = $user->showdatabyid($id);
			?>
	
				<form action="" method="post">
						<input type="hidden" name="id" value="<?php echo $result['id']; ?>"/>
					<span></br>
						Name :
						<input type="text" placeholder="Your Name" required="1" name="name" value="<?php echo $result['name']; ?>"/>
					</span><br /><br />
					<span>
						Dept :
						<input type="text" placeholder="Your Dept" required="1" name="dept" value="<?php echo $result['dept']; ?>"/>
					</span><br /><br />
					<span>
						Skill :
						<input type="text" placeholder="Your Skill" required="1" name="skill" value="<?php echo $result['skill']; ?>"/>
					</span></br></br>
					<input type="submit" class="button" name="update" value="update"/>
				</form>
			<?php } else{ ?>
				<form action="" method="post">
					<span></br>
						Name :
						<input type="text" placeholder="Your Name" required="1" name="name"/>
					</span><br /><br />
					<span>
						Dept :
						<input type="text" placeholder="Your Dept" required="1" name="dept"/>
					</span><br /><br />
					<span>
						Skill :
						<input type="text" placeholder="Your Skill" required="1" name="skill" />
					</span></br></br>
					<input type="submit" class="button" name="btn" value="Submit"/>
				</form>
			<?php } ?>
			</div>
			<div class="table_part">
			<table>
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Dept</th>
						<th>Skill</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$i=0;
					foreach($user->readdata() as $key=>$values){
						$i++;
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $values['name']; ?></td>
						<td><?php echo $values['dept']; ?></td>
						<td><?php echo $values['skill']; ?></td>
						<td>
							<?php echo "<a href='phpprac.php?action=update&id=".$values['id']."'>EDIT</a>"; ?>||
							<?php echo "<a href='phpprac.php?action=delete&id=".$values['id']."' onClick='return confirm(\"Are you sure you want to delete?\")'>DELETE</a>"; ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
		
		
		
	</div>
</body>
</html>