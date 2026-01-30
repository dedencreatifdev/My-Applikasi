<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelPermissions extends Model
{
    /** @use HasFactory<\Database\Factories\LevelPermissionsFactory> */
    use HasFactory;

    protected $fillable = [
        'level_id',
        'nama',
    ];
}
