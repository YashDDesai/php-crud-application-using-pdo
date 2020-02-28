<?php 

	class Student {
		private $db;

		function __construct(){
			$this->db = new Database;
		}

		public function addStudent($data){
			$this->db->query("INSERT INTO students(name, class) VALUES(:name, :class)");

			$this->db->bind(":name", $data["name"]);
			$this->db->bind(":class", $data["class"]);

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function removeStudent($id){
			$this->db->query("DELETE FROM students WHERE id=:id");

			$this->db->bind(":id", $id);	

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function updateStudent($id, $data){

			$this->db->query("UPDATE students SET name=:name, class=:class WHERE id=:id");

			$this->db->bind(":id", $id);
			$this->db->bind(":name", $data["name"]);
			$this->db->bind(":class", $data["class"]);	

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function getStudents(){
			$this->db->query("SELECT * FROM students");

			$result = $this->db->resultset();
				
			return $result;
		}

		public function getAStudent($id){
			$this->db->query("SELECT * FROM students WHERE id=:id");
			$this->db->bind(":id", $id);	
			$result = $this->db->single();
				
			return $result;
		}
	}


 ?>