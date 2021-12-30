<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = new Admin;
        $data->name = 'Admin';
        $data->email = 'admin@gmail.com';
        $data->password = Hash::make('admin@123');
        $data->save();
    }
}
