<?php

namespace ApplicationTest\Controller;

use ApplicationTest\Bootstrap;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use Application\Controller\UserController;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use PHPUnit_Framework_TestCase;
use Doctrine\ORM\EntityManager;

class UserControllerTest extends \PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    protected function setUp()
    {
        $serviceManager = Bootstrap::getServiceManager();
        $this->controller = new UserController();
        $this->request    = new Request();
        $this->routeMatch = new RouteMatch(array('controller' => 'user'));
        $this->event      = new MvcEvent();
        $config = $serviceManager->get('Config');
        $routerConfig = isset($config['router']) ? $config['router'] : array();
        $router = HttpRouter::factory($routerConfig);

        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($serviceManager);
    }

    public function testIndexAction()
    {
        // Specify which action to run
        $this->routeMatch->setParam('action', 'index');
 
        // Kick the controller into action
        $result = $this->controller->dispatch($this->request);

        // Check the HTTP response code
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
        
        // Check for a ViewModel to be returned
        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result);
 
        // Test the parameters contained in the View model
        $vars = $result->getVariables();
        $this->assertTrue(isset($vars['addresses']));
        
        // test address count
        $this->assertEquals(10, count($vars['addresses']));
    }
}