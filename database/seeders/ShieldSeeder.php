<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"Admin","guard_name":"web","permissions":["ViewAny:Booking","View:Booking","Create:Booking","Update:Booking","Delete:Booking","Restore:Booking","ForceDelete:Booking","ForceDeleteAny:Booking","RestoreAny:Booking","Replicate:Booking","Reorder:Booking","ViewAny:Listing","View:Listing","Create:Listing","Update:Listing","Delete:Listing","Restore:Listing","ForceDelete:Listing","ForceDeleteAny:Listing","RestoreAny:Listing","Replicate:Listing","Reorder:Listing","ViewAny:Role","View:Role","Create:Role","Update:Role","Delete:Role","Restore:Role","ForceDelete:Role","ForceDeleteAny:Role","RestoreAny:Role","Replicate:Role","Reorder:Role","ViewAny:User","View:User","Create:User","Update:User","Delete:User","Restore:User","ForceDelete:User","ForceDeleteAny:User","RestoreAny:User","Replicate:User","Reorder:User","ViewAny:Bed","View:Bed","Create:Bed","Update:Bed","Delete:Bed","Restore:Bed","ForceDelete:Bed","ForceDeleteAny:Bed","RestoreAny:Bed","Replicate:Bed","Reorder:Bed","ViewAny:BookingPayment","View:BookingPayment","Create:BookingPayment","Update:BookingPayment","Delete:BookingPayment","Restore:BookingPayment","ForceDelete:BookingPayment","ForceDeleteAny:BookingPayment","RestoreAny:BookingPayment","Replicate:BookingPayment","Reorder:BookingPayment","ViewAny:Customer","View:Customer","Create:Customer","Update:Customer","Delete:Customer","Restore:Customer","ForceDelete:Customer","ForceDeleteAny:Customer","RestoreAny:Customer","Replicate:Customer","Reorder:Customer","ViewAny:Invoice","View:Invoice","Create:Invoice","Update:Invoice","Delete:Invoice","Restore:Invoice","ForceDelete:Invoice","ForceDeleteAny:Invoice","RestoreAny:Invoice","Replicate:Invoice","Reorder:Invoice","ViewAny:Therapist","View:Therapist","Create:Therapist","Update:Therapist","Delete:Therapist","Restore:Therapist","ForceDelete:Therapist","ForceDeleteAny:Therapist","RestoreAny:Therapist","Replicate:Therapist","Reorder:Therapist"]},{"name":"Staff","guard_name":"web","permissions":["ViewAny:Booking","View:Booking","Create:Booking","Update:Booking","Replicate:Booking","Reorder:Booking","ViewAny:Listing","View:Listing","Create:Listing","Update:Listing","Reorder:Listing","ViewAny:Customer","View:Customer","Create:Customer","Update:Customer","ViewAny:Therapist","View:Therapist"]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
