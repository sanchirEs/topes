<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Creates the Filament admin login.
 *
 * The recovered production user is deliberately NOT committed with the rest of
 * the catalog — its password hash and remember_token would be published in a
 * public repository. Set ADMIN_EMAIL / ADMIN_PASSWORD in .env, or let this
 * generate a one-time password and print it.
 */
class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@topes.mn');

        if (DB::table('users')->where('email', $email)->exists()) {
            $this->command->info("  admin              {$email} already exists, left alone");

            return;
        }

        $password = env('ADMIN_PASSWORD') ?: Str::password(16);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info("  admin              created {$email}");

        if (! env('ADMIN_PASSWORD')) {
            $this->command->warn("  one-time password: {$password}  (save it — not stored anywhere else)");
        }
    }
}
