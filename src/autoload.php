<?php
function __autoload($classe){
	if(file_exists("../src/{$classe}.php")){
		require_once("../src/{$classe}.php");
	}
        if(file_exists("src/{$classe}.php")){
                require_once("src/{$classe}.php");
        }

	
	
}

?>
