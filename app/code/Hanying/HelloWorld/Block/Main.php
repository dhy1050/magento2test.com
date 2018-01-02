<?php
namespace Hanying\HelloWorld\Block;

use Magento\Framework\View\Element\Template;

class Main extends Template
{    
    protected function _prepareLayout()
    {
    	$this->setMessage('hello, i test the message to you');

    	$this->setName($this->getRequest()->getParam('name'));

    }

    public function getTest()
    {
    	$a = "you get your test";

    	$c = $this->getRequest()->getparam('email');

    	$d = $this->setEmail($c);
    	return $d->getEmail() . $a;
    }
}