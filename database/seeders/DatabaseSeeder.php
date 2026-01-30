<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\level_permissions;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory(10)->create();

        // List all models in the app/Models directory
        $modelList = [];
        $path = app_path() . "/Models";
        $results = scandir($path);

        foreach ($results as $result) {
            if ($result === '.' or $result === '..')
                continue;
            $filename = $result;
            // $modelList[] = substr($filename, 0, -4);
            //     level_permissions::factory()->create([
            //         'level_id' => '1',
            //         'nama' => substr($filename,0,-4),
            //     ]);
        }

        dd($modelList);
    }
}

