<?php

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Control\HTTPRequest;

class WishListPageController extends PageController
{
    private static $allowed_actions = ['changeStatusToCheckout'];

    public function changeStatusToCheckout(HTTPRequest $request){
        $userID = $request->param('ID');
        
        $orders = OrderObjects::get()
            ->filter([
                'UserID' => $userID,
                'Status' => 'wishlist'
            ]);

        foreach ($orders as $order) {
            $order->Status = 'checkout';
            $order->write();
        }

        return $this->redirect('/checkout?status=checkout');
    }
}
