<?php
 include "main.php";
	class student extends main{
		protected $table = "new_project_01";
		private $name;
		private $dept;
		private $skill;
		
		public function setName($name){
			$this->name = $name;
		}
		public function setDept($dept){
			$this->dept = $dept;
		}
		public function setSkill($skill){
			$this->skill = $skill;
		}
		
		public function insert(){
			$sql="insert into $this->table(name,  dept, skill) values(:name, :dept, :skill)";
			$stmt = db::prepareown($sql);
			$stmt->bindParam(':name',$this->name);
			$stmt->bindParam(':dept',$this->dept);
			$stmt->bindParam(':skill',$this->skill);
			return $stmt->execute();
		}
		
		public function update($id){
			$sql="update $this->table set name=:name, dept=:dept, skill=:skill where id=:id";
			$stmt = db::prepareown($sql);
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':name',$this->name);
			$stmt->bindParam(':dept',$this->dept);
			$stmt->bindParam(':skill',$this->skill);
			return $stmt->execute();
		}
		
		
	}
?>