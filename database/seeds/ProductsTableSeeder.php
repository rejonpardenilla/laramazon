<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        //Seed products table with 6 entries
        factory('App\Product', 6)->create();
        //Get array of ids
        $productsIds = DB::table('products')->pluck('id')->all();
        $sellersIds =  DB::table('sellers')->pluck('id')->all();
        foreach ((range(1, 10)) as $index) {
            foreach ($productsIds as $productId) {
                DB::table('reviews')->insert([
                  'product_id' => $productId,
                  'reviewer_name' => $faker->name(),
                  'title' => $faker->sentence(),
                  'content' => $faker->text(),
                ]);
            }
        }
        foreach ($sellersIds as $sellerId) {
            foreach ((range(0, 2)) as $index){
                $product = App\Product::find($index * $sellerId);
                if ($product) {
                    $product->seller_id = $sellerId;
                    $product->save();
                }
            }
        }
        
    }
}
