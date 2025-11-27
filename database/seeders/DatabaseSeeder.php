<?php

namespace Database\Seeders;

use App\Enums\Role\RoleEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userBased=[
          'name'=>'user',
          'email'=>'user@gmail.com',
          'password'=>Hash::make(123123123)
        ];

        $user=User::firstOrCreate([
           'email'=>$userBased['email'],
        ],$userBased);

        $role=Role::firstOrCreate(['title'=>RoleEnum::ADMIN->value]);

        $user->roles()->sync($role->id);
    }
}
