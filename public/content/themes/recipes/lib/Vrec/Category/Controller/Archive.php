<?php
/**
 * Category Archive Controller
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace Vrec\Category\Controller;

use Vrec\Vendor\Twig\TwigInterface;
use Vrec\Category\Meta\Archive as Meta;

/**
 * Class Single
 *
 * @package Vrec\Recipe\Controller;
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Archive implements TwigInterface
{
    /**
     * The twig template name/location
     *
     * @const
     * @type string
     * @since 1.0
     */
    const TWIG_TEMPLATE_NAME = 'category/archive';

    /**
     * Returns the name of the Twig Template to use
     *
     * @return string
     * @since 1.0
     */
    public function getTemplateName()
    {
        return self::TWIG_TEMPLATE_NAME;
    }

    /**
     * Returns the data for Twig
     *
     * @return array
     * @since 1.0
     */
    public function getTwigData()
    {
        $twigData = array();
        $meta = new Meta();
        $twigData['title']      = $meta->getTitle();
        $twigData['recipes']    = $meta->getRecipes();

        return $twigData;
    }
}