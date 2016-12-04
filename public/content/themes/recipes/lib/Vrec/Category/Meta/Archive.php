<?php
/**
 * Category Archive Template Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace Vrec\Category\Meta;

use Vrec\Theme\MetaParent;
use Vrec\Recipe\Query;
use Vrec\Recipe\Controller\Single as Recipe;

/**
 * Class Archive
 *
 * @package Vrec\Category\Meta
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Archive extends MetaParent {
    /**
     * Retrieve all categories, a link, and an image of a recipe within that category
     *
     * @return array
     */
    public function getCategories()
    {
        $output = array();
        $categories = get_categories();

        foreach($categories as $category) {
            if($category->slug === 'uncategorized') { continue; }

            $query = Query::randomRecipeByCategory($category->ID);
            $recipe = new Recipe();
            $recipe = $recipe->getTwigData($query->posts[0]);

            $entry = array(
                'title'     => $category->name,
                'permalink' => get_category_link($category->term_id),
                'image'     => $recipe['featured_image_cta']
            );

            array_push($output, $entry);
        }

        return $output;
    }
}