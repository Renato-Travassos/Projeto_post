<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create(['name'=>'Admin','email'=>'admin@gmail.com','password'=>bcrypt('adminpass'),
        'email_verified_at'=>now(),'is_admin'=>1]);
           
    }
}
