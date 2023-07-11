<?php
namespace MaximeRainville\SilverstripeLinkfieldTester;
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
        'MyTestLinks' => Link::class,
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab('Root.LinkTest', LinkField::create('MyTestLink'));
        $fields->addFieldToTab('Root.LinkTest', MultiLinkField::create('MyTestLinks'));
    }
}
