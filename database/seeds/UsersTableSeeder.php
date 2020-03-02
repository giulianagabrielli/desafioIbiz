<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'gerente')->first();
        $consultantRole = Role::where('name', 'consultor')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'cpf' => '04574554894',
            'status_id' => 1
        ]);

        $admin->roles()->attach($adminRole);


        $manager = User::create([
            'name' => 'Gerente',
            'email' => 'gerente@gerente.com',
            'password' => Hash::make('password'),
            'cpf' => '03325640885',
            'status_id' => 1
        ]);

        $manager->roles()->attach($managerRole);


        $consultant = User::create([
            'name' => 'Consultor',
            'email' => 'consultor@consultor.com',
            'password' => Hash::make('password'),
            'cpf' => '32224329881',
            'status_id' => 1
        ]);

        $consultant->roles()->attach($consultantRole);


        //colocando usuários aleatórios
        factory(App\User::class, 20)->create();
    }
}
