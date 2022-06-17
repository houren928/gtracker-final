<?php  include_once "include/config.php";?>
<?php include_once "include/m-session.php";?>

<?php
    class mentorController {
    	// constructor
    	function __construct($conn) {
    		$this->conn = $conn;    	
    	}

        // retrieving products data
        public function index() {
            // Retrieve all the mentees having "this" mentor
            $sql =  "SELECT * FROM user WHERE user_type='mentor'";            
            $result =  $this->conn->query($sql);            
            if($result->num_rows > 0) {      
                // The mentor has mentees   
                return $result->fetch_all(MYSQLI_ASSOC); // Fetch "all" the rows having the same mentor_id as an associative array and store in an indexed array 
            }
            else{
                // The mentor has no any mentee
                return null;
            }  
           $this-> conn -> close();         
        }
    }
    ?>