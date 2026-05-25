<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\Forms\ReadonlyField;

class OrderObjects extends DataObject {
    private static $db = [
        'ProductID' => 'Int',
        'UserID'    => 'Int',
        'DateTime'  => 'Datetime',
        'Status'    => "Enum('wishlist,checkout,sending,delivered','wishlist')",
        'Status_Payment' => "Enum('paid,unpaid','unpaid')"
    ];

    private static $has_one = [
        'Member' => Member::class,
        'Product' => ProductObjects::class
    ];

    private static $summary_fields = [
        'ProductID' => 'Product ID',
        'UserID'    => 'User ID',
        'Status'    => 'Status',
        'Product.Title' => 'Product',
        'DateTime'  => 'Added At'
    ];

    public function getStatusBadge() {
        $map = [
            'wishlist' => '<span class="badge bg-secondary text-light">Wishlist</span>',
            'checkout'  => '<span class="badge bg-primary text-light">Checkout</span>',
            'sending'   => '<span class="badge bg-warning text-dark">Sending</span>',
            'delivered' => '<span class="badge bg-success text-light">Delivered</span>',
            'cancelled' => '<span class="badge bg-danger text-light">Cancelled</span>',
        ];

        $html = $map[$this->Status] ?? $this->Status;
        return DBField::create_field('HTMLText', $html);
    }

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        // Ganti field jadi readonly
        $fields->replaceField(
            'UserID',
            ReadonlyField::create('UserID', 'User ID', $this->UserID)
        );

        $fields->replaceField(
            'DateTime',
            ReadonlyField::create('DateTime', 'Date Time', $this->DateTime)
        );

        $fields->replaceField(
            'Member.FirstName',
            ReadonlyField::create('Member.FirstName', 'Member FirstName', $this->Member()->FirstName . ' ' . $this->Member()->Surname)
        );

        // Member FirstName readonly
        $fields->replaceField(
            'MemberID',
            ReadonlyField::create(
                'MemberName',
                'Member',
                $this->Member()->exists() ? $this->Member()->FirstName : ''
            )
        );

        // Product Title readonly
        $fields->replaceField(
            'ProductID',
            ReadonlyField::create(
                'ProductName',
                'Product',
                $this->Product()->exists() ? $this->Product()->Title : ''
            )
        );

        return $fields;
    }


}
