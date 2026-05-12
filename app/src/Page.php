<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;

    class Page extends SiteTree
    {
        private static $db = [];

        private static $has_one = [];

        public function ProductObjects() {
            return ProductObjects::get();
        }

         public function CategoryObjects() {
            return CategoryObjects::get();
        }
    }
}
