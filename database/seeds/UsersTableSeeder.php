<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\Bouncer;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::create()->role()->firstOrCreate([
            'name' => 'superadmin',
            'title' => 'Super Administrator'
        ]);

        Bouncer::create()->role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator'
        ]);

        Bouncer::create()->role()->firstOrCreate([
            'name' => 'user',
            'title' => 'Normal User'
        ]);

        $user = new User;
        $user->name = 'Superadmin';
        $user->email = 'superadmin@mail.nl';
        $user->password = Hash::make('superadmin');
        $user->save();

        $user->assign('superadmin');


        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@mail.nl';
        $user->password = Hash::make('admin');
        $user->save();

        $user->assign('admin');


        $user = new User;
        $user->name = 'User';
        $user->email = 'user@mail.nl';
        $user->password = Hash::make('user');
        $user->save();

        $user->assign('user');

    }
}
