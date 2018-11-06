<?php

/**
 * AppserverIo\Provisioning\Api\Node\AbstractArgsNodeTest
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/provisioning
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Provisioning\Api\Node;

/**
 * Test for the abstract node that serves nodes having a args/arg child.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/provisioning
 * @link      http://www.appserver.io
 */
class AppstractArgsNodeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The mock instance of the abstract class.
     *
     * @var \AppserverIo\Provisioning\Api\Node\AbstractArgsNode
     */
    protected $abstractArgsNode;

    /**
     * Initializes an instance of the abstract class we want to test.
     *
     * @return void
     * @see \PHPUnit_Framework_TestCase::setUp()
     */
    protected function setUp()
    {
        $this->abstractArgsNode = $this->getMockForAbstractClass('AppserverIo\Provisioning\Api\Node\AbstractArgsNode');
    }

    /**
     * Make sure we don't have any args before we add one.
     *
     * @return void
     */
    public function testGetEmptyArgsArray()
    {
        $this->assertCount(0, $this->abstractArgsNode->getArgs());
    }

    /**
     *Test to load an not existing arg by name.
     *
     * @return void
     */
    public function testGetNotExistingArgByName()
    {
        $this->assertNull($this->abstractArgsNode->getArg('unknown'));
    }

    /**
     * Test to return args as array.
     *
     * @return void
     */
    public function testGetArgsWithOneAttached()
    {

        // create an mock arg node
        $mockArgNode = $this->getMock('AppserverIo\Provisioning\Api\Node\ArgNode');

        // attach the arg node
        $this->abstractArgsNode->attachArg($mockArgNode);

        // make sure we've exactly one arg node
        $this->assertCount(1, $this->abstractArgsNode->getArgs());
    }

    /**
     * Test to return hundred args as array.
     *
     * @return void
     */
    public function testGetArgsWithHundredAttached()
    {

        // add 100 args to the node
        for ($i = 0; $i < $counter = 100; $i++) {

            // create an mock arg node
            $mockArgNode = $this->getMock('AppserverIo\Provisioning\Api\Node\ArgNode');

            // attach the arg node
            $this->abstractArgsNode->attachArg($mockArgNode);
        }

        // make sure we've exactly one arg node
        $this->assertCount($counter, $this->abstractArgsNode->getArgs());
    }

    /**
     *Test to load an existing arg by name.
     *
     * @return void
     */
    public function testGetExistingArgByName()
    {

        // create an mock arg node
        $mockArgNode = $this->getMock('AppserverIo\Provisioning\Api\Node\ArgNode', array('getName', 'castToType'));
        $mockArgNode->expects($this->once())
            ->method('getName')
            ->will($this->returnValue($name = 'test'));
        $mockArgNode->expects($this->once())
            ->method('castToType')
            ->will($this->returnValue($value = 100));

        // attach the arg node
        $this->abstractArgsNode->attachArg($mockArgNode);

        // make sure we've exactly one arg node
        $this->assertSame($value, $this->abstractArgsNode->getArg($name));
    }

    /**
     * Test to load args converted to a simple array.
     *
     * @return void
     */
    public function testGetArgsAsArray()
    {

        // create an mock arg node
        $mockArgNode = $this->getMock('AppserverIo\Provisioning\Api\Node\ArgNode', array('getName', 'castToType'));
        $mockArgNode->expects($this->once())
            ->method('getName')
            ->will($this->returnValue($name = 'test'));
        $mockArgNode->expects($this->once())
            ->method('castToType')
            ->will($this->returnValue($value = 100));

        // attach the arg node
        $this->abstractArgsNode->attachArg($mockArgNode);

        // make sure we've the expected array
        $this->assertEquals(array($name => $value), $this->abstractArgsNode->getArgsAsArray());
    }
}
