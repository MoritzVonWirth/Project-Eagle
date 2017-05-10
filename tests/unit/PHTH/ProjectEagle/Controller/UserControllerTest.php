<?php
namespace PHTH\ProjectEagle\Controller;


class UserControllerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testIfShowActionReturnsString()
    {
        $controller = new UserController();

        $this->assertTrue(is_string($controller->showAction()));
    }
}