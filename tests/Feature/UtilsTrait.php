<?php 

namespace Tests\Feature;

use App\Models\Permission;
use App\Models\User;

trait UtilsTrait 
{
    public function createTokenUser()
    {
        $permission = Permission::factory()->create([
            'name' => 'Gerenciar Usuários', 
            'slug' => 'manage-users'
        ]);

        $user = User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        $user->permissions()->attach($permission);
        
        return $token;
        
    }

    public function defaultHeaders()
    {
        return [
            'Authorization' => "Bearer {$this->createTokenUser()}",
        ];
    }
}