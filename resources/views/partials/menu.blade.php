<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }} {{ request()->is('admin/audit-logs*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('sale_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/purchase-orders*') ? 'menu-open' : '' }} {{ request()->is('admin/purchase-orden-items*') ? 'menu-open' : '' }} {{ request()->is('admin/purchase-orden-resumes*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-dollar-sign">

                            </i>
                            <p>
                                {{ trans('cruds.sale.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('purchase_order_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.purchase-orders.index") }}" class="nav-link {{ request()->is('admin/purchase-orders') || request()->is('admin/purchase-orders/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-chart-line">

                                        </i>
                                        <p>
                                            {{ trans('cruds.purchaseOrder.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('purchase_orden_item_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.purchase-orden-items.index") }}" class="nav-link {{ request()->is('admin/purchase-orden-items') || request()->is('admin/purchase-orden-items/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.purchaseOrdenItem.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('purchase_orden_resume_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.purchase-orden-resumes.index") }}" class="nav-link {{ request()->is('admin/purchase-orden-resumes') || request()->is('admin/purchase-orden-resumes/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-exclamation">

                                        </i>
                                        <p>
                                            {{ trans('cruds.purchaseOrdenResume.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('ingreso_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.ingresos.index") }}" class="nav-link {{ request()->is('admin/ingresos') || request()->is('admin/ingresos/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-box-open">

                            </i>
                            <p>
                                {{ trans('cruds.ingreso.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('product_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/raw-materials*') ? 'menu-open' : '' }} {{ request()->is('admin/laboratories*') ? 'menu-open' : '' }} {{ request()->is('admin/baseproducts*') ? 'menu-open' : '' }} {{ request()->is('admin/suppliers*') ? 'menu-open' : '' }} {{ request()->is('admin/pharmaceutical-forms*') ? 'menu-open' : '' }} {{ request()->is('admin/clients*') ? 'menu-open' : '' }} {{ request()->is('admin/client-contacts*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-lemon">

                            </i>
                            <p>
                                {{ trans('cruds.product.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('raw_material_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.raw-materials.index") }}" class="nav-link {{ request()->is('admin/raw-materials') || request()->is('admin/raw-materials/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fab fa-angular">

                                        </i>
                                        <p>
                                            {{ trans('cruds.rawMaterial.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('laboratory_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.laboratories.index") }}" class="nav-link {{ request()->is('admin/laboratories') || request()->is('admin/laboratories/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.laboratory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('baseproduct_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.baseproducts.index") }}" class="nav-link {{ request()->is('admin/baseproducts') || request()->is('admin/baseproducts/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-exclamation">

                                        </i>
                                        <p>
                                            {{ trans('cruds.baseproduct.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('supplier_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.suppliers.index") }}" class="nav-link {{ request()->is('admin/suppliers') || request()->is('admin/suppliers/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.supplier.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pharmaceutical_form_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pharmaceutical-forms.index") }}" class="nav-link {{ request()->is('admin/pharmaceutical-forms') || request()->is('admin/pharmaceutical-forms/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pharmaceuticalForm.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('client_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.client.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('client_contact_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.client-contacts.index") }}" class="nav-link {{ request()->is('admin/client-contacts') || request()->is('admin/client-contacts/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.clientContact.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('task_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/task-statuses*') ? 'menu-open' : '' }} {{ request()->is('admin/task-tags*') ? 'menu-open' : '' }} {{ request()->is('admin/tasks*') ? 'menu-open' : '' }} {{ request()->is('admin/tasks-calendars*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-list">

                            </i>
                            <p>
                                {{ trans('cruds.taskManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('task_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-statuses.index") }}" class="nav-link {{ request()->is('admin/task-statuses') || request()->is('admin/task-statuses/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.taskStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-tags.index") }}" class="nav-link {{ request()->is('admin/task-tags') || request()->is('admin/task-tags/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.taskTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tasks.index") }}" class="nav-link {{ request()->is('admin/tasks') || request()->is('admin/tasks/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.task.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tasks_calendar_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tasks-calendars.index") }}" class="nav-link {{ request()->is('admin/tasks-calendars') || request()->is('admin/tasks-calendars/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-calendar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tasksCalendar.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.userAlert.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @php($unread = \App\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'active' : '' }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif
                        </a>
                    </li>
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>