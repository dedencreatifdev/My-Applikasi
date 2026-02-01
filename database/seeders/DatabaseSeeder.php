<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usergrup;
use App\Models\Usergruppermission;
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

        $level = Usergrup::factory()->create([
            'nama_grup' => 'Admin',
        ]);
        //
        $User = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'usergrup_id' => $level->id,
        ]);

        // User::factory(5)->create();


        // // List all models in the app/Models directory
        $modelList = [];
        $path = app_path() . "/Models";
        $results = scandir($path);

        foreach ($results as $result) {
            if ($result === '.' or $result === '..')
                continue;
            $filename = $result;
            $modelList[] = substr($filename, 0, -4);
            Usergruppermission::factory()->create([
                'usergrup_id' => $level->id,
                'permission' => substr($filename, 0, -4),
            ]);
        }


        // dd($modelList);
    }
}
