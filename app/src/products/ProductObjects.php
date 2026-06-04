<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\NumericField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Control\Controller;

class ProductObjects extends DataObject
{
    private static $db = [
        'Title'       => 'Varchar(255)',
        'Description' => 'Text', 
        'Price'       => 'Decimal(10,2)'
    ];

    private static $has_one = [
        'Thumbnail' => Image::class,
        'Category' => CategoryObjects::class
    ];

    private static $owns = [
        'Thumbnail',
    ];

    public function AddToWishlistLink() {
        return Controller::curr()->Link("addToWishlist/{$this->ID}");
    }

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Title', 'Product Title'),
            TextareaField::create('Description', 'Product Description'),
            UploadField::create('Thumbnail', 'Product Thumbnail')
                ->setFolderName('Products') // simpan di folder khusus
                ->setAllowedExtensions(['jpg', 'jpeg', 'png']),
            NumericField::create('Price','Product Price (Rp.)'),
            DropdownField::create(
                'CategoryID',
                'Category',
                CategoryObjects::get()->map('ID', 'Title')
            )->setEmptyString('-- pilih kategori --')
        );

        return $fields;
    }
}
