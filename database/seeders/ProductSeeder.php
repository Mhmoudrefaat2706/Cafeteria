<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Espresso', 'price' => 2.50, 'image' => 'https://source.unsplash.com/200x200/?espresso', 'description' => 'Strong and bold espresso shot.', 'category_id' => 1,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Cappuccino', 'price' => 3.00, 'image' => 'https://source.unsplash.com/200x200/?cappuccino', 'description' => 'Creamy milk foam and espresso.', 'category_id' => 1,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Americano', 'price' => 2.00, 'image' => 'https://source.unsplash.com/200x200/?americano', 'description' => 'Espresso with hot water.', 'category_id' => 1,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Iced Latte', 'price' => 3.50, 'image' => 'https://source.unsplash.com/200x200/?iced-latte', 'description' => 'Cold milk over espresso.', 'category_id' => 2,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Iced Mocha', 'price' => 4.00, 'image' => 'https://source.unsplash.com/200x200/?iced-mocha', 'description' => 'Cold chocolate and coffee mix.', 'category_id' => 2,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Orange Juice', 'price' => 2.75, 'image' => 'https://source.unsplash.com/200x200/?orange-juice', 'description' => 'Freshly squeezed orange.', 'category_id' => 3,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Apple Juice', 'price' => 2.50, 'image' => 'https://source.unsplash.com/200x200/?apple-juice', 'description' => 'Crisp apple juice.', 'category_id' => 3,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Mango Juice', 'price' => 3.00, 'image' => 'https://source.unsplash.com/200x200/?mango-juice', 'description' => 'Sweet mango drink.', 'category_id' => 3,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Coca-Cola', 'price' => 1.50, 'image' => 'https://source.unsplash.com/200x200/?coca-cola', 'description' => 'Classic soda.', 'category_id' => 4,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Pepsi', 'price' => 1.50, 'image' => 'https://source.unsplash.com/200x200/?pepsi', 'description' => 'Refreshing Pepsi.', 'category_id' => 4,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Sprite', 'price' => 1.50, 'image' => 'https://source.unsplash.com/200x200/?sprite', 'description' => 'Lemon-lime soda.', 'category_id' => 4,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Red Bull', 'price' => 3.00, 'image' => 'https://source.unsplash.com/200x200/?redbull', 'description' => 'Gives you wings!', 'category_id' => 5,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Monster Energy', 'price' => 3.25, 'image' => 'https://source.unsplash.com/200x200/?monster-energy', 'description' => 'Extreme energy boost.', 'category_id' => 5,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Latte', 'price' => 2.80, 'image' => 'https://source.unsplash.com/200x200/?latte', 'description' => 'Smooth espresso and milk.', 'category_id' => 1,'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Iced Tea', 'price' => 2.20, 'image' => 'https://source.unsplash.com/200x200/?iced-tea', 'description' => 'Cool and refreshing.', 'category_id' => 2,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
