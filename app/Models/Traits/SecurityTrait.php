<?php

namespace App\Models\Traits;

trait SecurityTrait {
    public function hasRole($role) {
        return $this->roles->contains('slug', $role);
    }

    public function hasPermission($permission) {
        $roles = $this->roles()->with('permissions')->get();
        foreach($roles as $role) {
            if($role->permissions->contains('slug', $permission)) return true;
        }

        return false;
    }
}