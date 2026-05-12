<?php

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Assets\Image;

class SubscribeConfig extends DataExtension
{
    private static $db = [
        'SubscribeHeading'    => 'Varchar(255)',
        'SubscribeSubheading' => 'Text',
        'SubscribeButtonText' => 'Varchar(50)',
        'SubscribePlaceholder'=> 'Varchar(255)',
    ];

    private static $has_one = [
        'BackgroundImage' => Image::class,
    ];

    private static $owns = [
        'BackgroundImage',
    ];

    public function updateCMSFields(\SilverStripe\Forms\FieldList $fields)
    {
        $fields->addFieldsToTab('Root.FooterSubscribe', [
            TextField::create('SubscribeHeading', 'Heading'),
            TextareaField::create('SubscribeSubheading', 'Subheading'),
            TextField::create('SubscribeButtonText', 'Button Text'),
            TextField::create('SubscribePlaceholder', 'Input Placeholder'),
            UploadField::create('BackgroundImage', 'Upload Banner Image')
        ]);
    }
}
