<?php 
class Business{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}

	public function insert_business($website, $name, $text, $email, $addr1, $addr2, $addr3, $addr4, $cell1, $cell2, $id){

		global $db;

		$query 	= $this->db->prepare("INSERT INTO `business` (`website`, `name`, `text`, `email`, `addr1`, `addr2`, `addr3`, `addr4`, `cell1`, `cell2`, `user_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");

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
		$query->bindValue(11, $id);	

		try{
			$query->execute();

			mail($email, 'Welcome to Tello Business', "Hello " . $username. ",\r\nThank you for registering with us. \r\n\r\n-- Tello Business Team");
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function update_business($website, $name, $text, $email, $addr1, $addr2, $addr3, $addr4, $cell1, $cell2, $id){

		$query = $this->db->prepare("UPDATE `business` SET
								`website`		= ?,
								`name`			= ?,
								`text`			= ?,
								`email`			= ?,
								`addr1`			= ?,
								`addr2`			= ?,
								`addr3`			= ?,
								`addr4`			= ?,
								`cell1`			= ?,
								`cell2`			= ?
								
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
		$query->bindValue(11, $id);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function businessdata($id) {

		$query = $this->db->prepare("SELECT * FROM `business` WHERE `user_id`= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}
	  	  	 
	public function get_businesses() {

		$query = $this->db->prepare("SELECT * FROM `business` ORDER BY `time` DESC");
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}

		return $query->fetchAll();

	}

	public function insert_need($b_id, $what, $when, $budget, $time){

		global $db;

		$time 		= time();

		$query 	= $this->db->prepare("INSERT INTO `needs` (`b_id`, `what`, `when`, `budget`, `time`) VALUES (?, ?, ?, ?, ?) ");

		$query->bindValue(1, $b_id);
		$query->bindValue(2, $what);
		$query->bindValue(3, $when);
		$query->bindValue(4, $budget);
		$query->bindValue(5, $time);

		try{
			$query->execute();

			mail($email, 'Tello Business Notification', "Hello " . $username. ",\r\nYour need is now live, check your emails and calls daily to see if anyone can help you. \r\n\r\n-- Tello Business Team");
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function update_need($id, $what, $when, $budget, $time){

		$time 		= time();

		$query = $this->db->prepare("UPDATE `needs` SET
								`what`		= ?,
								`when`		= ?,
								`budget`	= ?,
								`time`		= ?
								
								WHERE `id` 	= ? 
								");

		$query->bindValue(1, $what);
		$query->bindValue(2, $when);
		$query->bindValue(3, $budget);
		$query->bindValue(4, $email);
		$query->bindValue(5, $time);
		$query->bindValue(6, $id);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function needsdata($id) {

		$status = 'Active'; 

		$query = $this->db->prepare("SELECT * FROM `needs` WHERE `id`= ? AND `status`= ? ");
		$query->bindValue(1, $id);
		$query->bindValue(2, $status);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}		

	public function insert_offer($b_id, $need_id, $text, $time){

		global $db;

		$time 		= time();

		$query 	= $this->db->prepare("INSERT INTO `offers` (`b_id`, `need_id`, `text`, `time`) VALUES (?, ?, ?, ?) ");

		$query->bindValue(1, $b_id);
		$query->bindValue(2, $need_id);
		$query->bindValue(3, $text);
		$query->bindValue(4, $time);

		try{
			$query->execute();

			mail($email, 'Tello Business Notification', "Hello " . $username. ",\r\nYour offer is now live, check your emails and calls daily to see if your offer has been accepted. \r\n\r\n-- Tello Business Team");
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function update_offer($id, $text, $time){

		$time 		= time();

		$query = $this->db->prepare("UPDATE `offers` SET
								`text`		= ?,
								`time`		= ?
								
								WHERE `id` 	= ? 
								");

		$query->bindValue(1, $text);
		$query->bindValue(2, $time);
		$query->bindValue(3, $id);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function offerdata($id, $need_id) { 

		$query = $this->db->prepare("SELECT * FROM `offers` WHERE `id`= ? AND `need_id`= ? ");
		$query->bindValue(1, $id);
		$query->bindValue(2, $need_id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}

	public function accept_offer($id, $b_id, $status){

		$time 		= time();
		$status 	= 'Accepted';

		$query = $this->db->prepare("UPDATE `offers` SET
								`status`	= ?
								
								WHERE `id` 	= ? AND `b_id` = ?  
								");

		$query->bindValue(1, $status);
		$query->bindValue(2, $id);
		$query->bindValue(3, $b_id);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}	

}