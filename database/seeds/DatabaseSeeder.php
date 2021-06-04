<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
use App\SiteConfiguration;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(PermissionSeeder::class);
        factory(App\Category::class, 30)->create();
        factory(App\Product::class, 200)->create();
        SiteConfiguration::insert(['store_timing' =>'9:00 am - 6:00 pm']);
    }
}
