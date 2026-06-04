<?php

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Control\HTTPRequest;

class CheckoutPageController extends PageController
{
    private static $allowed_actions = ['changeStatusToPaid'];

    public function changeStatusToPaid(HTTPRequest $request){
        $userID = $request->param('ID');

          $orders = OrderObjects::get()
            ->filter([
                'UserID' => $userID,
                'Status' => 'checkout'
            ]);

        foreach ($orders as $order) {
            $order->Status = 'inprogress';
            $order->Status_Payment = 'paid';
            $order->write();
        }

        return $this->redirect('/in-progress?status=paid');
    }
}

?>