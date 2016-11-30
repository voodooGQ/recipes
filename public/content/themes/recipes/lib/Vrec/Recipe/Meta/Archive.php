<?php
/**
 * The Recipe Archive Post Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace Vrec\Recipe\Meta;

use Vrec\Theme\MetaParent;
use Vrec\Recipe\Query;
use Vrec\Recipe\Controller\Single;

/**
 * Class Archive
 *
 * @package Vrec\Recipe\Meta
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0.1
 */
class Archive extends MetaParent
{
    /**
     * Pull in all twig related posts data
     *
     * @return array
     * @since 1.0
     */
    public function getPosts()
    {
        $query = Query::allRecipes();
        $services = array();

        foreach($query->posts as $service) {
            $controller = new Single();
            array_push($services, $controller->getTwigData($service->ID));
        }
        return $services;
    }
}