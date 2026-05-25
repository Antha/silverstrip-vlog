<?php

namespace App;

use SilverStripe\CMS\Controllers\ContentController;
use App\Login\MyLoginForm;

class LoginPageController extends ContentController {
    private static $allowed_actions = ['index'];

    public function index() {
        // Redirect langsung ke login bawaan
        return $this->redirect('Security/login');
    }
}
