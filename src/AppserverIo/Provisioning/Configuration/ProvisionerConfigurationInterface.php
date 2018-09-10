<?php

/**
 * AppserverIo\Provisioning\Configuration\ProvisionerConfigurationInterface
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

namespace AppserverIo\Provisioning\Configuration;

use AppserverIo\Configuration\Interfaces\NodeInterface;

/**
 * Interface for a provisioner node configuration implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2018 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/provisioning
 * @link      http://www.appserver.io
 */
interface ProvisionerConfigurationInterface extends NodeInterface
{

    /**
     * Returns the provisioner type.
     *
     * @return string The provisioner type
     */
    public function getType();

    /**
     * Returns the provisioner name.
     *
     * @return string The provisioner name
     */
    public function getName();
}
