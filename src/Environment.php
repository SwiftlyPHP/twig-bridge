<?php

namespace Swiftly\TwigBridge;

use Swiftly\Config\Store;

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

    /** @var string $template_dir */
    private $template_dir = 'app/view';

    /**
     * Create a new template environment from the provided config
     *
     * @param Config $config Application configuration
     */
    public function __construct( Store $config )
    {
        $this->config = $config;
        $this->cache_dir = (string)$this->config->get( 'cache.dir', '' );
    }

    public function getCacheDir() : string
    {
        return $this->cache_dir;
    }

    public function setCacheDir( string $cache_dir ) : void
    {
        $this->cache_dir = $cache_dir;
    }

    public function getTemplateDir() : string
    {
        return $this->template_dir;
    }

    public function setTemplateDir( string $template_dir ) : void
    {
        $this->template_dir = $template_dir;
    }
}
