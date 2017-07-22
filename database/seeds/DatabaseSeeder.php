<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        for ($i = 1; $i <= 9; $i++) {
            DB::table('groups')->insert([
                'name' => "group $i"
            ]);

            for ($j = 1; $j <= 9; $j++) {
                DB::table('users')->insert([
                    'name' => "user($j)group($i)",
                    'email' => "user($j)group($i)@gmail.com",
                    'password' => bcrypt('0000'),
                    'group_id' => $i
                ]);
            }
        }
    }
}
