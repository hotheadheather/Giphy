<?php

 error_reporting (E_ALL ^ E_NOTICE); 
 # hard fast statement about removing error of the screen - undefined index for sanitize()
 
 session_start();

// class to handle interaction with the user_table table
class LoginCredentials {

	// stores the data for a news article
	var $dataArray = array();
	
	// stores a list of errors from validation
	var $errors = array();
	
	// stores a connection to the database
	var $db = null;
	
	function __construct() {
        // create a connection to our database
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441_2022;charset=utf8', 
            'wvd441_2022_user', 'advanced_php');
			
		//var_dump($this->db);
	}
		
	// stores the array to the property on the class
	function set($dataArray) {
		$this->dataArray = $dataArray;
	}
	
	function login($id) {
        // flag to track if the article was loaded
        $isLoaded = false;

        // load from database
        // create a prepared statement (secure programming)
        $stmt = $this->db->prepare("SELECT * FROM user_table WHERE user_id = ?");
        
        // execute the prepared statement passing in the id of the article we 
        // want to load
        $stmt->execute(array($id));

        // check to see if we loaded the article
        if ($stmt->rowCount() == 1) {
            // if we did load the article, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($dataArray);
            
            // set the data to our internal property            
            $this->set($dataArray);
                        
            // set the success flag to true
            $isLoaded = true;
        }
        
        //var_dump($stmt->rowCount());
        
        // return success or failure
        return $isLoaded;
	}
		
	function load($id) {
        // flag to track if the article was loaded
        $isLoaded = false;

        // load from database
        // create a prepared statement (secure programming)
        $stmt = $this->db->prepare("SELECT * FROM user_table WHERE user_id = ?");
        
        // execute the prepared statement passing in the id of the article we 
        // want to load
        $stmt->execute(array($id));

        // check to see if we loaded the article
        if ($stmt->rowCount() == 1) {
            // if we did load the article, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($dataArray);
            
            // set the data to our internal property            
            $this->set($dataArray);
                        
            // set the success flag to true
            $isLoaded = true;
        }
        
        //var_dump($stmt->rowCount());
        
        // return success or failure
        return $isLoaded;
	}

    // save a news article (inserts and updates)
    function save() {
        // create a flag to track if the save was successful
        $isSaved = false;
        
        // determine if insert or update based on user_id
        // save data from dataArray property to database
        if (empty($this->dataArray['user_id'])) {
							
            // create a prepared statement to insert data into the table
            $stmt = $this->db->prepare(
                "INSERT INTO user_table 
                    (user_name, pass_word, user_level) 
                 SELECT ?,?,?");

            // execute the insert statement, passing in the data to insert
            $isSaved = $stmt->execute(array(
                    $this->dataArray['user_name'],
                    $this->dataArray['pass_word'],
                    $this->dataArray['user_level']
                   
                )
            );
            
            // if the execute returned true, then store the new id back into our 
            // data property
            if ($isSaved) {
                $this->dataArray['user_id'] = $this->db->lastInsertId();
            }
        } else { 
			// if this is an update of an existing record, create a prepared update 
			// statement
            $stmt = $this->db->prepare(
                "UPDATE user_table SET 
                    user_name = ?,
                    pass_word = ?,
                    user_level = ?
                WHERE user_id = ?"
            );
                    
            // execute the update statement, passing in the data to update
            $isSaved = $stmt->execute(array(
                    $this->dataArray['user_name'],
                    $this->dataArray['pass_word'],
                    $this->dataArray['user_level'],
                    $this->dataArray['user_id']
                )
            );            
        }
                        
        // return the success flage
        return $isSaved;
    }

	// TODO: implement the sanitize function that will sanitize the article data
	function sanitize($dataArray) {	

		
	// sanitize string filter
		$dataArray['user_name'] = filter_var($dataArray['user_name'], FILTER_SANITIZE_STRING);
	    $dataArray['pass_word'] = filter_var($dataArray['pass_word'], FILTER_SANITIZE_STRING);
		$dataArray['user_level'] = filter_var($dataArray['user_level'], FILTER_SANITIZE_NUMBER_INT);
	
		return $dataArray;
	}
	
	// TODO: implement validations for the article data
	function validate() {	

		$isValid = true;

		if (empty($this->dataArray['user_name'])) {
			$this->errors['user_name'] = "username is required";
			$isValid = false;
			
		}
		
		if (empty($this->dataArray['pass_word'])) {
			$this->errors['pass_word'] = "password is required";
			$isValid = false;
			
		}
		
	
		if (empty($this->dataArray['user_level'])) {
			$this->errors['user_level'] = "user level is required";
			$isValid = false;
			var_dump($this->dataArray['user_level']);
		}
		
		
			if (!preg_match("/^[1-4]$/", $this->dataArray['user_level'])) {
			$this->errors['user_level'] = "user_level range is between 1-4";
			$isValid = false;
		} 

	
		return $isValid;
	}
    
	function getListFiltered($searchColumn = null, $searchFor = null, $sortColumn = null, $sortDirection = null) {
		$dataList = array();
		$searchColumn = filter_var($searchColumn, FILTER_SANITIZE_STRING);
		$sortColumn = filter_var($sortColumn, FILTER_SANITIZE_STRING);
		$sortDirection = filter_var($sortDirection, FILTER_SANITIZE_STRING);
		
		$sql = "SELECT * FROM user_table ";

		// check we received search parameters
		if (!is_null($searchColumn) && !empty($searchColumn) && !is_null($searchFor) && !empty($searchFor)) {
			$sql .= "WHERE " . $searchColumn . " LIKE ? ";
		}

		if (!is_null($sortColumn) && !empty($sortColumn) && !is_null($sortDirection) && !empty($sortDirection)) {
			$sql .= " ORDER BY " . $sortColumn . " " . $sortDirection;
		}

//var_dump($sql, $searchColumn, $searchFor, $sortColumn, $sortDirection);die;
		
		$stmt = $this->db->prepare($sql);
		
		$stmt->execute(array(
			'%' . $searchFor . '%'
		));
		
        if ($stmt->rowCount() > 0) {
            $dataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }		
		
		return $dataList;
	}
	
    // get a list of news articles as an array    
    function getList() {
        $dataList = array();

        // TODO: get the news articles and store into $dataList
        $sql = "SELECT user_id, user_name, pass_word, user_level FROM user_table ORDER BY user_id";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $dataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
               
        // return the list of articles
        return $dataList;        
    }    
}
?>