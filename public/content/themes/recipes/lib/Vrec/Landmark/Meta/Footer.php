<?php
/**
 * Footer Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace Vrec\Landmark\Meta;

use Vrec\Theme\MetaParent;
use Vrec\Landmark\Controller\Menu;

/**
 * Class Footer
 *
 * @package Vrec\Post\Meta\Site
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Footer extends MetaParent {
    /**
     * Get the copyright string
     *
     * @return string
     * @since 1.0
     */
    public function getCopyright()
    {
        return '&copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.';
    }
}