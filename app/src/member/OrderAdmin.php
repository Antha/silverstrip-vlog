<?php

use SilverStripe\Admin\ModelAdmin;

class OrderAdmin extends ModelAdmin {
    private static $menu_title = 'Orders';
    private static $url_segment = 'ordres';
    private static $menu_icon_class = 'font-icon-checklist';

    private static $managed_models = [
        OrderObjects::class
    ];

    public function getEditForm($id = null, $fields = null) {
        $form = parent::getEditForm($id, $fields);

        if ($this->modelClass === OrderObjects::class) {
            $grid = $form->Fields()->fieldByName($this->sanitiseClassName($this->modelClass));
            $config = $grid->getConfig();

            // Ganti kolom Status dengan versi badge
            $config->getComponentByType(\SilverStripe\Forms\GridField\GridFieldDataColumns::class)
                ->setDisplayFields([
                    'ID' => 'Order ID',
                    'Member.FirstName'  => 'Member',
                    'Product.Title' => 'Product',
                    'StatusBadge' => 'Status',
                    'DateTime'  => 'Added At'
                ]);
        }

        return $form;
    }

}
