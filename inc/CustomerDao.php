<?php
    class CustomerDao {
    	
    	private $host="localhost";
    	private $user = "tsp";
    	private $password="tsp";
    	private $database="ecomerce";
    	
	protected $db;
	public function __construct(){
	    $this->db = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", $this->user, $this->password);
	}
	
	public static function GetInstance() {
	    static $dao;
	    if( $dao == NULL ) {
		$dao = new CustomerDao();
	    }
	    return $dao;
	}
	
	public function addCustomer( $firstName, $lastName, $username, $password ) {
	    $STH = $this->db->prepare("INSERT INTO `Customers`( `FirstName`, `LastName`, `UserName`, `Password` ) VALUES ( :firstName, :lastName, :userName, :password)" );
	    $STH->bindParam(':firstName', $firstName );
	    $STH->bindParam(':lastName', $lastName );
	    $STH->bindParam(':userName', $username );
	    $STH->bindParam(':password', md5( $password ) );
	    $STH->execute();
	    return $this->db->lastInsertId();
	}
	
	public function authCustomer( $username, $password ) {
	    $STH = $this->db->prepare(  "SELECT `CustomerId` FROM `Customers` WHERE `UserName` = :userName AND `Password` = :pass" );
	    $STH->bindParam(':userName', $username );
	    $STH->bindParam(':pass', md5( $password ) );
	    $STH->execute();
	    if ( $STH->rowCount() == 0 ) return null;
	    return $STH->fetch()['CustomerId'];
	}
	
	public function getCustomer( $customerId ) {
	    $STH = $this->db->prepare(  "SELECT * FROM `Customers` WHERE `CustomerId` = :cusId" );
	    $STH->bindParam(':cusId', $customerId );
	    $STH->execute();
	    return $STH->fetch();
	}
	
    }
    
?>