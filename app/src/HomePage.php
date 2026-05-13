<?php

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldComponent;

class HomePage extends Page
{
    private static $db = [
        'MainTitle_Banner' => 'Varchar(255)',
        'LeadTitle_Banner' => 'Varchar(255)',
        'ButtonText_Banner' => 'Varchar(255)',
        'ButtonLink_Banner' => 'Varchar(255)',
    ];

    private static $has_one = [
        'BannerImage' => Image::class,
    ];

    private static $has_many = [
        'WcuObjects' => WcuObjects::class,
    ];

    private static $owns = [
        'BannerImage',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Upload field for BannerImage
        $fields->addFieldToTab(
            'Root.Banner',
            UploadField::create('BannerImage', 'Upload Banner Image')
        );

        // Tambahkan field teks
        $fields->addFieldToTab(
            'Root.Banner',
            TextField::create('MainTitle_Banner', 'Main Title')
        );

        $fields->addFieldToTab(
            'Root.Banner',
            TextField::create('LeadTitle_Banner', 'Lead Title')
        );

        $fields->addFieldToTab(
            'Root.Banner',
            TextField::create('ButtonText_Banner', 'Button Text')
        );

        $fields->addFieldToTab(
            'Root.Banner',
            TextField::create('ButtonLink_Banner', 'Button Link')
        );

        // GridField refer to WcuObjects
        $config = GridFieldConfig_RecordEditor::create();
        $grid = GridField::create(
            'WcuObjects',
            'Why Choose Us Items',
            $this->WcuObjects(),
            $config
        );
        $fields->addFieldToTab('Root.Why Choose Us', $grid);

        return $fields;
    }
}
