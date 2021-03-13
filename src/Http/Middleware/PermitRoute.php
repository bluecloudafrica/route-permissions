<?php

namespace Bluecloud\RoutePermissions\Http\Middleware;

use Bluecloud\ResponseBuilder\ResponseBuilder;
use Bluecloud\RoutePermissions\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class PermitRoute
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (request()->user()->{'role'} && $this->hasPermission()) return $next($request);

        return (new ResponseBuilder())->unauthorized(config('route_permissions.forbidden_message'))->json();
    }

    private function hasPermission(): bool
    {
        return request()->user()->{'role'}->permissions->contains(function (Permission $permission) {
            return $permission->allows(request());
        });
    }
}
