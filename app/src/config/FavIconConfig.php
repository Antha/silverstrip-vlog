<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;

class FavIconConfig extends DataExtension {
    private static $has_one = [
        'Favicon' => Image::class
    ];

    private static $owns = [
        'Favicon'
    ];

    public function updateCMSFields(\SilverStripe\Forms\FieldList $fields) {
        $fields->addFieldToTab(
            'Root.Favicon',
            UploadField::create('Favicon', 'Upload Favicon')
                ->setAllowedExtensions(['ico','png'])
                ->setFolderName('Favicons')
        );
    }
}