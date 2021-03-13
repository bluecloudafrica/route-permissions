# Route Permissions
Implement route based permissions in your laravel app.
## How to Use
```terminal
composer require bluecloud/route-pemissions

php artisan migrate
```
- use `Bluecloud\RoutePermissions\Models\Traits\HasRoutePermissions` 
trait in your `User` model
  
- Add `role_id` column to your `users` table.
- To restrict access to resources based on the routes, wrap the
routes to those resources in `Bluecloud\RoutePermissions\Http\Middleware\PermitRoute` 
  middleware
  
## How it works
Route permissions package introduces `roles` and `permissions` to your
application. 

Permissions are actual actions a user can do. They are defined by route uri 
and http method. Arguably every route of your application should have a 
corresponding permission. These permissions can be managed under the
`Bluecloud\RoutePermissions\Models\Permission` model.

Role are groups of permissions that make up a user's `job`. A role, 
presented by the `Bluecloud\RoutePermissions\Models\Role` model can have 
as many permissions as you would like the user to have. 
Every user should belong to a role. A user can or cannot access a resource
based on the permissions the role they belong to have. A user's permission
can be changed by changing their role or by changing the permissions
attached to their role.

## Configuration
You can edit the application config by publishing the package's resources
`php artisan vendor:publish` and choosing `Bluecloud\RoutePermissions\RoutePermissionsServiceProvider`
from the list
