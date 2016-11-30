<?php
/**
 * Archive Service Template
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */
/* Template Name: Service Archive */

use Vrec\Recipe\Controller\Archive as Controller;
use Vrec\Vendor\Twig\Template;

get_header();
$template = new Template(new Controller());
$template->render();
get_footer();