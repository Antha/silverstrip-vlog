<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;

class FooterTextConfig extends DataExtension
{
    private static $db = [
        'FooterText'    => 'Varchar(255)',
    ];

    public function updateCMSFields(\SilverStripe\Forms\FieldList $fields)
    {
        $fields->addFieldsToTab('Root.FooterText', [
            TextField::create('FooterText', 'Footer Text'),
        ]);
    }
}
