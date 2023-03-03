<?php

namespace MaximeRainville\SilverstripeLinkfieldTester;


use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\LinkField\Form\LinkField;

class FolderForm extends Extension
{
    public function updateFormFields(FieldList $fields)
    {
        $fields->addFieldToTab('Editor.Link', LinkField::create('MyLink', 'My Link'));
    }
}
