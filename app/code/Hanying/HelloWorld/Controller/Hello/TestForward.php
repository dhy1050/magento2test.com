<?php

namespace Hanying\HelloWorld\Controller\Hello;

class TestForward extends \Magento\Framework\App\Action\Action
{
	public function execute()
    {        
        var_dump(__METHOD__); 

        echo "<h1> You came to forward page!!!";
     	$this->_forward('world');
    }    
}