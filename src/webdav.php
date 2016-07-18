<?php

class webdav{
	private $server;
	private $user;
	private $pass;
	private $urlMoodle;
	public function __construct($server){
		$this->server = $server;
		$this->urlMoodle = $server."remote.php/webdav/";
	}
	public function getUrlMoodle(){
		return $this->urlMoodle;
	}
}
	

?>
