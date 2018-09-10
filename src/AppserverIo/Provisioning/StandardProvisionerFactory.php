<?php

/**
 * AppserverIo\Provisioning\StandardProvisionerFactory
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

namespace AppserverIo\Provisioning;

use AppserverIo\Psr\Application\ApplicationInterface;
use AppserverIo\Provisioning\Configuration\ProvisionerConfigurationInterface;

/**
 * Factory for the standard provisioner.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2018 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/provisioning
 * @link      http://www.appserver.io
 */
class StandardProvisionerFactory
{

    /**
     * The main method that creates a new provisioner instance.
     *
     * @param \AppserverIo\Psr\Application\ApplicationInterface                         $application              The application instance to register the provisioner with
     * @param \AppserverIo\Provisioning\Configuration\ProvisionerConfigurationInterface $provisionerConfiguration The provisioner configuration
     *
     * @return void
     */
    public static function visit(ApplicationInterface $application, ProvisionerConfigurationInterface $provisionerConfiguration)
    {

        // load the initial context
        $initialContext = $application->getInitialContext();

        // initialize the bean manager
        $provisioner = new StandardProvisioner($initialContext, $provisionerConfiguration);

        // attach the instance
        $application->addProvisioner($provisioner, $provisionerConfiguration);
    }
}
