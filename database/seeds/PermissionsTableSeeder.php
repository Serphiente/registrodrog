<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'raw_material_create',
            ],
            [
                'id'    => '18',
                'title' => 'raw_material_edit',
            ],
            [
                'id'    => '19',
                'title' => 'raw_material_show',
            ],
            [
                'id'    => '20',
                'title' => 'raw_material_delete',
            ],
            [
                'id'    => '21',
                'title' => 'raw_material_access',
            ],
            [
                'id'    => '22',
                'title' => 'product_access',
            ],
            [
                'id'    => '23',
                'title' => 'laboratory_create',
            ],
            [
                'id'    => '24',
                'title' => 'laboratory_edit',
            ],
            [
                'id'    => '25',
                'title' => 'laboratory_show',
            ],
            [
                'id'    => '26',
                'title' => 'laboratory_delete',
            ],
            [
                'id'    => '27',
                'title' => 'laboratory_access',
            ],
            [
                'id'    => '28',
                'title' => 'baseproduct_create',
            ],
            [
                'id'    => '29',
                'title' => 'baseproduct_edit',
            ],
            [
                'id'    => '30',
                'title' => 'baseproduct_show',
            ],
            [
                'id'    => '31',
                'title' => 'baseproduct_delete',
            ],
            [
                'id'    => '32',
                'title' => 'baseproduct_access',
            ],
            [
                'id'    => '33',
                'title' => 'supplier_create',
            ],
            [
                'id'    => '34',
                'title' => 'supplier_edit',
            ],
            [
                'id'    => '35',
                'title' => 'supplier_show',
            ],
            [
                'id'    => '36',
                'title' => 'supplier_delete',
            ],
            [
                'id'    => '37',
                'title' => 'supplier_access',
            ],
            [
                'id'    => '38',
                'title' => 'pharmaceutical_form_create',
            ],
            [
                'id'    => '39',
                'title' => 'pharmaceutical_form_edit',
            ],
            [
                'id'    => '40',
                'title' => 'pharmaceutical_form_show',
            ],
            [
                'id'    => '41',
                'title' => 'pharmaceutical_form_delete',
            ],
            [
                'id'    => '42',
                'title' => 'pharmaceutical_form_access',
            ],
            [
                'id'    => '43',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);

    }
}
