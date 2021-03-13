<?php

namespace Bluecloud\RoutePermissions\Models\Traits;


use Bluecloud\RoutePermissions\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasRoutePermissions
{
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
