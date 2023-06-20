<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Mesa de ayuda']);
        $role3 = Role::create(['name' => 'Lider']);
        $role4 = Role::create(['name' => 'Tecnico']);

        Permission::create(['name' => 'dashboard',
                            'description' => 'dash'])->syncRoles([$role1,$role2,$role3,$role4]);

        Permission::create(['name' => 'elementos.index',
                            'description' => 'Formulario para crear activos'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name' => 'elementos.create',
                            'description' => 'Ver Activos'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name' => 'elementos.edit',
                            'description' => 'Visualizar Activos Enviados - Tecnicos'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'elementos.destroy',
                            'description' => 'Funcion para confirmar reparacion - Tecnicos'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'elementos.store',
                            'description' => 'Funcion para agregar activos'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name' => 'elementos.update',
                            'description' => 'Funcion para recepcion de activos - Tecnicos'])->syncRoles([$role1,$role4]);

        Permission::create(['name' => 'reportes.create',
                            'description' => 'generar reportes'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name' => 'reportes.index',
                            'description' => 'Vista generar reportes'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name' => 'reportes.users',
                            'description' => 'Administracion de usuarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'reportes.edit',
                            'description' => 'Agregar Roles a usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'reportes.destroy',
                            'description' => 'Eliminar a usuarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'reportes.reset',
                            'description' => 'Resetear contraseñas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'reportes.actualizar',
                            'description' => 'Actualizar datos de usuarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'reportes.modificar',
                            'description' => 'Funcion para actulizar datos de usuario'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'reportes.nuevo',
                            'description' => 'Funcion para actulizar datos de usuario'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'reportes.agregar',
                            'description' => 'Funcion para actulizar datos de usuario'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'roles.index',
                            'description' => 'Administracion de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit',
                            'description' => 'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.update',
                            'description' => 'funcion para Editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy',
                            'description' => 'Eliminar roles'])->syncRoles([$role1]);

    }
}