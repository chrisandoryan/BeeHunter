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
        DB::table('reward_types')->insert([
            'reward_string' => 'Payment',
        ]);
        DB::table('reward_types')->insert([
            'reward_string' => 'Non-Payment',
        ]);
        DB::table('reward_types')->insert([
            'reward_string' => 'Voluntary',
        ]);
        // $this->call(UsersTableSeeder::class);
        DB::table('bounty_categories')->insert([
            'category_id' => 'SI',
            'name' => 'Server Integrity',
        ]);
        DB::table('bounty_categories')->insert([
            'category_id' => 'WS',
            'name' => 'Web Application',
        ]);
        DB::table('bounty_categories')->insert([
            'category_id' => 'AS',
            'name' => 'Android Application',
        ]);
        DB::table('bounty_categories')->insert([
            'category_id' => 'iOS',
            'name' => 'iOS Application',
        ]);
        DB::table('bounty_categories')->insert([
            'category_id' => 'NS',
            'name' => 'Network Security',
        ]);
        DB::table('clients')->insert([
            'name' => 'Google LLC, California',
            'email' => 'security@google.com',
            'password' => Hash::make('googlegoogle'),
            'address' => '1600 Amphitheatre Parkway, Mountain View, CA',
            'phone' => '411505',
            'balance' => 5000000,
        ]);
    }
}
