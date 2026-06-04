<?php

namespace App\api;

use OrderObjects;
use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\DataObject;

class OrderController extends Controller {
    private static $allowed_actions = [
        'unreadOrdersCount'
    ];

    public function unreadOrdersCount(HTTPRequest $request) {
        $count = OrderObjects::get()->filter('Status_Read', 'unread')
                                    ->filter('Status', 'inprogress')
                                    ->count();

        return json_encode([
            'unread' => $count
        ]);
    }
}
