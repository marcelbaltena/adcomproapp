<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // De resource-identifier zoals Shield die genereert voor UserResource:
        $resourceIdentifier = 'users::user';

        // Standaard prefixes uit config/filament-shield.php → 'resource' key :contentReference[oaicite:0]{index=0}
        $prefixes = [
            'view_any',
            'view',
            'create',
            'update',
            'restore',
            'restore_any',
            'replicate',
            'reorder',
            'delete',
            'delete_any',
            'force_delete',
            'force_delete_any',
            'lock',
        ];

        foreach ($prefixes as $prefix) {
            Permission::firstOrCreate([
                'name'       => "{$prefix}_{$resourceIdentifier}",
                'guard_name' => 'web',
            ]);
        }
    }
}
