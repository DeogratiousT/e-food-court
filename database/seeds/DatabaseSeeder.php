<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['email' => 'admin@admin.com'],[
            'name' => 'Teddius Munyao Maingi',
            'password' => Hash::make('Password1234'),
            'email_verified_at' => Carbon::now(),
            'role_id' => Role::where('slug','administrator')->pluck('id')->first(),
        ]);
    }
}
