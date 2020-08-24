<?php

use Illuminate\Database\Seeder;
use App\User;
use App\RolesPermisos\Models\Role;
use App\RolesPermisos\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AngelPermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate tablas
        DB::statement('SET foreign_key_checks=0');
            DB::table('role_user')->truncate();
            DB::table('permission_role')->truncate();
            Permission::truncate();
            Role::truncate();
        DB::statement('SET foreign_key_checks=1');

        //User Admin
        $useradmin = User::where('email','admin@admin.com')->first();

        if ($useradmin) {
            $useradmin->delete();
        }

        $useradmin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123')
        ]);
        
        // Rol Admin
        $roladmin= Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Usuario Administrador',
            'full-access' => 'yes'
        ]);


        // Rol Registro Usuario
        $roluser= Role::create([
            'name' => 'Registro Usuario',
            'slug' => 'registro-usuario',
            'description' => 'Usuario Registrador',
            'full-access' => 'no'
        ]);

        // Rol Cliente
        $roluser= Role::create([
            'name' => 'Cliente',
            'slug' => 'cliente',
            'description' => 'Usuario Cliente',
            'full-access' => 'no'
        ]);



    // relación table role_user
    $useradmin->roles()->sync([$roladmin->id]);


        // Permisos
        $permission_all = [];

    // ----------------Permiso Para Usuarios------------------- //
        // Permisos Roles
        $permission = Permission::create([
            'name' => 'Lista role',
            'slug' => 'role.index',
            'description' => 'El usuario puede listar los roles',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Show role',
            'slug' => 'role.show',
            'description' => 'El usuario puede ver los roles',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Create role',
            'slug' => 'role.create',
            'description' => 'El usuario puede crear los roles',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Edit role',
            'slug' => 'role.edit',
            'description' => 'El usuario puede editar los roles',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Destroy role',
            'slug' => 'role.destroy',
            'description' => 'El usuario puede eliminar los roles',
        ]);

        $permission_all[] = $permission->id;
    
    // ----------------Permiso Para Usuarios------------------- //

        // Permisos users
        $permission = Permission::create([
            'name' => 'Lista user',
            'slug' => 'user.index',
            'description' => 'El usuario puede listar los users',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Show user',
            'slug' => 'user.show',
            'description' => 'El usuario puede ver los users',
        ]);

        $permission_all[] = $permission->id;
        
        
        $permission = Permission::create([
            'name' => 'Edit user',
            'slug' => 'user.edit',
            'description' => 'El usuario puede editar los users',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Destroy user',
            'slug' => 'user.destroy',
            'description' => 'El usuario puede eliminar los users',
        ]);

        $permission_all[] = $permission->id;

        // ---------------------------NEW--------------------------
        $permission = Permission::create([
            'name' => 'Ver perfil propio',
            'slug' => 'userown.show',
            'description' => 'El usuario puede ver su perfil',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Editar perfil propio',
            'slug' => 'userown.edit',
            'description' => 'El usuario puede editar su perfil',
        ]);

        $permission_all[] = $permission->id;

        
        /*
        $permission = Permission::create([
            'name' => 'Create user',
            'slug' => 'user.create',
            'description' => 'El usuario puede crear los users',
        ]);

        $permission_all[] = $permission->id;
        */
        

    // ----------------Permiso Para Modulos------------------- //

        // Permisos modulos
        $permission = Permission::create([
            'name' => 'Lista modulo',
            'slug' => 'modulo.index',
            'description' => 'El usuario puede listar los modulos',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Show modulo',
            'slug' => 'modulo.show',
            'description' => 'El usuario puede ver los modulos',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Create modulo',
            'slug' => 'modulo.create',
            'description' => 'El usuario puede crear los modulos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit modulo',
            'slug' => 'modulo.edit',
            'description' => 'El usuario puede editar los modulos',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Destroy modulo',
            'slug' => 'modulo.destroy',
            'description' => 'El usuario puede eliminar los modulos',
        ]);

        $permission_all[] = $permission->id;


    // relación table permission_role
    // $roladmin->permissions()->sync($permission_all);
    
    }
}
