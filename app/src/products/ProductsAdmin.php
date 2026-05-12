<?php 
    use SilverStripe\Admin\ModelAdmin;

    class ProductsAdmin extends ModelAdmin {
        private static $menu_title = "Products";
        private static $url_segment = 'products';

        private static $managed_models = [
            ProductObjects::class,
            CategoryObjects::class
        ];
    }
?>