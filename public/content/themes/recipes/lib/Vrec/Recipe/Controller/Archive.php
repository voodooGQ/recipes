<?php
/**
 * Recipe Archive Controller
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */
namespace Vrec\Recipe\Controller;

use Vrec\Vendor\Twig\TwigInterface;
use Vrec\Recipe\Meta\Archive as Meta;
use Vrec\Theme\Image as Image;

/**
 * Class Archive
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
    const TWIG_TEMPLATE_NAME = 'service/archive';

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
            $imageMeta = Image::getImageMeta(get_post_thumbnail_id($post->ID));

            $twigData['title']                      = $meta->getPostTitle();
            $twigData['featured_image_src']         = $imageMeta['urls']['hero'];
            $twigData['featured_image_src_mobile']  = $imageMeta['urls']['hero_mobile'];
            $twigData['content']                    = $meta->getPostContent();
            $twigData['services']                   = $meta->getPosts();
        }

        return $twigData;
    }
}