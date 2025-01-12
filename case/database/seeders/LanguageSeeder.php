<?php

namespace Database\Seeders;

use App\Enums\LanguageIdEnum;
use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (LanguageIdEnum::cases() as $language) {
            Language::query()->firstOrCreate([
                'id' => $language->value,
                'code' => $language->code(),
            ]);
        }
    }
}
