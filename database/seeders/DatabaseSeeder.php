<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\PostUserLike;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => Hash::make('12345678'),
        ]);

         User::factory(10)->create();
         Category::factory(10)->create();
         Post::factory(50)->create();
         Article::factory(50)->create();
         Tag::factory(50)->create();
         PostTag::factory(100)->create();
         Comment::factory(100)->create();
         Role::factory(1)->create();
         PostUserLike::factory(200)->create();

        Role::create([
            'id' => '1001',
            'name' => 'admin',
        ]);

        RoleUser::create([
            'user_id' => '1',
            'role_id' => '1001',
        ]);


    }
}
