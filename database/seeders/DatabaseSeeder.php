<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            [
                'username' => 'admin',
                'password' => 'admin',
                'role' => 'admin',
            ],
            [
                'username' => 'bank',
                'password' => 'bank',
                'role' => 'bank',
            ],
            [
                'username' => 'shop',
                'password' => 'shop',
                'role' => 'shop',
            ],
            [
                'username' => 'raya',
                'password' => 'raya',
                'role' => 'student',
            ],
        ]);

        Category::insert([
            ['name' => 'Food'],
            ['name' => 'Drinks'],
            ['name' => 'Stationary'],
            ['name' => 'Health'],
            ['name' => 'Technology'],
        ]);

        Wallet::insert([
            [
                'credit' => 1500000,
                'user_id' => 4,
                'status' => 'success'
            ],
            [
                'debit' => 100000,
                'user_id' => 4,
                'status' => 'success'
            ],
            
        ]);

        Product::insert([
            [
                'name' => 'Burger',
                'category_id' => 1,
                'stock' => 50,
                'price' => 14500,
                'thumbnail' => 'https://www.shutterstock.com/image-photo/classic-hamburger-stock-photo-isolated-600nw-2282033179.jpg'
            ],
            [
                'name' => 'Milkshake',
                'category_id' => 2,
                'stock' => 50,
                'price' => 8000,
                'thumbnail' => 'https://preppykitchen.com/wp-content/uploads/2021/04/Milkshake-Recipe-Card.jpg'
            ],
            [
                'name' => 'Pencil',
                'category_id' => 3,
                'stock' => 50,
                'price' => 2000,
                'thumbnail' => 'https://musgravepencil.com/cdn/shop/products/Havest_CedarPencil_1024x1024@2x.jpg?v=1576593212'
            ],
            [
                'name' => "Phone",
                'category_id' => 5,
                'stock' => 15,
                'price' => 200,
                'thumbnail' => "https://cdn.tmobile.com/content/dam/t-mobile/en-p/cell-phones/apple/Apple-iPhone-15-Plus/Pink/Apple-iPhone-15-Plus-Pink-thumbnail.png",
            ],
            [
                'name' => "Tomi",
                'category_id' => 2,
                'stock' => 10,
                'price' => 10,
                'thumbnail' => "https://img.freepik.com/free-photo/person-enjoying-warm-nostalgic-sunset_52683-100695.jpg?w=1380&t=st=1704938321~exp=1704938921~hmac=9e5bc1271db4831ebba438324401294b883f09e4ddadca5f3a1acda2abc586d7",
            ],
            [
                'name' => "Raya",
                'category_id' => 2,
                'stock' => 24,
                'price' => 15000,
                'thumbnail' => "https://img.freepik.com/free-photo/depressed-man-crying-side-view_23-2149699062.jpg?w=1380&t=st=1704938360~exp=1704938960~hmac=00b26d43b579b4381b4a787f7a79dbf9261bb5eba44b51520115777a82f9e730",
            ],
            [
                'name' => "Ikhsan",
                'category_id' => 1,
                'stock' => 10,
                'price' => 5000000,
                'thumbnail' => "https://img.freepik.com/free-photo/side-view-black-man-portrait_23-2149699086.jpg?t=st=1704938360~exp=1704938960~hmac=d78d750ae1de183d46567906c5cd861293c853a36b6691be94be0c2e19e73544",
            ],
            [
                'name' => "Rafael",
                'category_id' => 1,
                'stock' => 10,
                'price' => 5,
                'thumbnail' => "https://img.freepik.com/free-photo/side-view-black-man-portrait_23-2149699086.jpg?t=st=1704938360~exp=1704938960~hmac=d78d750ae1de183d46567906c5cd861293c853a36b6691be94be0c2e19e73544",
            ],
            [
                'name' => "Faris",
                'category_id' => 1,
                'stock' => 10,
                'price' => 5,
                'thumbnail' => "https://img.freepik.com/free-photo/side-view-black-man-portrait_23-2149699086.jpg?t=st=1704938360~exp=1704938960~hmac=d78d750ae1de183d46567906c5cd861293c853a36b6691be94be0c2e19e73544",
            ],
            [
                'name' => "Rehan",
                'category_id' => 1,
                'stock' => 10,
                'price' => 5,
                'thumbnail' => "https://img.freepik.com/free-photo/side-view-black-man-portrait_23-2149699086.jpg?t=st=1704938360~exp=1704938960~hmac=d78d750ae1de183d46567906c5cd861293c853a36b6691be94be0c2e19e73544",
            ],
            [
                'name' => "Ferdi",
                'category_id' => 1,
                'stock' => 10,
                'price' => 5,
                'thumbnail' => "https://img.freepik.com/free-photo/side-view-black-man-portrait_23-2149699086.jpg?t=st=1704938360~exp=1704938960~hmac=d78d750ae1de183d46567906c5cd861293c853a36b6691be94be0c2e19e73544",
            ],
            [
                'name' => "Natan",
                'category_id' => 1,
                'stock' => 10,
                'price' => 5,
                'thumbnail' => "https://img.freepik.com/free-photo/side-view-black-man-portrait_23-2149699086.jpg?t=st=1704938360~exp=1704938960~hmac=d78d750ae1de183d46567906c5cd861293c853a36b6691be94be0c2e19e73544",
            ],
            [
                'name' => "Sendy",
                'category_id' => 1,
                'stock' => 10,
                'price' => 5,
                'thumbnail' => "https://img.freepik.com/free-photo/side-view-black-man-portrait_23-2149699086.jpg?t=st=1704938360~exp=1704938960~hmac=d78d750ae1de183d46567906c5cd861293c853a36b6691be94be0c2e19e73544",
            ],
            [
                'name' => "Matalino",
                'category_id' => 1,
                'stock' => 10,
                'price' => 5,
                'thumbnail' => "https://img.freepik.com/free-photo/side-view-black-man-portrait_23-2149699086.jpg?t=st=1704938360~exp=1704938960~hmac=d78d750ae1de183d46567906c5cd861293c853a36b6691be94be0c2e19e73544",
            ],
            [
                'name' => "abraham",
                'category_id' => 1,
                'stock' => 10,
                'price' => 5,
                'thumbnail' => "https://img.freepik.com/free-photo/side-view-black-man-portrait_23-2149699086.jpg?t=st=1704938360~exp=1704938960~hmac=d78d750ae1de183d46567906c5cd861293c853a36b6691be94be0c2e19e73544",
            ],
            [
                'name' => "sentana",
                'category_id' => 1,
                'stock' => 10,
                'price' => 50,
                'thumbnail' => "https://img.freepik.com/free-photo/side-view-black-man-portrait_23-2149699086.jpg?t=st=1704938360~exp=1704938960~hmac=d78d750ae1de183d46567906c5cd861293c853a36b6691be94be0c2e19e73544",
            ],
            [
                'name' => "bastian",
                'category_id' => 1,
                'stock' => 10,
                'price' => 50,
                'thumbnail' => "https://cdns.klimg.com/resized/476x/selebriti/hollywood/Jaden_Smith/p/jaden-smith-112.jpg",
            ],
        ]);
    }
}
