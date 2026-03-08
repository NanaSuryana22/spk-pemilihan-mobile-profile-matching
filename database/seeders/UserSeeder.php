<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new User();
        $data->name = 'Nana Suryana';
        $data->email = 'nanasuryana554@gmail.com';
        $data->password = Hash::make('nanasuryana');
        $data->save();

        // $data = new User();
        // $data->name = 'Nana Suryana';
        // $data->email = 'nanasuryana@gmail.com';
        // $data->password = Hash::make('nanasuryana');
        // $data->save();
    }
}
