<?php
use PHPUnit\Framework\TestCase;

class webdavTest extends TestCase{
	public function testgetUrl(){
		$server ="owncloud.localhost.com/";
		$WD = new webdav($server);
		$this->assertEquals($WD->getUrlMoodle(),"owncloud.localhost.com/remote.php/webdav/");
		
	}
}

?>
