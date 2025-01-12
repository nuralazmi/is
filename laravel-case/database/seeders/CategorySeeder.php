<?php

namespace Database\Seeders;

use App\Enums\LanguageIdEnum;
use App\Models\Category;
use App\Models\CategoryName;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Category::all()->count() > 0) {
            return;
        }

        $categories = [
            ['tr' => 'Teknoloji', 'en' => 'Technology'],
            ['tr' => 'Sağlık', 'en' => 'Health'],
            ['tr' => 'Spor', 'en' => 'Sports'],
        ];

        foreach ($categories as $key => $translations) {
            $category = Category::create();
            foreach (Language::all() as $lang) {
                $category->names()->create([
                    'language_id' => $lang->id,
                    'name' => $translations[$lang->code],
                    'slug' => Str::slug($translations[$lang->code]),
                ]);
            }
        }
    }
}
