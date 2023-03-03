<?php
namespace MaximeRainville\SilverstripeLinkfieldTester;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\ORM\DataExtension;

class Folder extends DataExtension
{
    private static $has_one = [
        'MyTestLink' => Link::class,
    ];
}
