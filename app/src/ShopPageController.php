<?php

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldComponent;
use SilverStripe\ORM\ArrayList;

class ShopPageController extends ContentController
{
    private static $allowed_actions = ['search', 'range', 'filter'];

    protected function init()
    {
        parent::init();

        $request = $this->getRequest();

        $categories = $request->getVar('categories');

        if ($categories) {
            $request->getSession()->set('SelectedCategories', $categories);
        }else{
             $request->getSession()->clear('SelectedCategories');
        }
    }

    public function index() {
        return [
            'Results' => ProductObjects::get()
        ];
    }

    public function search() {
        $request = $this->getRequest();
        $request->getSession()->clear('SelectedCategories');

        $keyword = $this->getRequest()->getVar('q');
        $products = ProductObjects::get();

        if ($keyword) {
            $products = $products->filterAny([
                'Title:PartialMatch' => $keyword,
                'Description:PartialMatch' => $keyword
            ]);
        }

        return ['Results' => $products];
    }

    public function range(){
        $request = $this->getRequest();

        $minPrice = $request->getVar('minPrice');
        $maxPrice = $request->getVar('maxPrice');
        $products = ProductObjects::get();

        if ($minPrice) {
            $products = $products->filter('Price:GreaterThanOrEqual', $minPrice);
        }

        if ($maxPrice) {
            $products = $products->filter('Price:LessThanOrEqual', $maxPrice);
        }

        return [
            'Results' => $products
        ];
    }

    public function filter() {
        $categoryIDs = $this->getRequest()->getVar('categories');
        $products = ProductObjects::get();

        if ($categoryIDs) {
            $products = $products->filter('CategoryID', $categoryIDs);
        }

        return ['Results' => $products];
    }

    public function getFilteredProducts() {
        $request = $this->getRequest();
        $keyword     = $request->getVar('q');
        $categoryIDs = $request->getVar('categories');

        $products = ProductObjects::get();

        if ($keyword) {
            $products = $products->filterAny([
                'Title:PartialMatch' => $keyword,
                'Description:PartialMatch' => $keyword
            ]);
        }

        if ($categoryIDs) {
            $products = $products->filter('CategoryID', $categoryIDs);
        }

        return $products;
    }


    public function SelectedCategories()
    {
        $session = $this->getRequest()->getSession();
        $categories = $session->get('SelectedCategories');
        $list = ArrayList::create();

        if (is_array($categories)) {
            foreach ($categories as $id) {
                $list->push(['ID' => $id]);
            }
        }

        return $list;
    }
}

?>