<?php

namespace Swiftly\TwigBridge;

use Swiftly\Template\TemplateInterface;
use Twig\Environment;

/**
 * Provides a bridge between Twig and Swiftly
 *
 * @author clvarley
 */
Class TwigBridge Implements TemplateInterface
{

    /** @var Environment $twig */
    private $twig;

    /**
     * Wrap the underlying Twig engine
     *
     * @param Environment $twig Twig engine
     */
    public function __construct( Environment $twig )
    {
        $this->twig = $twig;
    }

    /**
     * Render the given Twig template
     *
     * @no-named-arguments
     * @param string $template Template path
     * @param mixed[] $context Template context
     * @return string          Rendered contents
     */
    public function render( string $template, array $context = [] ) : string
    {
        return $this->twig->render( $template, $context );
    }
}
