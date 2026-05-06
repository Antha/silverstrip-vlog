<?php

use SilverStripe\ORM\DataObject;

class HeaderMenuItem extends DataObject {
    private static $db = [
        'Title' => 'Varchar(255)',
        'Link' => 'Varchar(255)',
        'Sort' => 'Int'
    ];

    private static $default_sort = 'Sort ASC';

    private static $summary_fields = [
        'Title' => 'Judul',
        'Link' => 'URL'
    ];
}
