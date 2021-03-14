<?php

namespace Bluecloud\RoutePermissions\Models;

use Bluecloud\RoutePermissions\Factories\PermissionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'rp_permissions';
    protected $guarded = [];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'rp_permission_role')->withTimestamps();
    }

    public function allows(Request $request): bool
    {
        return $this->{'method'} == $request->method() && $this->{'route'} == $request->route()->uri;
    }

    public static function newFactory(): PermissionFactory
    {
        return PermissionFactory::new();
    }

    public static function createFor(string $name, string $uri, string $method): self
    {
        return static::create([
            'name' => $name,
            'route' => $uri,
            'method' => $method
        ]);
    }
}
