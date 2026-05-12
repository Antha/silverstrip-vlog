<?php 
    use SilverStripe\ORM\DataObject;
    use SilverStripe\Assets\File;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\CheckboxSetField;
    use SilverStripe\Assets\Image;

    class SubinfoObjects extends DataObject{
        private static $db = [
            'Title' => 'Varchar(255)',
            'Description' => 'Varchar(255)'
        ];

        private static $has_one = [
            'ContactPage' => ContactPage::class,
        ];

        public function getCMSFields(){
            return new FieldList(
                TextField::create('Title'),
                TextareaField::create('Description'),
            );
        }
    }
?>