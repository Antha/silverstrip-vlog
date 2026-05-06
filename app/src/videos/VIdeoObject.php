<?php 
    use SilverStripe\ORM\DataObject;
    use SilverStripe\Assets\File;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\CheckboxSetField;
    use SilverStripe\Assets\Image;

    class VideoObject extends DataObject{

        private static $db = [
            'Title' => 'Text',
            'Description' => 'Text'
        ];

        private static $has_one = [
            'VideoSource' => File::class,
            'VideoPage' => VideoPage::class,
            'VideoThumbnail' =>  Image::class
        ];

        private static $many_many = [
            'VideoCategories' => VideoCategory::class
        ];

        private static $owns = [
            'VideoSource','VideoThumbnail'
        ];

        public function getCMSFields(){
            return new FieldList(
                TextField::create('Title'),
                TextareaField::create('Description'),
                UploadField::create('VideoSource'),
                UploadField::create('VideoThumbnail'),
                CheckboxSetField::create('VideoCategories','Categories', VideoCategory::get())
            );
        }
    }
?>