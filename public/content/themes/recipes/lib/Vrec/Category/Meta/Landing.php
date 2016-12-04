<?php
/**
 * Category Landing Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace Vrec\Category\Meta;

use Vrec\Recipe\Query;
use Vrec\Recipe\Controller\Single as Recipe;

/**
 * Class Meta
 *
 * @package Vrec\Category\Meta
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Landing {

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
        $category = get_category(
            get_query_var('cat')
        );
        $this->categoryId = $category->cat_ID;
    }

    /**
     * Get the Category Title
     *
     * @return string
     */
    public function getTitle()
    {
        return get_cat_name($this->categoryId);
    }

    /**
     * Return the recipes for the current category
     *
     * @return array
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