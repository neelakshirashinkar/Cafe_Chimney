<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "blog_samples";
	private $con;
	
	function __construct() {
		$this->con = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->con,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->con,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}

	function insert($query) {
		$query_run = mysqli_query($this->con,$query);
                // if($query_run){
                //     echo'<script type="text/javascript">alert(Order Placed!")</script>';
                // }
                // else{
                //     echo'<script type="text/javascript">alert(Error!")</script>';
                // }
	}
}
?>