<?php

namespace App\login;

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\PasswordField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Security\Security;

class MyLoginForm extends Form {
    public function __construct($controller, $name) {
        $fields = FieldList::create([
            TextField::create('Email', 'Email'),
            PasswordField::create('Password', 'Password'),
        ]);

        $actions = FieldList::create([
            FormAction::create('doLogin', 'Login Custom')
        ]);

        parent::__construct($controller, $name, $fields, $actions);
    }

    public function doLogin($data, $form) {
        // Autentikasi bawaan SilverStripe
        $member = Security::authenticate($data, $form);

        if ($member) {
            Security::setCurrentUser($member);

            if (!$member->inGroup('administrators')) {
                return $this->controller->redirect('/shop');
            }
            return $this->controller->redirect('/admin');
        }

        $form->sessionMessage('Login gagal', 'bad');
        return $this->controller->redirectBack();
    }
}
