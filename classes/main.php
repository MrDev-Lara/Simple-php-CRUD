<?php
	include "db.php";
	abstract class main{
		protected $table;
		abstract public function insert();
		abstract public function update($id);
		
		public function readdata(){
			$sql="select * from $this->table";
			$stmt = db::prepareown($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
		public function showdatabyid($id){
			$sql="select * from $this->table where id=:id";
			$stmt = db::prepareown($sql);
			$stmt->bindParam(':id',$id);
			$stmt->execute();
			return $stmt->fetch();
		}
		
		public function deletebyid($id){
			$sql="delete from $this->table where id=:id";
			$stmt = db::prepareown($sql);
			$stmt->bindParam(':id',$id);
			return $stmt->execute();
		}
	}
?>