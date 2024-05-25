<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    private $permissions = [

        // Permissions pour le modèle compte
        [
            'name' => 'compte-list',
            'guard_name' => 'web',
        ],
        [
            'name' => 'compte-create',
            'guard_name' => 'web',
        ],
        [
            'name' => 'compte-edit',
            'guard_name' => 'web',
        ],
        [
            'name' => 'compte-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle agent
        [
            'name' => 'agent-list',
            'guard_name' => 'web',
        ],
        [
            'name' => 'agent-create',
            'guard_name' => 'web',
        ],
        [
            'name' => 'agent-edit',
            'guard_name' => 'web',
        ],
        [
            'name' => 'agent-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Role
        [
            'name' => 'role-list',
            'guard_name' => 'web',
        ],
        [
            'name' => 'role-create',
            'guard_name' => 'web',
        ],
        [
            'name' => 'role-edit',
            'guard_name' => 'web',
        ],
        [
            'name' => 'role-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Permission
        [
            'name' => 'permission-list',
            'guard_name' => 'web',
        ],
        [
            'name' => 'permission-create',
            'guard_name' => 'web',
        ],
        [
            'name' => 'permission-edit',
            'guard_name' => 'web',
        ],
        [
            'name' => 'permission-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle entite
        [
            'name' => 'entite-list',
            'guard_name' => 'web',
        ],
        [
            'name' => 'entite-create',
            'guard_name' => 'web',
        ],
        [
            'name' => 'entite-edit',
            'guard_name' => 'web',
        ],
        [
            'name' => 'entite-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle fournisseur
        [
            'name' => 'fournisseur-list',
            'guard_name' => 'web',
        ],
        [
            'name' => 'fournisseur-create',
            'guard_name' => 'web',
        ],
        [
            'name' => 'fournisseur-edit',
            'guard_name' => 'web',
        ],
        [
            'name' => 'fournisseur-delete',
            'guard_name' => 'web',
        ],

        [
            'name' => 'demande-list',
            'guard_name' => 'web',
        ],
        [
            'name' => 'demande-create',
            'guard_name' => 'web',
        ],
        [
            'name' => 'demande-edit',
            'guard_name' => 'web',
        ],
        [
            'name' => 'demande-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle contrat
        [
            'name' => 'contrat-list',
            'guard_name' => 'web',
        ],
        [
            'name' => 'contrat-create',
            'guard_name' => 'web',
        ],
        [
            'name' => 'contrat-edit',
            'guard_name' => 'web',
        ],
        [
            'name' => 'contrat-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Article
        [
            'name' => 'article-list',
            'guard_name' => 'web',
        ],
        [
            'name' => 'article-create',
            'guard_name' => 'web',
        ],
        [
            'name' => 'article-edit',
            'guard_name' => 'web',
        ],
        [
            'name' => 'article-delete',
            'guard_name' => 'web',
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        DB::statement('ALTER TABLE permissions AUTO_INCREMENT = 0');

        foreach($this->permissions as $permission){
            Permission::create([
                'name' => $permission['name'],
                'guard_name' => $permission['guard_name'],
            ]);
        }
    }
}
