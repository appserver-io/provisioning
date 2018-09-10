<?php

/**
 * AppserverIo\Provisioning\Steps\StepInterface
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

namespace AppserverIo\Provisioning\Steps;

use AppserverIo\Provisioning\Api\Node\StepNode;
use AppserverIo\Psr\ApplicationServer\Configuration\DatasourceConfigurationInterface;

/**
 * Interface for all step implementations.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2018 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/provisioning
 * @link      http://www.appserver.io
 */
interface StepInterface
{

    /**
     * Executes the functionality for this step.
     *
     * @return void
     */
    public function execute();

    /**
     * Injects the step node with the configuration data for this step.
     *
     * @param \AppserverIo\Provisioning\Api\Node\StepNode $stepNode The step node data
     *
     * @return void
     */
    public function injectStepNode(StepNode $stepNode);

    /**
     * Injects the datasource node found in the provisioning configuration.
     *
     * @param \AppserverIo\Psr\ApplicationServer\Configuration\DatasourceConfigurationInterface $datasourceNode The datasource node data
     *
     * @return void
     */
    public function injectDatasourceNode(DatasourceConfigurationInterface $datasourceNode);

    /**
     * Injects the absolute path to the appservers PHP executable.
     *
     * @param string $phpExecutable The absolute path to the appservers PHP executable
     *
     * @return void
     */
    public function injectPhpExecutable($phpExecutable);

    /**
     * Injects the absolute path to the applications folder.
     *
     * @param string $webappPath The absolute path to applications folder
     *
     * @return void
     */
    public function injectWebappPath($webappPath);
}
