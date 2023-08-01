<?php

namespace MaximeRainville\SilverstripeLinkfieldTester;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AnyField\Form\AnyField;
use SilverStripe\AnyField\Form\ManyAnyField;
use SilverStripe\Forms\FieldList;
use SilverStripe\LinkField\Form\LinkField;
use SilverStripe\LinkField\Form\MultiLinkField;
use SilverStripe\LinkField\Models\Link;

/**
 * @property Link $MyTestLink
 */
class Block extends BaseElement
{

    private static $icon = 'font-icon-block-link';

    private static $table_name = 'TestLinkBlock';

    private static $singular_name = 'test link block';

    private static $plural_name = 'test link blocks';

    private static $description = 'Test link block';

    private static $has_one = [
        'MyTestLink' => Link::class,
    ];

    private static $has_many = [
        'MyTestLinks' => Link::class,
    ];

    /**
     * Re-title the HTML field to Content
     *
     * {@inheritDoc}
     */
    public function getCMSFields(): FieldList
    {
        $fields =  parent::getCMSFields();

        $fields->removeByName('MyTestLinkID');
        $fields->addFieldToTab('Root.Main', AnyField::create('MyTestLink')->addExcludedClass(Link::class));
        $fields->addFieldToTab('Root.Main', ManyAnyField::create('MyTestLinks')->addExcludedClass(Link::class));

        return $fields;
    }

    public function getSummary()
    {
        if ($this->MyTestLink) {
            $link = $this->MyTestLink;
            return implode($link->generateLinkDescription($link->toMap()));
        }

        return '';
    }

    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
    }

    public function getType()
    {
        return 'Link';
    }

}
