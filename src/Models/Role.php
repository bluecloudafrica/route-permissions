<?php

namespace Bluecloud\RoutePermissions\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $table = 'rp_roles';
    protected $guarded = [];

    public function users(): HasMany
    {
        return $this->hasMany(config('auth.providers.users.model'));
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'rp_permission_role')->withTimestamps();
    }
}
