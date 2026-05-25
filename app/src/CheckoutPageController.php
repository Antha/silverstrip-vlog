<?php

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Control\HTTPRequest;

class CheckoutPageController extends PageController
{
    private static $allowed_actions = ['changeStatusToCheckout'];

    public function changeStatusToPaid(HTTPRequest $request){
        $userID = $request->param('ID');

        return $this->redirect('/checkout?status=paid');
    }
}

?>