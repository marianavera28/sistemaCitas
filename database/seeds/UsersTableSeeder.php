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
        Role::create([
            'name'      => 'Admin',
            'slug'      => 'admin',
            'special'   => 'all-access'
        ]);

        Role::create([
            'name'      => 'Client',
            'slug'      => 'client',
            'special'   => ''
        ]);

        Role::create([
            'name'      => 'Customer',
            'slug'      => 'customer',
            'special'   => ''
        ]);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->remember_token = Str::random(10);
        $user->save();

        $roles[0] = 1;
        $user->roles()->sync($roles);

        $user = new User();
        $user->name = 'Client';
        $user->email = 'client@example.com';
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->remember_token = Str::random(10);
        $user->save();

        $roles[0] = 2;
        $user->roles()->sync($roles);

        $user = new User();
        $user->name = 'Customer';
        $user->email = 'customer@example.com';
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->remember_token = Str::random(10);
        $user->save();

        $roles[0] = 3;
        $user->roles()->sync($roles);

        //factory(App\User::class, 2)->create();

        

    }
}
