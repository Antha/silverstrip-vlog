<?php

use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\ArrayList;
use SilverStripe\Control\HTTP;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;

use SilverStripe\Forms\TextField;
use SilverStripe\GraphQL\Schema\Field\Field;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\View\ArrayData;


class VideoSearchPageController extends PageController {
    private static $allowed_actions = [
        'VideoSearchForm'
    ];

    public function index(HTTPRequest $request){
        $videos = VideoObject::get();
        $activeFilters = ArrayList::create();

        if($search = $request->getVar('Keywords')){
            $activeFilters->push(ArrayData::create(
            [
                'Label' => "'$search'"
            ]
            ));

            $videos = $videos->filter([
                'Title:PartialMatch' => $search
            ]);
        }

        if($search = $request->getVar('Category')){
            $activeFilters->push(ArrayData::create(
            [
                'Category' => VideoCategory::get()->filter(['ID' => $search])->first()->Title
            ]
            ));

            $videos = $videos->filter([
                'VideoCategories.ID' => $search
            ]);
        }

        $paginatedVideos =  PaginatedList::create(
            $videos,
            $request
        )->setPageLength(5)->setPaginationGetVar('s');

        $data = [
            'Results' => $paginatedVideos,
            'ActiveFilters' => $activeFilters
        ];
        
        return $data;
    } 

    public function VideoSearchForm(){
        $form = Form::create(
            $this,
            'VideoSearchForm',
            FieldList::create(
                TextField::create('Keywords')
                    ->setAttribute('placeholder','Search For A Video'),
                DropdownField::create('Category','Category',VideoCategory::get()->map('ID','Title'))
                    ->setEmptyString('Search In Category')
            ),
            FieldList::create(FormAction::create('doVideoSearch', 'Search'))
        );

        $form->setFormMethod('GET')
            ->setFormAction($this->link())
            ->disableSecurityToken()
            ->loadDataFrom($this->request->getVars());

        return $form;
    }
}
?>