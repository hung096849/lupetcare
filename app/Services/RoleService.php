<?php
namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Facades\Lang;

class RoleService
{
    protected $roleRepository;

    public function __construct(
        Role    $roleRepository
    ) {
        $this->roleRepository    = $roleRepository;
    }

    //for frontend
    public function listRole() {
        $roles  = $this->roleRepository->get();
        return $roles;
    }
}
