<?php 
    use SilverStripe\ORM\DataObject;
    use SilverStripe\Assets\File;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\CheckboxSetField;
    use SilverStripe\Assets\Image;

    class WcuObjects extends DataObject{
        private static $db = [
            'Title' => 'Varchar(255)',
            'Subtitle' => 'Varchar(255)'
        ];

        private static $has_one = [
            'HomePage' => HomePage::class,
        ];

        public function getCMSFields(){
            return new FieldList(
                TextField::create('Title'),
                TextareaField::create('Subtitle'),
            );
        }
    }
?>