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
class Single implements TwigInterface
{
    /**
     * The twig template name/location
     *
     * @const
     * @type string
     * @since 1.0
     */
    const TWIG_TEMPLATE_NAME = 'recipe/single';

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
     * @param int $postId
     * @return array
     * @since 1.0
     */
    public function getTwigData($postId = null)
    {
        global $post;
        $id = null;

        if(!empty($postId)) {
            $id = $postId;
        } else if($post) {
            $id = $post->ID;
        }

        $twigData = array();

        if($id) {
            $meta = new Meta($id);
        }

        return $twigData;
    }
}