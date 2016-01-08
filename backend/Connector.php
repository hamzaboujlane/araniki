<?php
include_once('IConfig.php');

abstract class Connector implements IConfig
{
	private $host = self::HOST;
	private $user = self::USER;
	private $pswd = self::PSWD;
	private $name = self::NAME;
	private $hook;

	protected function open()
	{
		return $this->hook = $this->connect($this->host, $this->user, $this->pswd, $this->name);
	}

	protected function close()
	{
		$hook = $this->hook;
		if (!$hook) {
			die('bad...bad, so bad close');
		}

		$hook->close();
	}

	protected function connect($host, $user, $pswd, $name)
	{
		$con = new mysqli($host, $user, $pswd, $name);
		if ($con->connect_errno) {
			die('bad...bad, so bad connect: ' . $con->connect_error);
		}
		return $con;
	}
}

?>