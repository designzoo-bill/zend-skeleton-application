<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Doctrine\ORM\EntityManager;
use Zend\View\Exception\RuntimeException;

// Mail
use Zend\Mail\Message;
use Zend\ServiceManager;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	$this->sendEmail();
    }

    private function sendEmail ()
    {
		$message = new Message();
		$message->addTo('bill@thedesignzoo.co.uk')
        	->addFrom('ralph.schindler@zend.com')
        	->setSubject('Greetings and Salutations!')
        	->setBody("Sorry, I'm going to be late today!");

        $transport = $this->getServiceLocator()->get('mailTransport');
        
		$transport->send($message);
    }
}
