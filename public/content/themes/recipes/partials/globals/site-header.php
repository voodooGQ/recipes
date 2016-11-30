<?php
/**
 * Site Header Partial
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

use Vrec\Landmark\Controller\Header;
use Vrec\Vendor\Twig\Template;

$controller = new Header();
$template = new Template($controller);
$template->render();