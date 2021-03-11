<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roleAdmin = Role::create(['name' => 'Superadmin']);
        $roleBlogger = Role::create(['name' => 'Blogger']);

        Permission::create([
                'name' => 'admin.home',
                'description' => 'Ver el backoffice'
        ])->syncRoles([$roleAdmin,$roleBlogger]);

        Permission::create([
            'name' => 'admin.users.index',
            'description' => 'Listar usuarios'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.users.edit',
            'description' => 'Editar usuario'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.users.update',
            'description' => 'Actualizar usuarios'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.categories.index',
            'description' => 'Listar categorías'
        ])->syncRoles([$roleAdmin, $roleBlogger]);

        Permission::create([
            'name' => 'admin.categories.create',
            'description' => 'Crear categorías'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.categories.edit',
            'description' => 'Editar categorías'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.categories.destroy',
            'description' => 'Borrar categorías'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.tags.index',
            'description' => 'Listar etiquetas'
        ])->syncRoles([$roleAdmin, $roleBlogger]);

        Permission::create([
            'name' => 'admin.tags.create',
            'description' => 'Crear etiquetas'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.tags.edit',
            'description' => 'Editar etiquetas'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.tags.destroy',
            'description' => 'Borrar etiquetas'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.posts.index',
            'description' => 'Listar los posts'
        ])->syncRoles([$roleAdmin,$roleBlogger]);

        Permission::create([
            'name' => 'admin.posts.create',
            'description' => 'Crear los posts'
        ])->syncRoles([$roleAdmin,$roleBlogger]);

        Permission::create([
            'name' => 'admin.posts.edit',
            'description' => 'Editar los posts'
        ])->syncRoles([$roleAdmin,$roleBlogger]);

        Permission::create([
            'name' => 'admin.posts.destroy',
            'description' => 'Borrar los post'
        ])->syncRoles([$roleAdmin,$roleBlogger]);
    }
}
