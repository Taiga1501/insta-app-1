<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $users = [
            [
                'name' => 'Kenny',
                'email' => 'kenny@gmail.com',
                'password' => Hash::make('kkkkkkkk'),
                'role_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Shawn',
                'email' => 'shawn@gmail.com',
                'password' => Hash::make('ssssssss'),
                'role_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
            
        ];

        $this->user->insert($users);
    }
}
