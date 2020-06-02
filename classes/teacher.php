<?php
 include "main.php";
	class teacher extends main{
		protected $table = "new_project_teacher";
		private $name;
		private $uni;
		private $age;
		
		public function setName($name){
			$this->name = $name;
		}
		public function setUni($uni){
			$this->uni = $uni;
		}
		public function setAge($age){
			$this->age = $age;
		}
		
		public function insert(){
			$sql="insert into $this->table(name,  uni, age) values(:name, :uni, :age)";
			$stmt = db::prepareown($sql);
			$stmt->bindParam(':name',$this->name);
			$stmt->bindParam(':uni',$this->uni);
			$stmt->bindParam(':age',$this->age);
			return $stmt->execute();
		}
		
		public function update($id){
			$sql="update $this->table set name=:name, uni=:uni, age=:age where id=:id";
			$stmt = db::prepareown($sql);
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':name',$this->name);
			$stmt->bindParam(':uni',$this->uni);
			$stmt->bindParam(':age',$this->age);
			return $stmt->execute();
		}
		
		
	}
?>