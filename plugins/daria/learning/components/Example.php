<?php namespace Daria\Learning\Components;

use Cms\Classes\ComponentBase;
use Daria\Learning\Models\Item;

/**
 * Example Component
 */
class Example extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Example Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->page['nums'] = Item::paginate(10);
    }

    public function onHello()
    {
        $this->page['nums'] = Item::paginate(10);
    }
}
