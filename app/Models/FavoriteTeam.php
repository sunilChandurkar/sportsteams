<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteTeam extends Model
{
    use HasFactory;

    protected $table = 'favorite_teams';

    protected $fillable = [
        'user_id',
        'favorite_team'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
