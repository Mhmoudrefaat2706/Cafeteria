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
            ['name' => 'Caramel Macchiato', 'price' => 2.50, 'image' => 'Caramel Macchiato.PNG', 'description' => 'Strong and bold espresso shot.', 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cappuccino', 'price' => 3.00, 'image' => 'Cappuccino.PNG', 'description' => 'Creamy milk foam and espresso.', 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Americano', 'price' => 2.00, 'image' => 'Americano.PNG', 'description' => 'Espresso with hot water.', 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chai Latte', 'price' => 3.50, 'image' => 'Chai Latte.PNG', 'description' => 'Cold milk over espresso.', 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cold Brew', 'price' => 4.00, 'image' => 'Cold Brew.PNG', 'description' => 'Cold chocolate and coffee mix.', 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'espresso', 'price' => 2.75, 'image' => 'espresso.PNG', 'description' => 'Freshly squeezed orange.', 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Frappé', 'price' => 2.50, 'image' => 'Frappé.PNG', 'description' => 'Crisp apple juice.', 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Herbal Tea', 'price' => 3.00, 'image' => 'Herbal Tea.PNG', 'description' => 'Sweet mango drink.', 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Coca-Cola', 'price' => 1.50, 'image' => 'Hot Chocolate.PNG', 'description' => 'Classic soda.', 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Iced Coffee', 'price' => 1.50, 'image' => 'Iced Coffee.PNG', 'description' => 'Refreshing Pepsi.', 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'latte', 'price' => 1.50, 'image' => 'latte.PNG', 'description' => 'Lemon-lime soda.', 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Matcha Latte', 'price' => 3.00, 'image' => 'Matcha Latte.PNG', 'description' => 'Gives you wings!', 'category_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Monster Energy', 'price' => 3.25, 'image' => 'Mocha.PNG', 'description' => 'Extreme energy boost.', 'category_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tea (English Breakfast', 'price' => 2.80, 'image' => 'Tea (English Breakfast.PNG', 'description' => 'Smooth espresso and milk.', 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'tea', 'price' => 2.20, 'image' => 'tea.PNG', 'description' => 'Cool and refreshing.', 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
