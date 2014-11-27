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

// Mail
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	$this->sendEmail();
    }

    private function sendEmail ()
    {
		$message = new Message();
		$message->addTo('matthew@zend.com')
        	->addFrom('ralph.schindler@zend.com')
        	->setSubject('Greetings and Salutations!')
        	->setBody("Sorry, I'm going to be late today!");

		// Setup SMTP transport using LOGIN authentication
		$transport = new SmtpTransport();
		$options   = new SmtpOptions(array(
		    //'name'              => 'localhost.localdomain',
		    'host'              => 'mailtrap.io',
		    'port'				=> 465,
		    'connection_class'  => 'login',
		    'connection_config' => array(
		        'username' => '2600189c78ecf24bd',
		        'password' => 'ffe778660e905d',
		    ),
		));
		$transport->setOptions($options);
		$transport->send($message);
    }
}
