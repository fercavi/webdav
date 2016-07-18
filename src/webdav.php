<?php

class webdav{
	private $server;
	private $user;
	private $pass;
	private $url;
	private $handle;

	public function __construct($server){
		$this->server = $server;
		$this->url = $server."remote.php/webdav/";
	}
	public function getUrl(){
		return $this->url;
	}
	public function connect($user,$pass){
		$this->handle = curl_init();
		$this->user = $user;
		$this->pass = $pass;
	}
	public function getFolder(){
		curl_setopt($this->handle, CURLOPT_URL, $this->url);
		curl_setopt($this->handle, CURLOPT_HEADER, 0);
		curl_setopt($this->handle, CURLOPT_USERPWD, $this->user.":".$this->pass);
		curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->handle, CURLOPT_CUSTOMREQUEST, 'PROPFIND');
		$data=curl_exec($this->handle);			
		return($data);
	}
	public function getFile($path){
		curl_setopt($this->handle, CURLOPT_URL, $this->url.$path);
		curl_setopt($this->handle, CURLOPT_HEADER, 0);
		curl_setopt($this->handle, CURLOPT_USERPWD, $this->user.":".$this->pass);
		curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->handle, CURLOPT_CUSTOMREQUEST, 'GET');		
		$data=curl_exec($this->handle);		
		return($data);
	}
	public function getHandle(){
		return $this->handle;
	}
	public function putFile($source,$target){

		curl_setopt($this->handle, CURLOPT_URL, $this->url.$target);
		curl_setopt($this->handle, CURLOPT_HEADER, 0);
		curl_setopt($this->handle, CURLOPT_USERPWD, $this->user.":".$this->pass);		
		curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, true);	
		curl_setopt($this->handle, CURLOPT_PUT,1);
		curl_setopt($this->handle, CURLOPT_CUSTOMREQUEST, 'PUT');
		$fh_res = fopen($source, 'r');
		curl_setopt($this->handle, CURLOPT_INFILE, $fh_res);
		curl_setopt($this->handle, CURLOPT_INFILESIZE, filesize($source));		
		$data=curl_exec($this->handle);			
		return($data);	

	}

}
	

?>
