<?php
class Banco{
			private $host, $user , $password, $dbname ,$conn, $query;
			function __construct(){
					$this->host = "localhost";
					$this->user = "root";
					$this->password ="kalleu123";
					$this->dbname = "sistema";
					self::start();
			}
			function start(){
					$this->conn = mysqli_connect("$this->host","$this->user","$this->password", "$this->dbname");
			}
			function exeQuery($qry){
				$this->query = mysqli_query($this->conn, $qry);
				return $this->query;
			}
		}

?>
