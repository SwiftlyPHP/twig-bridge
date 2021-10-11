<?php

namespace Swiftly\TwigBridge;

use Swiftly\TwigBridge\Environment as AppConfig;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/**
 * Handles creating the Twig filesystem loader and environment
 *
 * @author clvarley
 */
Class Factory
{

    /** @var AppConfig $config */
    private $config;

    /**
     * Create factory using the provided app config
     *
     * @param AppConfig $config Application configuration
     */
    public function __construct( AppConfig $config )
    {
        $this->config = $config;
    }

    /**
     * Create a new Twig FilesystemLoader for this application
     *
     * @return FilesystemLoader Template loader
     */
    public function newLoader() : FilesystemLoader
    {
        return new FilesystemLoader(
            $this->config->getTemplateDir()
        );
    }

    /**
     * Create a new Twig Environment for this application
     *
     * @return Environment Twig environment
     */
    public function newEnvironment() : Environment
    {
        $loader = $this->newLoader();

        return new Environment( $loader, [
            'debug' => $this->config->isDebug(),
            'cache' => $this->config->getCacheDir() ?: false
        ]);
    }
}
