<?php

namespace Database\Seeders;

use App\Enums\LanguageIdEnum;
use App\Models\Language;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        if (Product::all()->count() > 0) {
            return;
        }

        $json = file_get_contents(database_path('seeders/data/products.json'));
        $products = json_decode($json, true);

        $products = array_map(function ($product) {
            $product['category_id'] = $product['category'];
            unset($product['category']);

            return $product;
        }, $products);

        foreach ($products as $product) {
            $created_product = Product::create([
                'category_id' => $product['category_id'],
                'price' => $product['price'],
                'stock' => $product['stock'],
            ]);
            foreach (Language::all() as $lang) {
                $name = Str::upper($lang->code) . ' - ' . $product['name'];
                $created_product->names()->create([
                    'language_id' => $lang->id,
                    'name' => $name,
                    'slug' => Str::slug($name),
                ]);
            }
        }

    }
}
