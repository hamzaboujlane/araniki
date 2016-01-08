<?php
include_once('Connector.php');

class Client extends Connector
{
	private $hookup;
	public $table;
	public $column;

	public function __construct()
	{
		$this->hookup = $this->open();
	} 

	private function query($q)
	{
		$link = $this->hookup;
		$result = $link->query($q);
		if($link->errno) {
			die('bad...bad, so bad query: ' . $link->error);
		}
		return $result;
	}

	public function table($name)
	{
		return $this->table = $name;
	}

	public function column($name)
	{
		return $this->column = $name;
	}

	public function insert($table , $column, $value)
	{
		$q = "INSERT INTO $table ( $column ) VALUES (' $value ')";
		$this->query($q);
		echo 'Done';
	}

	public function select($table, $column)
	{
		$q = "SELECT $column FROM $table";
		$this->query($q);
		echo 'Done';
	}
}

$use = new client();


$table = $use->table('user');
$column = $use->column('name');
$value = 'hamza';
$use->insert($table, $column, $value);
?>