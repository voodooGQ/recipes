<?php
/**
 * The Recipe Post Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace Vrec\Recipe\Meta;

use Vrec\Theme\MetaParent;

/**
 *
 * Class Single
 *
 * @package Vrec\Recipe\Meta
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Single extends MetaParent {

    /**
     * Measurement conversion associations
     *
     * @const
     * @var array
     * @since 1.0
     */
    var $measurementConversions = array(
        'teaspoon'      => 'tsp',
        'tablespoon'    => 'tbl',
        'fluid_ounce'   => 'fl oz.',
        'gill'          => 'gill',
        'cup'           => 'cup',
        'pint'          => 'pint',
        'quart'         => 'quart',
        'gallon'        => 'gallon',
        'milliliter'    => 'ml',
        'liter'         => 'liter',
        'deciliter'     => 'dl',
        'pound'         => 'lb',
        'ounce'         => 'oz.',
        'milligram'     => 'mg',
        'gram'          => 'gram',
        'kilogram'      => 'kg',
        'millimeter'    => 'mm',
        'centimeter'    => 'cm',
        'meter'         => 'meter',
        'inch'          => 'inch',
        'foot'          => 'foot'
    );

    /**
     * Return an array of ingredient sections and their ingredient lists
     *
     * @return array
     * @since 1.0
     */
    public function getIngredients()
    {
        $output = array();

        if(have_rows('ingredient_section')) {
            while(have_rows('ingredient_section')) { the_row();
                $section = array();
                $section['title'] = get_sub_field('ingredient_section_title');
                $section['ingredients'] = array();
                if(have_rows('ingredients')) {
                    while(have_rows('ingredients')) { the_row();
                        $ingredient = array();
                        $ingredient['quantity'] = $this->quantityConversion(
                            get_sub_field('quantity'),
                            get_sub_field('measurement')
                        );
                        $ingredient['measurement'] = $this->measurementConversion(
                            get_sub_field('quantity'),
                            get_sub_field('measurement')
                        );
                        $ingredient['ingredient'] = get_sub_field('ingredient');
                        array_push($section['ingredients'], $ingredient);
                    }
                }
                array_push($output, $section);
            }
        }

        return $output;
    }

    public function getInstructions()
    {
        $output = array();

        if(have_rows('instruction_section')) {
            while(have_rows('instruction_section')) { the_row();
                $section = array();
                $section['title'] = get_sub_field('instruction_section_title');
                $section['instructions'] = get_sub_field('instructions');
                array_push($output, $section);
            }
        }

        return $output;
    }

    /**
     * Convert the name of the measurement to the display version and add a plural if appropriate
     *
     * @param number $quantity
     * @param string $measurement
     * @return mixed|string
     */
    public function measurementConversion($quantity, $measurement) {
        $converted = $this->measurementConversions[$measurement];

        if($quantity > 1) {
            if($measurement == 'cup' || $measurement == 'pint' || $measurement == 'quart' || $measurement == 'gallon'
                || $measurement == 'liter' || $measurement == 'gram' || $measurement == 'meter' || $measurement == 'inch') {
                $converted = $converted . 's';
            }
        }

        return $converted;
    }

    /**
     * Quantity conversion from decimal to fraction (in specific measurement cases)
     *
     * @param number $quantity
     * @param string $measurement
     * @return null|string
     */
    public function quantityConversion($quantity, $measurement)
    {
        if ($measurement == 'tablespoon' || $measurement == 'teaspoon' || $measurement == 'cup'
            || $measurement == 'gallon' || $measurement == 'liter' || $measurement == 'pound') {

            $whole = floor($quantity);
            $decimal = $quantity - $whole;
            $fraction = null;

            if ($decimal) {
                switch ($decimal) {
                    case 0.25:
                        $fraction = ' 1/4';
                        break;
                    case 0.5:
                        $fraction = ' 1/2';
                        break;
                    case 0.75:
                        $fraction = ' 3/4';
                        break;
                }
            }

            $quantity = ($whole > 0) ? $whole . $fraction : $fraction;
        }

        return $quantity;
    }

}