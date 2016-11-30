<?php
/**
 * Single Service Template
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

use Vrec\Service\Controller\Single as Controller;
use Vrec\Vendor\Twig\Template;

get_header();
$template = new Template(new Controller());
$template->render();
get_footer();