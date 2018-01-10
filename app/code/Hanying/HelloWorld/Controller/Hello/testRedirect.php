<?php
namespace Hanying\HelloWorld\Controller\Hello;
use \Magento\Framework\App\Action\Action;

class testRedirect extends Action 
{
	public function execute() 
	{
		echo "you came here for on moment!!!";
		$this->_redirect("*/*/world");
	}
	
}