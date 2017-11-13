<?php
class DataEntry
{
	//Variable for MySql connection
	private $hookup;
	private $sql;
	private $tableMaster;
	
	//Field Variables
	private $first_name;
	private $last_name;
	private $email;
	private $phone;
	private $street;
	private $city;
	private $state;
	private $zip;
	private $dob;
	private $choice;
	
	public function __construct()
	{
	    //Get table name and make connection
            $this->tableMaster="birdtable";
	    $this->hookup=UniversalConnect::doConnect();
	    
	    //Get data from HTML form
	    $this->first_name=$_POST['first_name'];
	    $this->last_name=$_POST['last_name'];
	    $this->email=$_POST['email'];
	    $this->phone=$_POST['phone'];
	    $this->street=$_POST['street'];
	    $this->city=$_POST['city'];
	    $this->state=$_POST['state'];
	    $this->zip=$_POST['zip'];
	    $this->dob=$_POST['dob'];
	    $this->choice=$_POST['choice'];
	    
	    //Call private methods for MySql operations
	    $this->doInsert();
	    $this->hookup->close();
	}

	private function doInsert()
	{
		$this->sql = "INSERT INTO $this->tableMaster (first_name,last_name,email,phone,street,city,state,zip,dob,choice) VALUES ('$this->first_name','$this->last_name','$this->email','$this->phone','$this->street','$this->city','$this->state','$this->zip','$this->dob',$this->choice')";

		try
		{	
			$this->hookup->query($this->sql);
			printf("User first name: %s <br/> User last name: %s <br/> Email: %s <br/> Phone: %s <br/> City: %s <br> State: %s <br> Zip: %s <br> Birthday: %s <br/> Likes %s the most.",$this->first_name,$this->last_name,$this->email,$this->phone,$this->street,$this->city,$this->state,$this->zip,$this->dob,$this->choice);
		}
	
		catch (Exception $e)
		{
			echo "There is a problem: " . $e->getMessage();
			exit();
		}
	}
}
?>
