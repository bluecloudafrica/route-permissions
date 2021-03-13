<?php

namespace Bluecloud\RoutePermissions\Tests\Unit;


use Bluecloud\RoutePermissions\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PermissionTest extends \Tests\TestCase
{
    public function test_allows_method()
    {
        /** @var Permission $permission */
        $permission = Permission::create([
            'name' => 'List projects',
            'route' => 'api/projects',
            'method' => 'GET'
        ]);

        /** @var Permission $controlPermission */
        $controlPermission = Permission::create([
            'name' => 'List something else',
            'route' => 'api/clients',
            'method' => 'GET'
        ]);

        $request = Request::create('api/projects', 'GET');

        $request->setRouteResolver(function () use ($request) {
            return (new Route('GET', 'api/projects', []))->bind($request);
        });

        $this->assertTrue($permission->allows($request));
        $this->assertFalse($controlPermission->allows($request));
    }

}
