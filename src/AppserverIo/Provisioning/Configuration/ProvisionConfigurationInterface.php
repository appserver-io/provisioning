<?php

/**
 * AppserverIo\Provisioning\Configuration\ProvisionConfigurationInterface
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
use AppserverIo\Psr\ApplicationServer\Configuration\DatasourceConfigurationInterface;

/**
 * Interface for a provision node configuration implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2018 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/provisioning
 * @link      http://www.appserver.io
 */
interface ProvisionConfigurationInterface extends NodeInterface
{

    /**
     * Injects the datasource node.
     *
     * @param \AppserverIo\Psr\ApplicationServer\Configuration\DatasourceConfigurationInterface $datasource The datasource node to inject
     *
     * @return void
     */
    public function injectDatasource(DatasourceConfigurationInterface $datasource);

    /**
     * Returns the node containing datasource information.
     *
     * @return \AppserverIo\Psr\ApplicationServer\Configuration\DatasourceConfigurationInterface The node containing datasource information
     */
    public function getDatasource();

    /**
     * Returns the node containing installation information.
     *
     * @return \AppserverIo\Provisioning\Api\Node\InstallationNode The node containing installation information
     */
    public function getInstallation();

    /**
     * This method reprovisions the provision node with the data from the file passed as parameter.
     *
     * Before reinitializing the provisioning node, the file will be reinterpreted with be invoking
     * the PHP parser again, what again gives you the possibility to replace content by calling the
     * PHP methods of this class.
     *
     * @param string $provisionFile The absolute pathname of the file to reprovision from
     *
     * @return void
     */
    public function reprovision($provisionFile);

    /**
     * This method merges the installation steps of the passed provisioning node into the steps of
     * this instance. If a installation node with the same type already exists, the one of this
     * instance will be overwritten.
     *
     * @param \AppserverIo\Provisioning\Api\Node\ProvisionNode $provisionNode The node with the installation steps we want to merge
     *
     * @return void
     */
    public function merge(ProvisionConfigurationInterface $provisionNode);
}
