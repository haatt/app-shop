<?php

use Illuminate\Database\Seeder;
use App\Produc;
use App\Category;
use App\ProductImage;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //uso de factory
        /*factory(Category::class,5)->create();
        factory(Produc::class, 100)->create();
        factory(ProductImage::class,200)->create();*/

        $categories = factory(Category::class,5)->create();
        $categories->each(function ($c){
            $product = factory(Produc::class,20)->make();
            $c->product()->saveMany($product);

            $product->each(function ($pd){
                $image = factory(ProductImage::class,5)->make();
                $pd->images()->saveMany($image);
            });
        });
                        
    }
}
