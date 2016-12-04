<?php
/**
 * Category ArchiveTemplate
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */
/* Template Name: Category Archive */

use Vrec\Category\Controller\Archive as Controller;
use Vrec\Vendor\Twig\Template;

get_header();
$template = new Template(new Controller());
$template->render();
get_footer();