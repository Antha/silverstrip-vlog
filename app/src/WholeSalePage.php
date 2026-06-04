<?php

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldComponent;

class WholeSalePage extends Page
{
    private static $db = [
        'MainTitle_Banner' => 'Varchar(255)',
        'LeadTitle_Banner' => 'Varchar(255)',
        'SolutionsLeadTitle' => 'Varchar(255)'
    ];

    private static $has_one = [
        'BannerImage' => Image::class,
        'TermConditionImage' => Image::class,
        'SolutionsImage' => Image::class,
    ];

    private static $owns = [
        'BannerImage',
        'TermConditionImage',
        'SolutionsImage'
    ];

    private static $has_many = [
        'TermObjects' => TermObjects::class,
        'SolutionObjects' => SolutionObjects::class,
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
        
        // Upload field for Term & Condition Image
        $fields->addFieldToTab(
            'Root.Terms & Conditions',
            UploadField::create('TermConditionImage', 'Upload Image')
        );

        $config = GridFieldConfig_RecordEditor::create();

        $grid = GridField::create(
            'TermObjects',        
            'Terms & Conditions',         
            $this->TermObjects(),
            $config
        );

        $fields->addFieldToTab(
            'Root.Terms & Conditions',                
            $grid
        );

        $fields->addFieldToTab(
            'Root.Solutions',
            UploadField::create('SolutionsImage', 'Upload Image')
        );

        $fields->addFieldToTab(
            'Root.Solutions',
            TextField::create('SolutionsLeadTitle', 'Lead Title')
        );
        
        $config = GridFieldConfig_RecordEditor::create();

        $grid = GridField::create(
            'SolutionObjects',        
            'Solutions',         
            $this->SolutionObjects(),
            $config
        );

        $fields->addFieldToTab(
            'Root.Solutions',                
            $grid
        );

        return $fields;
    }

}
