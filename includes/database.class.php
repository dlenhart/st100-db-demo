<?php
/*
	Author:  Drew D. Lenhart
	http://www.drewlenhart.com
	Page: database.class.php
	Desc: Get connected to DB.	
	*/
class database
{
    public $pdo;
    private static $instance;

	private function __construct(){
		$db_username = "";  //database username
		$db_password = "";  //database password
		$db_name = "";  //database name
		$host = "";  //usually localhost
        
	try{
		$this->pdo = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password);
	}
		catch ( PDOException $exception ){
            	echo "Connection error :" . $exception ->getMessage();
	}
    }

	public static function getInstance(){
		if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
    
    //Grab single entry
    function getDataSingle($query){
        $queryEx = $this->pdo->prepare($query);
        $queryEx->execute();
        return $queryEx->fetch(PDO::FETCH_ASSOC);
    }
    
    //Grab multiple entries
    function getData($query){
        $queryEx = $this->pdo->prepare($query);
        $queryEx->execute();
        return $queryEx->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //use update for Delete, or Update queries
    function updateData($query){
	$queryEx = $this->pdo->prepare($query);		
	$queryEx->execute();
	return;
    }
    
    //insert into app_info (old method, specific to table)
    function insertDataApp($title, $location, $img, $sum){
        $data = array(
            ':Title' => $title,
            ':Location' => $location,
            ':Img' => $img,
            ':Summary' => $sum);
        $query = 'INSERT INTO app_info (Title, Location, Img_loc, Summary) VALUES (:Title,:Location,:Img,:Summary)';
        $queryEx = $this->pdo->prepare($query);
        return $queryEx->execute($data);
    }

    //insert data
    function insertData($query, $data){
        $queryEx = $this->pdo->prepare($query);
        return $queryEx->execute($data);
    }
    
    //close connection
    function closeConn(){
	$this->pdo = null;		
    }
}

?>