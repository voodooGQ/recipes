<?php
/**
 * Site Footer Partial
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

use Vrec\Landmark\Controller\Footer;
use Vrec\Vendor\Twig\Template;

$controller = new Footer();
$template = new Template($controller);
$template->render();