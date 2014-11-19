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

class UserController extends AbstractActionController
{
    public function indexAction()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        // create a user
        /*$user = new \Application\Entity\User();
        $user->setUsername('bmorrison');
        $em->persist($user);*/

        // create new address

        $addresses = $em->find('Application\Entity\User', 2)->getAddresses();

        /*for ($i=0;$i<10;$i++) {

            $address = new \Application\Entity\Address();
            $address->setName('1 high street');
            $em->persist($address); 

            // get our user and the address
            $user->getAddresses()->add($address);
            $address->setUser($user);
        }*/

        // delete user
        /*$user = $em->find('Application\Entity\User', 1);
        $em->remove($user);*/

        //$em->flush();

        return new ViewModel(array("addresses" => $addresses));
        //return new JsonModel(array("addresses" => $addresses));
    }
}
