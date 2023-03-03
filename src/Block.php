<?php

namespace MaximeRainville\SilverstripeLinkfieldTester;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\LinkField\Form\LinkField;
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
        'MyTestLink' => Link::class
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
        $fields->addFieldToTab('Root.Main', LinkField::create('MyTestLink'));

        return $fields;
    }

    public function getSummary()
    {
        if ($this->MyTestLink) {
            $link = $this->MyTestLink;
            return $link->generateLinkDescription($link->toMap());
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
