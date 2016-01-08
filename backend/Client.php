<?php
include_once('Connector.php');

class Client extends Connector
{
	private $hookup;

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

}

$use = new client();
?>