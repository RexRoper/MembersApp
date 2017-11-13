<?php
class DataDisplay
{
	//Variable for MySql connection
	private $hookup;
	private $sql;
	private $tableMaster;
	
	public function __construct()
	{
	    //Get table name and make connection
            $this->tableMaster="birdtable";
	    $this->hookup=UniversalConnect::doConnect();
	    $this->doDisplay();
	    $this->hookup->close();	
	}
	
	private function doDisplay()
	{
            //Create Query Statement
	    $this->sql ="SELECT * FROM $this->tableMaster";
	
	    try
	    {
		$result = $this->hookup->query($this->sql);

		while ($row = $result->fetch_assoc()) 
		{
		    printf("ID: %s <br />First Name: %s <br />Last Name: %s <br />Email: %s <br />Date Of Birth: %s <br />Prefered Code: %s<p />",$row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['dob'], $row['lang']);
		}
                
		$result->close();
	    }
	    catch(Exception $e)
	    {
		echo "Here's what went wrong: " . $e->getMessage();
	    }
	}
}
?>