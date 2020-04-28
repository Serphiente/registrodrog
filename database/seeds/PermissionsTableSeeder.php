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
                'title' => 'ingreso_create',
            ],
            [
                'id'    => '44',
                'title' => 'ingreso_edit',
            ],
            [
                'id'    => '45',
                'title' => 'ingreso_show',
            ],
            [
                'id'    => '46',
                'title' => 'ingreso_delete',
            ],
            [
                'id'    => '47',
                'title' => 'ingreso_access',
            ],
            [
                'id'    => '48',
                'title' => 'task_management_access',
            ],
            [
                'id'    => '49',
                'title' => 'task_status_create',
            ],
            [
                'id'    => '50',
                'title' => 'task_status_edit',
            ],
            [
                'id'    => '51',
                'title' => 'task_status_show',
            ],
            [
                'id'    => '52',
                'title' => 'task_status_delete',
            ],
            [
                'id'    => '53',
                'title' => 'task_status_access',
            ],
            [
                'id'    => '54',
                'title' => 'task_tag_create',
            ],
            [
                'id'    => '55',
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => '56',
                'title' => 'task_tag_show',
            ],
            [
                'id'    => '57',
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => '58',
                'title' => 'task_tag_access',
            ],
            [
                'id'    => '59',
                'title' => 'task_create',
            ],
            [
                'id'    => '60',
                'title' => 'task_edit',
            ],
            [
                'id'    => '61',
                'title' => 'task_show',
            ],
            [
                'id'    => '62',
                'title' => 'task_delete',
            ],
            [
                'id'    => '63',
                'title' => 'task_access',
            ],
            [
                'id'    => '64',
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => '65',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '66',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '67',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '68',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '69',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '70',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '71',
                'title' => 'client_create',
            ],
            [
                'id'    => '72',
                'title' => 'client_edit',
            ],
            [
                'id'    => '73',
                'title' => 'client_show',
            ],
            [
                'id'    => '74',
                'title' => 'client_delete',
            ],
            [
                'id'    => '75',
                'title' => 'client_access',
            ],
            [
                'id'    => '76',
                'title' => 'client_contact_create',
            ],
            [
                'id'    => '77',
                'title' => 'client_contact_edit',
            ],
            [
                'id'    => '78',
                'title' => 'client_contact_show',
            ],
            [
                'id'    => '79',
                'title' => 'client_contact_delete',
            ],
            [
                'id'    => '80',
                'title' => 'client_contact_access',
            ],
            [
                'id'    => '81',
                'title' => 'sale_access',
            ],
            [
                'id'    => '82',
                'title' => 'purchase_order_create',
            ],
            [
                'id'    => '83',
                'title' => 'purchase_order_edit',
            ],
            [
                'id'    => '84',
                'title' => 'purchase_order_show',
            ],
            [
                'id'    => '85',
                'title' => 'purchase_order_delete',
            ],
            [
                'id'    => '86',
                'title' => 'purchase_order_access',
            ],
            [
                'id'    => '87',
                'title' => 'purchase_orden_item_create',
            ],
            [
                'id'    => '88',
                'title' => 'purchase_orden_item_edit',
            ],
            [
                'id'    => '89',
                'title' => 'purchase_orden_item_show',
            ],
            [
                'id'    => '90',
                'title' => 'purchase_orden_item_delete',
            ],
            [
                'id'    => '91',
                'title' => 'purchase_orden_item_access',
            ],
            [
                'id'    => '92',
                'title' => 'purchase_orden_resume_access',
            ],
            [
                'id'    => '93',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);

    }
}
