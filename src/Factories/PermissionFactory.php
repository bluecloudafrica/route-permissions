<?php

namespace Bluecloud\RoutePermissions\Factories;

use Bluecloud\RoutePermissions\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permission::class;

    public function definition(): array
    {
        return [
            'route' => sprintf('api/%s', $this->faker->slug),
            'method' => $this->faker->randomElement(['GET', 'POST', 'PUT', 'DELETE', 'PATCH']),
            'name' => $this->faker->sentence(4)
        ];
    }
}
