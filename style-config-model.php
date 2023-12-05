<?php
namespace Helpie\Features\Components\Articles;

use \Helpie\Includes\Translations as Translations;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

if (!class_exists('\Helpie\Features\Components\Articles\Style_Config_Model')) {
    class Style_Config_Model
    {
        public function get_config()
        {
            $style_config = array(
                'collection' => array(
                    'name' => 'helpie_articles_listing',
                    'selector' => '.helpie-articles-listing',
                    'label' => Translations::get('article_listing'),
                    'styleProps' => array('background', 'border', 'padding', 'margin'),
                ),
                'title' => array(
                    'name' => 'article_listing_title',
                    'selector' => '.helpie-articles-listing .collection-title',
                    'label' => Translations::get('title'),
                    'styleProps' => array('color', 'typography', 'text-align', 'border', 'padding', 'margin'),
                ),
                'title_icon' => array(
                    'name' => 'article_listing_title_icon',
                    'selector' => '.helpie-articles-listing .collection-title i',
                    'label' => Translations::get('title_icon'),
                    'styleProps' => array('icon', 'position', 'color'),
                ),
                'element' => array(
                    'name' => 'helpie_element',
                    'selector' => '.helpie-articles-listing .helpie-element',
                    'label' => Translations::get('single_item'),
                    'styleProps' => array('background', 'border', 'padding', 'margin'),
                    'children' => array(
                        'title' => array(
                            'name' => 'helpie_element_title',
                            'selector' => '.helpie-articles-listing .helpie-element .header',
                            'label' => Translations::get('single_item_title'),
                            'styleProps' => array('color', 'typography', 'text-align', 'border'),
                        ),
                        'content' => array(
                            'name' => 'helpie_element_content',
                            'selector' => '.helpie-articles-listing .helpie-element .item-content',
                            'label' => Translations::get('single_item_content'),
                            'styleProps' => array('text-align'),
                        ),
                        'icon' => array(
                            'name' => 'helpie_element_icon',
                            'selector' => '.helpie-articles-listing .helpie-element i',
                            'label' => Translations::get('single_item_icon'),
                            'styleProps' => array('color'),
                        ),

                    ),
                ),
            );

            return $style_config;
        }
    }
}
