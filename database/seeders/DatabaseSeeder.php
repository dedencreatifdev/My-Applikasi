<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\level_permissions;
use App\Models\LevelPermissions;
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
        User::factory(5)->create();

        // 
        $level = Level::factory()->create([
            'nama_level' => 'Admin',
        ]);

        // List all models in the app/Models directory
        $modelList = [];
        $path = app_path() . "/Models";
        $results = scandir($path);

        foreach ($results as $result) {
            if ($result === '.' or $result === '..')
                continue;
            $filename = $result;
            $modelList[] = substr($filename, 0, -4);
            LevelPermissions::factory()->create([
                'level_id' => $level->id,
                'nama' => substr($filename, 0, -4),
            ]);
        }


        dd($modelList);
    }
}

