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

        DB::table('activations')->insert([
            ['id' => 1, 'user_id' => 1, 'code' => 'code', 'completed' => 1],
            ['id' => 2, 'user_id' => 2, 'code' => 'code', 'completed' => 1],
            ['id' => 3, 'user_id' => 3, 'code' => 'code', 'completed' => 1],
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

        DB::table('car_generations')->insert([
            ['id' => 1, 'model_id' => 1, 'name' => 'Typ 8L', 'year_from' => 1996, 'year_to' => 2003],
            ['id' => 2, 'model_id' => 1, 'name' => 'Typ 8P', 'year_from' => 2003, 'year_to' => 2012],
            ['id' => 3, 'model_id' => 1, 'name' => 'Typ 8V', 'year_from' => 2012, 'year_to' => 0],
        ]);

        DB::table('car_modifications')->insert([
            ['id' => 1, 'generation_id' => 3, 'name' => '1.4 TFSI MT'],
            ['id' => 2, 'generation_id' => 3, 'name' => '1.4 TFSI AMT'],
            ['id' => 3, 'generation_id' => 3, 'name' => '1.4 TFSI MT 150 hp'],
            ['id' => 4, 'generation_id' => 3, 'name' => '1.4 TFSI AMT 150 hp'],
            ['id' => 5, 'generation_id' => 3, 'name' => '1.8 TFSI MT'],
            ['id' => 6, 'generation_id' => 3, 'name' => '1.8 TFSI AMT'],
            ['id' => 7, 'generation_id' => 3, 'name' => '1.8 TFSI quattro AMT'],
            ['id' => 8, 'generation_id' => 3, 'name' => '2.0 TDI AMT'],
            ['id' => 9, 'generation_id' => 3, 'name' => '2.0 TFSI AMT'],
            ['id' => 10, 'generation_id' => 3, 'name' => '2.0 TFSI quattro AMT'],
        ]);

        DB::table('car_rims')->insert([
            ['id' => 1, 'width' => 6.5, 'diameter' => 16, 'mounting_hole' => 5, 'pcd' => 112, 'flange' => 'J', 'et' => 46, 'hub_diameter' => 57.1 ],
            ['id' => 2, 'width' => 7, 'diameter' => 16, 'mounting_hole' => 5, 'pcd' => 112, 'flange' => 'J', 'et' => 45, 'hub_diameter' => 57.1 ],
            ['id' => 3, 'width' => 7, 'diameter' => 16, 'mounting_hole' => 5, 'pcd' => 112, 'flange' => 'J', 'et' => 48, 'hub_diameter' => 57.1 ],
            ['id' => 4, 'width' => 7, 'diameter' => 17, 'mounting_hole' => 5, 'pcd' => 112, 'flange' => 'J', 'et' => 45, 'hub_diameter' => 57.1 ],
            ['id' => 5, 'width' => 7.5, 'diameter' => 17, 'mounting_hole' => 5, 'pcd' => 112, 'flange' => 'J', 'et' => 51, 'hub_diameter' => 57.1 ],
            ['id' => 6, 'width' => 7.5, 'diameter' => 18, 'mounting_hole' => 5, 'pcd' => 112, 'flange' => 'J', 'et' => 48, 'hub_diameter' => 57.1 ],
        ]);

        DB::table('car_tires')->insert([
            ['id' => 1, 'width' => 205, 'height' => 55, 'radius' => 16, 'season' => 'SUMMER'],
            ['id' => 2, 'width' => 215, 'height' => 50, 'radius' => 17, 'season' => 'SUMMER'],
            ['id' => 3, 'width' => 225, 'height' => 45, 'radius' => 17, 'season' => 'SUMMER'],
            ['id' => 4, 'width' => 225, 'height' => 40, 'radius' => 18, 'season' => 'SUMMER'],
        ]);

        DB::table('car_equipments')->insert([
            ['id' => 1, 'modification_id' => 8, 'rim_id' => 1, 'tire_id' => 1, 'from_factory' => 1],
            ['id' => 2, 'modification_id' => 8, 'rim_id' => 2, 'tire_id' => 1, 'from_factory' => 1],
            ['id' => 3, 'modification_id' => 8, 'rim_id' => 3, 'tire_id' => 1, 'from_factory' => 1],
            ['id' => 4, 'modification_id' => 8, 'rim_id' => 4, 'tire_id' => 2, 'from_factory' => 0],
            ['id' => 5, 'modification_id' => 8, 'rim_id' => 5, 'tire_id' => 3, 'from_factory' => 0],
            ['id' => 6, 'modification_id' => 8, 'rim_id' => 6, 'tire_id' => 4, 'from_factory' => 0],
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
