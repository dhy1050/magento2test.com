<?php
namespace Hanying\HelloWorld\Controller\Hello;
class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        echo '<p>You Did It!</p>';
        var_dump(__METHOD__);
    }    
}