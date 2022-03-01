<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    public function users(): HasMany
    {
        return $this->hasMany(
            related: User::class,
            foreignKey: 'role_id',
        );
    }
}
