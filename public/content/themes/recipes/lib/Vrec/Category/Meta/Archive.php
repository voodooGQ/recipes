<?php
/**
 * Category Archive Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace Vrec\Category\Meta;

use Vrec\Theme\Image;
use Vrec\Recipe\Query;
use Vrec\Recipe\Controller\Single as Recipe;

/**
 * Class Meta
 *
 * @package Vrec\Category\Meta
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Archive {

    /**
     * The ID of the current Category
     *
     * @var int|null
     */
    var $categoryId = null;

    /**
     * Archive constructor
     */
    public function __construct()
    {
        $categories = get_the_category();
        $this->categoryId = $categories[0]->cat_ID;
    }

    /**
     * Return the recipes for the category
     */
    public function getRecipes()
    {
        $query = Query::recipeByCategory($this->categoryId);
        $recipes = array();

        foreach($query->posts as $post) {
            $recipe = new Recipe();
            array_push($recipes, $recipe->getTwigData($post->ID));
        }

        return $recipes;
    }
}