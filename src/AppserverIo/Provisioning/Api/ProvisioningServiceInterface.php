<?php

/**
 * AppserverIo\Provisioning\Api\ProvisioningServiceInterface
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

namespace AppserverIo\Provisioning\Api;

use AppserverIo\Psr\Application\ApplicationInterface;
use AppserverIo\Configuration\Interfaces\NodeInterface;
use AppserverIo\Psr\ApplicationServer\ServiceInterface;
use AppserverIo\Psr\ApplicationServer\Configuration\ContainerConfigurationInterface;

/**
 * Interface for a provision service implementations.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2018 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/provisioning
 * @link      http://www.appserver.io
 */
interface ProvisioningServiceInterface extends ServiceInterface
{

    /**
     * (non-PHPdoc)
     *
     * @param string $className The fully qualified class name to return the instance for
     * @param array  $args      Arguments to pass to the constructor of the instance
     *
     * @return object The instance itself
     */
    public function newInstance($className, array $args = array());

    /**
     * (non-PHPdoc)
     *
     * @param string $className The API service class name to return the instance for
     *
     * @return \AppserverIo\Psr\ApplicationServer\ServiceInterface The service instance
     */
    public function newService($className);

    /**
     * Returns the application servers base directory.
     *
     * @param string|null $directoryToAppend Append this directory to the base directory before returning it
     *
     * @return string The base directory
     */
    public function getBaseDirectory($directoryToAppend = null);

    /**
     * Returns the directory structure to be created at first start.
     *
     * @return array The directory structure to be created if necessary
     */
    public function getDirectories();

    /**
     * Returns the files to be created at first start.
     *
     * @return array The files to be created if necessary
     */
    public function getFiles();

    /**
     * Makes the path an absolute path or returns null if passed path is empty.
     *
     * @param string $path A path to absolute
     *
     * @return string The absolute path
     */
    public function makePathAbsolute($path = '');

    /**
     * Returns the servers tmp directory, append with the passed directory.
     *
     * @param \AppserverIo\Psr\ApplicationServer\Configuration\ContainerConfigurationInterface $containerNode        The container to return the temporary directory for
     * @param string                                                                           $relativePathToAppend A relative path to append
     *
     * @return string
     */
    public function getTmpDir(ContainerConfigurationInterface $containerNode, $relativePathToAppend = '');

    /**
     * Returns the servers deploy directory.
     *
     * @param \AppserverIo\Psr\ApplicationServer\Configuration\ContainerConfigurationInterface $containerNode        The container to return the deployment directory for
     * @param string                                                                           $relativePathToAppend A relative path to append
     *
     * @return string
     */
    public function getDeployDir(ContainerConfigurationInterface $containerNode, $relativePathToAppend = '');

    /**
     * Returns the servers webapps directory.
     *
     * @param \AppserverIo\Psr\ApplicationServer\Configuration\ContainerConfigurationInterface $containerNode        The container to return the temporary directory for
     * @param string                                                                           $relativePathToAppend A relative path to append
     *
     * @return string
     */
    public function getWebappsDir(ContainerConfigurationInterface $containerNode, $relativePathToAppend = '');

    /**
     * Returns the servers log directory.
     *
     * @param string $relativePathToAppend A relative path to append
     *
     * @return string
     */
    public function getLogDir($relativePathToAppend = '');

    /**
     * Will return a three character OS identifier e.g. WIN or LIN
     *
     * @return string
     */
    public function getOsIdentifier();

    /**
     * Return's the system's vendor directory.
     *
     * @param string $relativePathToAppend A relative path to append
     *
     * @return string The system's vendor directory
     */
    public function getVendorDir($relativePathToAppend = '');

    /**
     * Return's the system's temporary directory.
     *
     * @param string $relativePathToAppend A relative path to append
     *
     * @return string The system's temporary directory
     */
    public function getSystemTmpDir($relativePathToAppend = '');

    /**
     * Return's the server's base configuration directory.
     *
     * @param string $relativePathToAppend A relative path to append
     *
     * @return string The server's base configuration directory
     */
    public function getEtcDir($relativePathToAppend = '');

    /**
     * Return's the server's main configuration directory.
     *
     * @param string $relativePathToAppend A relative path to append
     *
     * @return string The server's main configuration directory
     */
    public function getConfDir($relativePathToAppend = '');

    /**
     * Return's the server's configuration subdirectory.
     *
     * @param string $relativePathToAppend A relative path to append
     *
     * @return string The server's configuration subdirectory
     */
    public function getConfdDir($relativePathToAppend = '');

    /**
     * Returns the absolute path to the passed directory, also
     * working on Windows.
     *
     * @param string $relativePathToAppend The relativ path to return the absolute path for
     *
     * @return string The absolute path of the passed directory
     */
    public function realpath($relativePathToAppend);

    /**
     * Persists the system configuration.
     *
     * @param \AppserverIo\Configuration\Interfaces\NodeInterface $node A node to persist
     *
     * @return void
     *
     * @throws \AppserverIo\Lang\NotImplementedException Upon call as it did not get implemented yet!
     */
    public function persist(NodeInterface $node);

    /**
     * Parses and returns the directories and files that matches
     * the passed glob pattern in a recursive way (if wanted).
     *
     * @param string  $pattern   The glob pattern used to parse the directories
     * @param integer $flags     The flags passed to the glob function
     * @param boolean $recursive Whether or not to parse directories recursively
     *
     * @return array The directories matches the passed glob pattern
     * @link http://php.net/glob
     */
    public function globDir($pattern, $flags = 0, $recursive = true);

    /**
     * Returns the real server signature depending on the installed
     * appserver version and the PHP version we're running on, for
     * example:
     *
     * appserver/1.0.1-45 (darwin) PHP/5.5.21
     *
     * @return string The server signature
     */
    public function getServerSignature();

    /**
     * Returns the system proprties. If a container node has been passed,
     * the container properties will also be appended.
     *
     * @param \AppserverIo\Psr\ApplicationServer\Configuration\ContainerConfigurationInterface|null $containerNode The container to return the system properties for
     * @param \AppserverIo\Psr\Application\ApplicationInterface                                     $application   The application instance
     *
     * @return \AppserverIo\Properties\Properties The system properties
     */
    public function getSystemProperties(ContainerConfigurationInterface $containerNode = null, ApplicationInterface $application = null);
}
