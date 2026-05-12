<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class ContactConfig extends DataExtension
{
    private static $has_many = [
        'ContactItems' => ContactItem::class,
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $config = GridFieldConfig_RecordEditor::create();
        $grid = GridField::create(
            'ContactItems',
            'Contact Items',
            $this->owner->ContactItems(),
            $config
        );

        $fields->addFieldToTab('Root.ContactConfig', $grid);
    }
}
