<?php

namespace MaximeRainville\SilverstripeLinkfieldTester;

use SilverStripe\AnyField\Form\AnyField;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\LinkField\Form\LinkField;

class FolderForm extends Extension
{
    public function updateFormFields(FieldList $fields)
    {
        $fields->addFieldToTab('Editor.Link', AnyField::create('MyLink', 'My Link')->addExcludedClass(Link::class));
    }
}
