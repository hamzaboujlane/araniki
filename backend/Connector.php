<?php
include_once('Iconfig.php');

abstract class Connector
{
	private $host;
	private $user;
	private $pswd;
	private $name;

	public function __construct()	{
		$this->host = self::HOST;
		$this->user = self::USER;
		$this->pswd = self::PSWD;
		$this->name = self::NAME;
		$hookup = $this->connect($this->host, $this->user, $this->pswd, $this->name);
	}
	private function connect()
	{

	}
}
?>