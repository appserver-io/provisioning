<?php

/**
 * \AppserverIo\Provisioning\Api\Node\StepNode
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
 * @copyright 2018 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/provisioning
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Provisioning\Api\Node;

use AppserverIo\Description\Annotations as DI;
use AppserverIo\Description\Api\Node\AbstractNode;
use AppserverIo\Description\Api\Node\ParamsNodeTrait;
use AppserverIo\Provisioning\Configuration\StepConfigurationInterface;

/**
 * DTO to transfer a applications provision configuration.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2018 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/provisioning
 * @link      http://www.appserver.io
 */
class StepNode extends AbstractNode implements StepConfigurationInterface
{

    /**
     * A params node trait.
     *
     * @var \AppserverIo\Description\Api\Node\ParamsNodeTrait
     */
    use ParamsNodeTrait;

    /**
     * The step type
     *
     * @var string
     * @DI\Mapping(nodeType="string")
     */
    protected $type;

    /**
     * The node containing the information to execute something like a script.
     *
     * @var \AppserverIo\Provisioning\Api\Node\ExecuteNode
     * @DI\Mapping(nodeName="execute", nodeType="AppserverIo\Provisioning\Api\Node\ExecuteNode")
     */
    protected $execute;

    /**
     * Returns the step type
     *
     * @return string The step type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the node containing installation information.
     *
     * @return \AppserverIo\Provisioning\Api\Node\InstallationNode The node containing installation information
     */
    public function getExecute()
    {
        return $this->execute;
    }
}
