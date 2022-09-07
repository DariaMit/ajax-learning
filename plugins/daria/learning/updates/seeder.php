<?php namespace Daria\Learning\Updates;

use Daria\Learning\Models\Item;
use October\Rain\Database\Updates\Seeder;

class SeedAllTable extends Seeder
{
    public function run()
    {
        for ($i=0; $i<100; $i++) {
            $item = new Item();
            $item->name = $i;
            $item->save();
        }

    }
}
