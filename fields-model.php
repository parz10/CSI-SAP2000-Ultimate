<?php

namespace Helpie\Features\Components\Articles;

use \Helpie\Includes\Translations as Translations;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

if (!class_exists('\Helpie\Features\Components\Articles\Fields_Model')) {
    class Fields_Model
    {
        public function __construct()
        {
            $this->category_repository = new \Helpie\Features\Domain\Repositories\Category_Repository();
        }

        public function get_fields()
        {
            $fields = array(
                'title' => $this->get_title_field(),
                'sortby' => $this->get_sortby_field(),
                'topics' => $this->get_topics_field(),
                'num_of_cols' => $this->get_num_of_cols_field(),
                'style' => $this->get_style_field(),
                'limit' => $this->get_limit_field(),
                'show_image' => $this->get_show_image_field(),
                'show_extra' => $this->get_show_extra_field(),
            );

            return $fields;
        }

        public function get_default_args()
        {
            $args = array();

            // Get Default Values from GET - FIELDS
            $fields = $this->get_fields();
            foreach ($fields as $key => $field) {
                $args[$key] = $field['default'];
            }

            return $args;
        }

        // FIELDS
        protected function get_title_field()
        {
            return array(
                'name' => 'title',
                'label' => Translations::get('title'),
                'default' => 'KB Article Listing',
                'type' => 'text',
            );
        }

        protected function get_topics_field()
        {
            $categories_options = $this->category_repository->get_category_options(true); // $show_all = true

            return array(
                'name' => 'topics',
                'label' => Translations::get('topics'),
                'default' => 'all',
                'options' => $categories_options,
                'type' => 'multi-select',
            );
        }

        protected function get_sortby_field()
        {
            return array(
                'name' => 'sortby',
                'label' => Translations::get('sort_by'),
                'default' => 'recent',
                'options' => array(
                    'recent' => Translations::get('recent'),
                    'updated' => Translations::get('recently_updated'),
                    'popular' => Translations::get('popular'),
                    'alphabetical' => Translations::get('alphabetical'),
                ),
                'type' => 'select',
            );
        }

        protected function get_num_of_cols_field()
        {
            return array(
                'name' => 'num_of_cols',
                'label' => Translations::get('num_of_cols'),
                'default' => 'three',
                'options' => array(
                    'one' => 1,
                    'two' => 2,
                    'three' => 3,
                    'four' => 4,
                ),
                'type' => 'select',
            );
        }

        protected function get_style_field()
        {
            return array(
                'name' => 'style',
                'label' => Translations::get('style'),
                'default' => 'list',
                'options' => array(
                    'list' => Translations::get('list'),
                    'card' => Translations::get('card'),
                ),
                'type' => 'select',
            );
        }

        protected function get_limit_field()
        {
            return array(
                'name' => 'limit',
                'label' => Translations::get('limit'),
                'default' => 5,
                'type' => 'number',
            );
        }

        protected function get_show_image_field()
        {
            return array(
                'name' => 'show_image',
                'label' => Translations::get('show_image'),
                'default' => 'true',
                'options' => array(
                    'true' => Translations::get('true'),
                    'false' => Translations::get('false'),
                ),
                'type' => 'select',
            );
        }

        protected function get_show_extra_field()
        {
            return array(
                'name' => 'show_extra',
                'label' => Translations::get('show_extra_info'),
                'default' => 'true',
                'options' => array(
                    'true' => Translations::get('true'),
                    'false' => Translations::get('false'),
                ),
                'type' => 'select',
            );
        }

        // OTHER
    } // END CLASS
}
