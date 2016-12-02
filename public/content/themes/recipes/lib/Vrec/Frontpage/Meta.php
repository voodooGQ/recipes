<?php
/**
 * Frontpage Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace Vrec\Frontpage;

use Vrec\Theme\MetaParent;
use Vrec\Theme\Image;

/**
 * Class Meta
 *
 * @package Vrec\Frontpage\Meta
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Meta extends MetaParent {
    /**
     * Get the url for the primary logo
     *
     * @return string
     */
    public function getLogoUrl()
    {
        return get_template_directory_uri() . '/assets/media/images/logo.png';
    }
}