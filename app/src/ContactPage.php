<?php

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldComponent;

class ContactPage extends Page
{
    private static $db = [
        'MainTitle_Banner' => 'Varchar(255)',
        'LeadTitle_Banner' => 'Varchar(255)',
        'Title_Info' => 'Varchar(255)',
        'Long_Map' => 'Decimal(9,6)',
        'Lat_Map' => 'Decimal(9,6)',
        'Address_Map' => 'Varchar(255)',
    ];

    private static $has_one = [
        'BannerImage' => Image::class,
    ];

    private static $owns = [
        'BannerImage',
    ];

     private static $has_many = [
        'InfoObjects' => InfoObjects::class,
        'SubinfoObjects' => SubinfoObjects::class
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

        $fields->addFieldToTab('Root.Info',
            TextField::create('Title_Info', 'Title')
        );

        // GridField refer to InfoObjects
        $config = GridFieldConfig_RecordEditor::create();
        $grid = GridField::create(
            'InfoObjects',
            'Info Item',
            $this->InfoObjects(),
            $config
        );
        $fields->addFieldToTab('Root.Info', $grid);

        // GridField refer to SubinfoObjects
        $config = GridFieldConfig_RecordEditor::create();
        $grid = GridField::create(
            'SubinfoObjects',
            'Sub Info Item',
            $this->SubinfoObjects(),
            $config
        );
        $fields->addFieldToTab('Root.Subinfo', $grid);

        $fields->addFieldToTab('Root.Map',
            TextField::create('Long_Map','Longitude')
                ->setAttribute('placeholder', '-6.1754') // contoh Monas Jakarta
        );

        $fields->addFieldToTab('Root.Map',
            TextField::create('Lat_Map','Latitude')
                ->setAttribute('placeholder', '106.8272') // contoh Monas Jakarta
        );

        $fields->addFieldToTab('Root.Map',
            TextareaField::create('Address_Map','Address')

        );

        return $fields;
    }

}

?>