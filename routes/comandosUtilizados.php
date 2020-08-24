<?php

Route::get('/prueba', function () {
    /*
     return Role::create([
         'name' => 'Admin',
         'slug' => 'admin',
         'description' => 'Administrador',
         'full-access' => 'yes'
     ]);
     */
 
     /*
     return Role::create([
         'name' => 'Invitado',
         'slug' => 'invitado',
         'description' => 'Inivitado',
         'full-access' => 'no'
     ]);
     */
 
     /* 
     return Role::create([
         'name' => 'Prueba',
         'slug' => 'prueba',
         'description' => 'prueba',
         'full-access' => 'no'
     ]);
     */
 
     // $user = User::find(1);
     // $user->roles()->attach([1,3]);
     // $user->roles()->detach([1]);
     // $user->roles()->sync([1]);
     // return $user->roles;
 
     /*
      return Permission::create([
          'name' => 'Crear Producto',
          'slug' => 'producto.index',
          'description' => 'Un usuario puede listar los producto',
      ]);
     */
     
 
     $role = Role::find(2);
    
     $role->permissions()->sync([1, 2]);
 
     return $role->permissions;
 
 });