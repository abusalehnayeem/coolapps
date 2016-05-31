<?php
class DBInsert
{
    private $conn;
	public $info;

    public function create_connection()
	{
		global $conn;
		global $cofg;

		$host=$cofg['dbcon']['host'];
		$user=$cofg['dbcon']['user'];
		$passwd=$cofg['dbcon']['passwd'];
		$dbname=$cofg['dbcon']['dbname'];

		$this->conn = mysql_connect($host,$user,$passwd);

		if (!$this->conn) die('Could not connect');
		mysql_select_db($dbname,$this->conn);
		return $this->conn;
	}

	public function conn_close()
	{
		mysql_close($this->conn);
	}

	static public function instance()
	{
		static $objdb;
		if(!isset($objdb))
			$objdb=new DBInsert();
		return $objdb;
	}

        public function insert($sql,$link) /*Modification by Nayeem 20-05-2010*/
	{
		if (mysql_query($sql, $link))
		{
                    return TRUE;  /*Modification by Nayeem 20-05-2010*/
		}
		else
                    {
                 echo "Error In Registering".mysql_error();
                 return FALSE;
                }
	}

	public function update($sql,$link)
	{
		if (mysql_query($sql, $link))
		{
		}
		else
    		echo "Error updating data: ".mysql_error();
	}

	public function delete($sql,$link)
	{
		if (mysql_query($sql, $link))
    	{
		}
		else
    		echo "Error deleting data: ".mysql_error();
	}

	public function dataSeekProject($sql,$link)
	{
		$result=mysql_query($sql,$link) or die("Error in sql".mysql_error());
		$i=0;
		while($var=mysql_fetch_object($result))
		{
			$value[$i++]=$var;
		}
		return $value;
	}
}

?>
