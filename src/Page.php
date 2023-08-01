<?php
namespace MaximeRainville\SilverstripeLinkfieldTester;

use SilverStripe\AnyField\Form\AnyField;
use SilverStripe\AnyField\Form\ManyAnyField;
use SilverStripe\Forms\FieldList;
use SilverStripe\LinkField\Form\LinkField;
use SilverStripe\LinkField\Form\MultiLinkField;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\ORM\DataExtension;

class Page extends DataExtension
{
    private static $has_one = [
        'MyTestLink' => Link::class,
    ];

    private static $has_many = [
        'MyTestLinks' => Link::class . '.TestOwner',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab('Root.LinkTest', AnyField::create('MyTestLink'));
        $fields->addFieldToTab('Root.LinkTest', ManyAnyField::create('MyTestLinks'));
    }
}
