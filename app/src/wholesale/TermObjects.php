<?php 
    use SilverStripe\ORM\DataObject;
    use SilverStripe\Assets\File;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\CheckboxSetField;
    use SilverStripe\Assets\Image;

    class TermObjects extends DataObject{
        private static $db = [
            'Text' => 'Varchar(255)',
        ];

        private static $summary_fields = [
            'Text' => 'Description',
        ];

        private static $has_one = [
            'WholeSalePage' => WholeSalePage::class,
        ];

        public function getCMSFields(){
            return new FieldList(
                TextareaField::create('Text'),
            );
        }
    }
?>