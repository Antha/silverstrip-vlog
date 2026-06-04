<?php

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Security\Member;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\PasswordField;
use SilverStripe\Forms\FormAction;

class RegisterPageController extends PageController
{
    private static $allowed_actions = ['RegisterForm'];

    public function RegisterForm() {
        $fields = FieldList::create(
            TextField::create('FirstName', 'First Name'),
            TextField::create('Email', 'Email'),
            PasswordField::create('Password', 'Password')
        );

       $actions = FieldList::create(
            FormAction::create('doRegister', 'Register')
                ->setAttribute('class', 'btn btn-primary w-100 mt-3 shadow-sm')
        );


        return Form::create($this, 'RegisterForm', $fields, $actions);
    }

    public function doRegister($data, Form $form) {
        $member = Member::create();
        $member->FirstName = $data['FirstName'];
        $member->Email = $data['Email'];
        $member->Password = $data['Password'];
        $member->write();

        $form->sessionMessage('Registration successful!', 'good');
        return $this->redirectBack();
    }
}