<?php
use PHPUnit\Framework\TestCase;

class webdavTest extends TestCase{
	public function testgetUrl(){
		$server ="owncloud.localhost.com/";
		$WD = new webdav($server);
		$this->assertEquals($WD->getUrl(),"owncloud.localhost.com/remote.php/webdav/");
		
	}
	public function testGetFolder(){
		$server ="owncloud.localhost.com/";
		$WD = new webdav($server);
		$WD->connect("admin","lliurex");
		$folder = $WD->getFolder();
		$this->assertStringStartsWith("<?xml version",$folder);
	}
	public function testGetFile(){
		$server ="owncloud.localhost.com/";
		$WD = new webdav($server);
		$WD->connect("admin","lliurex");
		$file = $WD->getFile("/test.xml");//
		$this->assertStringStartsWith("<?xml version",$file);				
	}
	public function testPutFile(){
		$server ="owncloud.localhost.com/";
		$WD = new webdav($server);
		$WD->connect("admin","lliurex");
		$source = "/tmp/p.txt";
		$target = "/p.txt";
		$file = $WD->putFile($source,$target);
		
		//$this->assertStringStartsWith("<?xml version",$file);					
	}
}

?>
