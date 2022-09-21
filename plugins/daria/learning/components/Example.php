<?php namespace Daria\Learning\Components;

use Cms\Classes\ComponentBase;
use Daria\Learning\Models\Item;
use Flash;
use Illuminate\Http\Response;

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
        return [
            'page' => [
                'default' => 1
            ]
        ];
    }

    public function onRun()
    {
        $this->page['nums'] = Item::listFrontEnd();
        $this->page['checkbox'] = Item::all();
        $this->page['sortOptions'] = Item::$allowedSortingOptions;

    }

    public function onHello()
    {
        $page = \Input::get('page');
        $this->page['page'] = $page;
        $this->page['nums'] = Item::paginate(10, $page);
    }

    public function onFilter()
    {
        $this->page['nums'] = Item::whereRaw('name % 2 = 1')->paginate(10);
    }

    public function onFilterForm()
    {
        $options = post('Filter', []);
        $numsQuery = Item::query();
        if ($options) {
            $this->page['nums'] = $numsQuery->listFrontEnd($options);
//            Flash::success('Покажем номера которые равны' . implode(' ', $options));
        } else{
            $this->page['nums'] = Item::listFrontEnd();
        }
    }
}
