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
        'MyTestLinks' => Link::class,
    ];

    public function updateCMSFields(FieldList $fields)
    {
        if (empty($this->getOwner()->ElementalArea)) {
            $fields->addFieldToTab('Root.LinkTest', AnyField::create('MyTestLink')->addExcludedClass(Link::class));
            $fields->addFieldToTab('Root.LinkTest', ManyAnyField::create('MyTestLinks')->addExcludedClass(Link::class));
        }

    }
}
