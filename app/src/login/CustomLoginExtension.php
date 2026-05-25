<?php

namespace App\login;

use SilverStripe\Security\Member;
use SilverStripe\Core\Extension;

class CustomLoginExtension extends Extension {
    public function afterLogin(Member $member) {
        if (!$member->inGroup('administrators')) {
            return $this->owner->redirect('/shop');
        }
        return $this->owner->redirect('/admin');
    }
}
