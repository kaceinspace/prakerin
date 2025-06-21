<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();
        DB::table('products')->delete();

        $category1 = Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
        ]);

        $category2 = Category::create([
            'name' => 'Perabotan Rumah',
            'slug' => 'perabotan-rumah',
        ]);

        Product::create([
            'name'        => 'Samsung S25 5G',
            'slug'        => 'samsung-s25-5g',
            'category_id' => $category1->id,
            'description' => 'Lorem Ipsum',
            'image'       => 'image.png',
            'price'       => 24000000,
            'stock'       => 100,
        ]);

        Product::create([
            'name'        => 'Sapu Lidi',
            'slug'        => 'sapu-lidi',
            'category_id' => $category2->id,
            'description' => 'Lorem Ipsum',
            'image'       => 'image.png',
            'price'       => 5000,
            'stock'       => 1000,
        ]);

    }
}
