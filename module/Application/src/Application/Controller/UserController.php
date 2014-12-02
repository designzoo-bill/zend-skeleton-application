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
use Doctrine\ORM\EntityManager;

class UserController extends AbstractActionController
{
    public function indexAction()
    {
        //$this->createTestData();

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $addresses = $em->find('Application\Entity\User', 1)->getAddresses();
        return new ViewModel(array("addresses" => $addresses));
    }

    private function createTestData()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        // create the db
        $tool = new \Doctrine\ORM\Tools\SchemaTool($em);

        $classes = array(

            $em->getClassMetadata('Application\Entity\User'),
            $em->getClassMetadata('Application\Entity\Address')
        );

        $tool->dropSchema($classes);

        $tool->createSchema($classes);

        // create a user
        $user = new \Application\Entity\User();
        $user->setUsername('bmorrison');
        $em->persist($user);

        // create new addresses
        for ($i=0;$i<10;$i++) {

            $address = new \Application\Entity\Address();
            $address->setName('1 high street');
            $em->persist($address); 

            // get our user and the address
            $user->getAddresses()->add($address);
            $address->setUser($user);
        }

        $em->flush();
    }    
}
