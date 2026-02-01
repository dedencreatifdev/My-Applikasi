<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usergrup extends Model
{
    /** @use HasFactory<\Database\Factories\UsergrupFactory> */
    use HasFactory, HasUuids,Notifiable;

    protected $table = 'usergrups';
    protected $fillable = [
        'nama_grup',
    ];

    public function Usergruppermission(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Usergruppermission::class, 'usergrup_id');
    }
}
