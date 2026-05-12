<?php

use SilverStripe\ORM\DataObject;

class CategoryObjects extends DataObject {
    private static $db = [
        'Title' => 'Varchar(255)'
    ];

    private static $has_many = [
        'Products' => ProductObjects::class
    ];

    private static $summary_fields = [
        'Title' => 'Category Product Title'
    ];
}
