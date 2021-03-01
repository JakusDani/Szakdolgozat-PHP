<?php
	class Adatbazis
	{
		//online
		/*public $servername = "mysql.omega:3306";
		public $username = "szakdogadb";
		public $password = "GT6gRqC!kg49mnx";
		public $dbname = "szakdogadb";*/
		//helyi
		public $servername = "localhost:3306";
		public $username = "root";
		public $password = "";
		public $dbname = "szakdogadb";
		public $sql = NULL;
		public $result = NULL;
		public $row = NULL;
	
		public function __construct(){ self::kapcsolodas(); }
		public function __destruct(){ self::kapcsolatbontas(); }
	
		public function kapcsolodas()
		{
			$this->conn = new mysqli($this->servername, 
						   $this->username, 
						   $this->password, 
						   $this->dbname);
			if ($this->conn->connect_error)
			{
			die("Connection failed: " . $this->conn->connect_error);
			}
			$this->conn->query("SET NAMES 'UTF8'");
		}
		public function kapcsolatbontas()
		{
			$this->conn->close();
		}
	}
 ?>