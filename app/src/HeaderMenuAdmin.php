<?php

use SilverStripe\Admin\ModelAdmin;

class HeaderMenuAdmin extends ModelAdmin {
    private static $managed_models = [
        HeaderMenuItem::class
    ];

    private static $url_segment = 'header-menu';
    private static $menu_title = 'Header Menu';
}
