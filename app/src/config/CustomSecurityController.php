<?php

namespace App\config;

use SilverStripe\Security\Security;
use SilverStripe\Control\HTTPRequest;

class CustomSecurityController extends Security
{
    private static $allowed_actions = [
        'login'
    ];

    /**
     * Override page login
     *
     * @param HTTPRequest|null $request
     * @return \SilverStripe\Control\HTTPResponse
     */
    public function do_login(HTTPRequest $request = null)
    {
        // Use original form login, but render with custom template
        return $this->customise([
            'Title' => 'Custom Login',
            'Form'  => $this->LoginForm()
        ])->renderWith(['CustomLogin', 'Page']);
    }
}
