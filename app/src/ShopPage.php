<?php

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldComponent;

class ShopPage extends Page
{
    private static $db = [
        'MainTitle_Banner' => 'Varchar(255)',
        'LeadTitle_Banner' => 'Varchar(255)',
    ];

    private static $has_one = [
        'BannerImage' => Image::class,
    ];

    private static $owns = [
        'BannerImage',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Banner',
            TextField::create('MainTitle_Banner', 'Main Title')
        );


        $fields->addFieldToTab('Root.Banner',
            TextField::create('LeadTitle_Banner', 'Lead Title')
        );

         // Upload field for BannerImage
        $fields->addFieldToTab(
            'Root.Banner',
            UploadField::create('BannerImage', 'Upload Banner Image')
        );


        return $fields;
    }
}

?>