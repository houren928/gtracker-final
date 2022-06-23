<?php include_once "include/m-session.php";?>

<?php
    class goalController {
    	// constructor
    	function __construct($conn) {
    		$this->conn = $conn;    	
    	}

        // retrieving products data
        public function index() {
            // Retrieve the menteeID that the mentor clicks just now
            $menteeID = $_GET['id'];
            // Initialise a prepared statement
            $sql = "SELECT goal_id, goal_title, goal_start_date, goal_completion_date, goal_completion_flag, goal_progress FROM goal WHERE mentee_id = ?";
            // Create a prepared statement
            $stmt = $this->conn->prepare($sql);
            if($stmt){
                    // The prepared statement is created successfully
                    $stmt -> bind_param('s',$menteeID); 
                    $stmt -> execute();
                    $result = mysqli_stmt_get_result($stmt);
                    if($result -> num_rows > 0){
                        // Fetch all the row results from the execution of sql statement
                        return $result->fetch_all(MYSQLI_ASSOC);
                    }    
            else{
                // The mentor has no any mentee
                return null;
            }           
        }
    }
}
?>