<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->remember_token = Str::random(10);
        $user->save();

        factory(App\User::class, 20)->create();

        Role::create([
        	'name'		=> 'Admin',
        	'slug'  	=> 'slug',
        	'special' 	=> 'all-access'
        ]);

        Role::create([
            'name'      => 'Client',
            'slug'      => 'client',
            'special'   => 'no-access'
        ]);

        Role::create([
            'name'      => 'Customer',
            'slug'      => 'customer',
            'special'   => 'no-access'
        ]);

        $rol = new Role();
        $rol->role_id = '1';
        $rol->user_id = '1';
        $rol->save();
    }
}
