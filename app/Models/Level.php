<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Level extends Model
{
    /** @use HasFactory<\Database\Factories\LevelFactory> */
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama_level',
    ];

    // public function permissions(): BelongsToMany
    // {
    //     return $this->belongsToMany(
    //         LevelPermissions::class,
    //         'levels',
    //         'level_id',
    //         'id'
    //     );
    //     // return dd('tes');
    // }

    public function LevelPermission()
    {
        return $this->belongsTo(LevelPermissions::class, 'id', 'level_id');
    }
}
