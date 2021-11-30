<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager_permission = Permission::all();

		$manager_role = new Role();
		$manager_role->slug = 'admin';
		$manager_role->name = 'Manager';
		$manager_role->save();
		$manager_role->permissions()->attach($manager_permission);

        $manager_role = Role::where('slug', 'admin')->first();
		$manager_perm = Permission::all();

		$admin = new User();
		$admin->name = 'admin';
		$admin->email = 'admin@gmail.com';
        $admin->role_id = 1;
        $admin->avatar = "https://icon-library.com/images/avatar-icon-images/avatar-icon-images-4.jpg";
		$admin->password = bcrypt('123456');
		$admin->save();
		$admin->roles()->attach($manager_role);
    }
}
