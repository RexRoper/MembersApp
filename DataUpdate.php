<?php
class DataUpdate
{
   private $hookup;
   private $tableMaster;
   private $sql;
   //Fields
   private $id;
   private $first_name;
   private $last_name;
   private $email;
   private $dob;
   private $lang;
   
   public function __construct()
   {
      $this->id=intval($_POST['id']);
      $this->first_name=$_POST['first_name'];
      $this->last_name=$_POST['last_name'];
      $this->email=$_POST['email'];
      $this->dob=$_POST['dob'];
      $this->lang=$_POST['lang'];
        
      $this->tableMaster="birdtable";
      $this->hookup=UniversalConnect::doConnect();
      
       //Call each update
      $this->doFName();
      $this->doLName();
      $this->doEmail();
      $this->doDob();
      $this->doLang();
	
	//Close once
      $this->hookup->close();
   }
   
   private function doFName()
   {
      $this->sql ="UPDATE $this->tableMaster SET first_name='$this->first_name' WHERE id='$this->id'";
      try
      {
	 $result = $this->hookup->query($this->sql);
	 echo "First Name update complete.<br />";
      }
      catch(Exception $e)
      {
	 echo "Here's what went wrong: " . $e->getMessage();
      } 
   }

private function doLName()
   {
      $this->sql ="UPDATE $this->tableMaster SET last_name='$this->last_name' WHERE id='$this->id'";
      try
      {
	 $result = $this->hookup->query($this->sql);
	 echo "Last Name update complete.<br />";
      }
      catch(Exception $e)
      {
	 echo "Here's what went wrong: " . $e->getMessage();
      } 
   }

private function doEmail()
   {
      $this->sql ="UPDATE $this->tableMaster SET email='$this->email' WHERE id='$this->id'";
      try
      {
	 $result = $this->hookup->query($this->sql);
	 echo "Email update complete.<br />";
      }
      catch(Exception $e)
      {
	 echo "Here's what went wrong: " . $e->getMessage();
      } 
   }
   
private function doDob()
   {
      $this->sql ="UPDATE $this->tableMaster SET dob='$this->dob' WHERE id='$this->id'";
      try
      {
	 $result = $this->hookup->query($this->sql);
      	 echo "Birthday update complete.<br />";
      }
      catch(Exception $e)
      {
	 echo "Here's what went wrong: " . $e->getMessage();
      } 
   }

private function doLang()
   {
      $this->sql ="UPDATE $this->tableMaster SET lang='$this->lang' WHERE id='$this->id'";
      try
      {
	 $result = $this->hookup->query($this->sql);
      	 echo "Lang update complete.<br />";
      }
      catch(Exception $e)
      {
	 echo "Here's what went wrong: " . $e->getMessage();
      } 
   }
}
?>