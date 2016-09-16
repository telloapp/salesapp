<?php 
class Church{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}

	public function insert_church($website, $name, $text, $email, $addr1, $addr2, $addr3, $addr4, $cell1, $cell2, $pastor, $pastor_site, $time, $id){

		global $db;

		$time 		= time();

		$query 	= $this->db->prepare("INSERT INTO `church` (`website`, `name`, `text`, `email`, `addr1`, `addr2`, `addr3`, `addr4`, `cell1`, `cell2`, `pastor`, `pastor_site`, `time`, `user_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");

		$query->bindValue(1, $website);
		$query->bindValue(2, $name);
		$query->bindValue(3, $text);
		$query->bindValue(4, $email);
		$query->bindValue(5, $addr1);
		$query->bindValue(6, $addr2);
		$query->bindValue(7, $addr3);	
		$query->bindValue(8, $addr4);	
		$query->bindValue(9, $cell1);	
		$query->bindValue(10, $cell2);	
		$query->bindValue(11, $pastor);	
		$query->bindValue(12, $pastor_site);	
		$query->bindValue(13, $time);	
		$query->bindValue(14, $id);	
	

		try{
			$query->execute();

			mail($email, 'Welcome to Tello Church', "Hello " . $username. ",\r\nThank you for registering with us. \r\n\r\n-- Tello Church Team");
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function update_church($website, $name, $text, $email, $addr1, $addr2, $addr3, $addr4, $cell1, $cell2, $pastor, $pastor_site, $id){

		$query = $this->db->prepare("UPDATE `church` SET
								`website`		= ?,
								`name`			= ?,
								`text`			= ?,
								`email`			= ?,
								`addr1`			= ?,
								`addr2`			= ?,
								`addr3`			= ?,
								`addr4`			= ?,
								`cell1`			= ?,
								`cell2`			= ?,
								`pastor`		= ?,
								`pastor_site`	= ?
								
								WHERE `id` 		= ? 
								");

		$query->bindValue(1, $website);
		$query->bindValue(2, $name);
		$query->bindValue(3, $text);
		$query->bindValue(4, $email);
		$query->bindValue(5, $addr1);
		$query->bindValue(6, $addr2);
		$query->bindValue(7, $addr3);	
		$query->bindValue(8, $addr4);	
		$query->bindValue(9, $cell1);	
		$query->bindValue(10, $cell2);	
		$query->bindValue(11, $pastor);	
		$query->bindValue(12, $pastor_site);	
		$query->bindValue(13, $time);	
		$query->bindValue(14, $id);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function churchdata($id) {

		$query = $this->db->prepare("SELECT * FROM `church` WHERE `user_id`= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}
	  	  	 
	public function get_churches() {

		$query = $this->db->prepare("SELECT * FROM `church` ORDER BY `time` DESC");
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}

		return $query->fetchAll();

	}	

}