<?php

namespace Swiftly\TwigBridge;

use Swiftly\Config\Store;

use function in_array;

/**
 * Utility used to manage Twig and environment configuration
 *
 * @author clvarley
 */
Class Environment
{

    /** @var Store $config */
    private $config;

    /** @var string $cache_dir */
    private $cache_dir;

    /** @var string $root_dir */
    private $root_dir = '';

    /** @var string $template_dir */
    private $template_dir = 'app/view';

    /**
     * Create a new template environment from the provided config
     *
     * @param Store $config Application configuration
     */
    public function __construct( Store $config )
    {
        $this->config = $config;
        $this->cache_dir = (string)$this->config->get( 'cache.dir', '' );
    }

    public function getCacheDir() : string
    {
        return "{$this->root_dir}{$this->cache_dir}";
    }

    public function setCacheDir( string $cache_dir ) : void
    {
        $this->cache_dir = $cache_dir;
    }

    public function getRootDir() : string
    {
        return $this->root_dir;
    }

    public function setRootDir( string $root_dir ) : void
    {
        $this->root_dir = $root_dir;
    }

    public function getTemplateDir() : string
    {
        return "{$this->root_dir}{$this->template_dir}";
    }

    public function setTemplateDir( string $template_dir ) : void
    {
        $this->template_dir = $template_dir;
    }

    /**
     * Determine whether we are currently running in dev mode
     *
     * @return bool Is development?
     */
    public function isDev() : bool
    {
        return in_array( $this->config->get( 'core.environment' ),
            ['dev', 'development'],
            true
        );
    }

    /**
     * Determine whether debug mode is enabled
     *
     * @return bool Is debug?
     */
    public function isDebug() : bool
    {
        return ( $this->isDev()
            && $this->config->get( 'core.warnings', false )
        );
    }
}
