<?php 
    use SilverStripe\Admin\ModelAdmin;

    class CategoriesAdmin extends ModelAdmin {
        private static $menu_title = "Categories Admin";
        private static $url_segment = 'categories';

        private static $managed_models = [
            VideoCategory::class
        ];
    }
?>