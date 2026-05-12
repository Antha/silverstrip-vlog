<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\SiteConfig\SiteConfig;

class ContactItem extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(255)',
        'Subtitle' => 'Text',
    ];

    private static $has_one = [
        'SiteConfig' => SiteConfig::class
    ];

    private static $summary_fields = [
        'Title' => 'Title',
        'Subtitle' => 'Subtitle',
    ];

    private static $table_name = 'ContactItem';
}
