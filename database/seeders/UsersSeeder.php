<?php
namespace Database\Seeders;

use App\Models\User;
use DB;
// import
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->delete();

        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin'  => 1,
        ]);

        User::create([
            'name'     => 'Member',
            'email'    => 'member@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin'  => 0,
        ]);

    }
}
