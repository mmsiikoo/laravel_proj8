<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        //категорії (для one-to-many)
        $care = Category::create(['name' => 'Догляд за обличчям']);
        $makeup = Category::create(['name' => 'Декоративна косметика']);

        //теги (для many-to-many)
        $organic = Tag::create(['name' => 'Органіка']);
        $bestseller = Tag::create(['name' => 'Бестселер']);
        $vegan = Tag::create(['name' => 'Веган']);

        //товари та прив'язка їх до категорій (hasMany та belongsTo)
        $product1 = Product::create([
            'name' => 'Зволожувальний крем',
            'price' => 1200.00,
            'category_id' => $care->id //прив'язка до категорії "догляд"
        ]);

        $product2 = Product::create([
            'name' => 'Матова помада',
            'price' => 450.50,
            'category_id' => $makeup->id //прив'язка до категорії "макіяж"
        ]);

        //прив'язка тег до товарів (many-to-many через pivot table)

        //крем - органічний і веганський
        $product1->tags()->attach([$organic->id, $vegan->id]);

        //помада - бестселер
        $product2->tags()->attach([$bestseller->id]);
    }
}
