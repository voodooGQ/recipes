<?php
/**
 * Hours Template
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */
/* Template Name: Hours */

use Vrec\Hours\Controller;
use Vrec\Vendor\Twig\Template;

get_header();
$template = new Template(new Controller());
$template->render();
get_footer();