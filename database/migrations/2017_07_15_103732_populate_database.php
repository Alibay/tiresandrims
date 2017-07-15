<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class PopulateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            ['id' => 1, 'email' => 'admin@mail.com', 'first_name' => 'Admin', 'last_name' => 'Admin', 'password' => bcrypt('pass')],
            ['id' => 2, 'email' => 'moderator@mail.com', 'first_name' => 'Moderator', 'last_name' => 'Moderator', 'password' => bcrypt('pass')],
            ['id' => 3, 'email' => 'member@mail.com', 'first_name' => 'Member', 'last_name' => 'Member', 'password' => bcrypt('pass')],
        ]);

        DB::table('roles')->insert([
            ['id' => 1, 'slug' => 'admin', 'name' => 'Admin'],
            ['id' => 2, 'slug' => 'moderator', 'name' => 'Moderator'],
            ['id' => 3, 'slug' => 'member', 'name' => 'Member'],
        ]);

        DB::table('role_users')->insert([
            ['role_id' => 1, 'user_id' => 1],
            ['role_id' => 2, 'user_id' => 2],
            ['role_id' => 3, 'user_id' => 3],
        ]);

        DB::table('car_brands')->insert([
            ['id' => 1, 'name' => 'Audi'],
            ['id' => 2, 'name' => 'BMW'],
            ['id' => 3, 'name' => 'Mercedes'],
        ]);

        DB::table('car_models')->insert([
            ['id' => 1, 'brand_id' => 1, 'name' => 'A3'],
            ['id' => 2, 'brand_id' => 1, 'name' => 'A4'],
            ['id' => 3, 'brand_id' => 1, 'name' => 'A5'],
            ['id' => 4, 'brand_id' => 1, 'name' => 'A5 Sportback'],
            ['id' => 5, 'brand_id' => 2, 'name' => 'X1'],
            ['id' => 6, 'brand_id' => 2, 'name' => 'X3'],
            ['id' => 7, 'brand_id' => 2, 'name' => 'X4'],
            ['id' => 8, 'brand_id' => 2, 'name' => 'X5'],
            ['id' => 9, 'brand_id' => 3, 'name' => 'A Class'],
            ['id' => 10, 'brand_id' => 3, 'name' => 'B Class'],
            ['id' => 11, 'brand_id' => 3, 'name' => 'C Class'],
            ['id' => 12, 'brand_id' => 3, 'name' => 'E Class'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
