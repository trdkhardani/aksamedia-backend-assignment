<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create(
            [
                'user_id' => Str::uuid(),
                'name' => 'Admin',
                'username' => 'admin',
                'phone' => '088256260123',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('pastibisa'),
            ]
        );

        Division::create(
            [
                'division_id' => 'f1c92a3e-1234-4c3b-9e6f-0e5b7ecf31a1',
                'division_name' => 'Mobile Apps',
            ]
        );

        Division::create(
            [
                'division_id' => 'b9c1b2c4-5678-4a6c-8d5f-6e4f7b9d3a5c',
                'division_name' => 'QA',
            ]
        );

        Division::create(
            [
                'division_id' => 'd3f2e3f5-9101-4c6b-9a2f-7d5f8c9b4e6c',
                'division_name' => 'Full Stack',
            ]
        );

        Division::create(
            [
                'division_id' => 'a5b7c8d9-2345-4a7b-9e8f-0f6c7d8b9a3c',
                'division_name' => 'Backend',
            ]
        );

        Division::create(
            [
                'division_id' => 'c9d8e7f6-3456-4b8a-9f7d-1e6c8f9b0d7c',
                'division_name' => 'Frontend',
            ]
        );

        Division::create(
            [
                'division_id' => 'e6f5d4c3-4567-4b9a-8e6d-2f7c9e0b1a7c',
                'division_name' => 'UI/UX Designer',
            ]
        );
    }
}
