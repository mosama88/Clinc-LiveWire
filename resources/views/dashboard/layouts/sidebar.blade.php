<aside class="main-sidebar sidebar elevation-4" style="background-color: #ebedf1;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dashboard') }}/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dashboard') }}/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link @yield('active-widgets')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            لوحة التحكم
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item has-treeview    {{ request()->is('admin/BloodTypes*') || request()->is('admin/shiftTypes*') || request()->is('admin/admin_panels*') || request()->is('admin/countries*') || request()->is('admin/cities*') || request()->is('admin/departments*') || request()->is('admin/branches*') || request()->is('admin/nationalities*') || request()->is('admin/sections*') || request()->is('admin/specializations*') || request()->is('admin/qualifications*') || request()->is('admin/jobCategories*') || request()->is('admin/jobGrades*') ? 'menu-open' : '' }} ">
                    <a href="{{ url('/') }}"
                        class="nav-link {{ request()->is('BloodTypes*') || request()->is('admin_panels*') || request()->is('shiftTypes*') || request()->is('countries*') || request()->is('cities*') || request()->is('branches*') || request()->is('nationalities*') || request()->is('departments*') || request()->is('specializations*') || request()->is('sections*') || request()->is('qualifications*') || request()->is('jobCategories*') || request()->is('jobGrades*') ? 'active' : '' }} ">

                        <i class="fas fa-cog"></i>
                        <p>
                            الأعدادت
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.admin_panels.index') }}" class="nav-link @yield('active-admin_panels')">
                                <i class="fas fa-dot-circle"></i>
                                <p>الضبط العام</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.BloodTypes.index') }}" class="nav-link @yield('active-BloodTypes')">
                                <i class="fas fa-dot-circle"></i>
                                <p>فصيلة الدم</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.nationalities.index') }}" class="nav-link @yield('active-nationalities')">
                                <i class="fas fa-dot-circle"></i>
                                <p>الجنسيات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.countries.index') }}" class="nav-link @yield('active-countries')">
                                <i class="fas fa-dot-circle"></i>
                                <p>الدول</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.cities.index') }}" class="nav-link @yield('active-cities')">
                                <i class="fas fa-dot-circle"></i>
                                <p>المدن</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.branches.index') }}" class="nav-link @yield('active-branches')">
                                <i class="fas fa-dot-circle"></i>
                                <p>الفروع</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.departments.index') }}" class="nav-link @yield('active-departments')">
                                <i class="fas fa-dot-circle"></i>
                                <p>الأدارات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.sections.index') }}" class="nav-link @yield('active-sections')">
                                <i class="fas fa-dot-circle"></i>
                                <p>الأقسام</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.specializations.index') }}"
                                class="nav-link @yield('active-specializations')">
                                <i class="fas fa-dot-circle"></i>
                                <p>التخصصات</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.qualifications.index') }}"
                                class="nav-link @yield('active-qualifications')">
                                <i class="fas fa-dot-circle"></i>
                                <p>المؤهلات</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.jobCategories.index') }}" class="nav-link @yield('active-jobCategories')">
                                <i class="fas fa-dot-circle"></i>
                                <p>الفئات الوظيفية</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.jobGrades.index') }}" class="nav-link @yield('active-jobGrades')">
                                <i class="fas fa-dot-circle"></i>
                                <p>الدرجات الوظيفية</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.shiftTypes.index') }}" class="nav-link @yield('active-shiftTypes')">
                                <i class="fas fa-dot-circle"></i>
                                <p>الشفتات</p>
                            </a>
                        </li>
                    </ul>
                </li>




                <li class="nav-item has-treeview    {{ request()->is('admin/employees*') ? 'menu-open' : '' }} ">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('employees*') ? 'active' : '' }} ">


                        <i class="fas fa-user-friends"></i>

                        <p>
                            قائمة شئون الموظفين
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.employees.index') }}" class="nav-link @yield('active-employees')">
                                <i class="fas fa-dot-circle"></i>
                                <p>شئون الموظفين</p>
                            </a>
                        </li>
                    </ul>
                </li>




                <li
                    class="nav-item has-treeview    {{ request()->is('admin/doctors*') | request()->is('admin/doctor/appointmentIndex*') ? 'menu-open' : '' }} ">
                    <a href="{{ url('/') }}"
                        class="nav-link {{ request()->is('doctors*') | request()->is('appointmentIndex*') ? 'active' : '' }} ">

                        <i class="fas fa-user-md"></i>
                        <p>
                            قائمة الأطباء
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.doctors.index') }}" class="nav-link @yield('active-doctors')">
                                <i class="fas fa-dot-circle"></i>
                                <p>الأطباء</p>
                            </a>
                            <a href="{{ route('dashboard.doctors.appointmentIndex') }}"
                                class="nav-link @yield('active_appointmentIndex_doctors')">
                                <i class="fas fa-dot-circle"></i>
                                <p>مواعيد الطبيب</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li
                    class="nav-item has-treeview    {{ request()->is('admin/insuranceCompanies*') ? 'menu-open' : '' }} ">
                    <a href="{{ url('/') }}"
                        class="nav-link {{ request()->is('insuranceCompanies*') ? 'active' : '' }} ">

                        <i class="fas fa-car-crash"></i>
                        <p>
                            قائمة شركات التأمين
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.insuranceCompanies.index') }}"
                                class="nav-link @yield('active-insuranceCompanies')">
                                <i class="fas fa-dot-circle"></i>
                                <p>شركات التأمين</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item has-treeview    {{ request()->is('admin/patients*') ? 'menu-open' : '' }} ">
                    <a href="{{ url('/') }}"
                        class="nav-link {{ request()->is('patients*') ? 'active' : '' }} ">

                        <i class="fas fa-procedures"></i>

                        <p>
                            قائمة المرضى
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.patients.index') }}" class="nav-link @yield('active-patients')">
                                <i class="fas fa-dot-circle"></i>
                                <p>المرضى</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview    {{ request()->is('admin/radiologyServices*') ||request()->is('admin/testsServices*') ? 'menu-open' : '' }} ">
                    <a href="{{ url('/') }}"
                       class="nav-link {{ request()->is('radiologyServices*') ||request()->is('testsServices*') ? 'active' : '' }} ">

                        <i class="fas fa-x-ray"></i>

                        <p>
                            قائمة الخدمات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.radiologyServices.index') }}" class="nav-link @yield('active-radiologyServices')">
                                <i class="fas fa-dot-circle"></i>
                                <p>الاشعه</p>
                            </a>

                            <a href="{{ route('dashboard.testsServices.index') }}" class="nav-link @yield('active-testsServices')">
                                <i class="fas fa-dot-circle"></i>
                                <p>التحاليل</p>
                            </a>
                        </li>
                    </ul>
                </li>






                <li class="nav-item">
                    <a href="{{ url('/' . ($page = 'widgets')) }}" class="nav-link @yield('active-widgets')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item has-treeview    {{ request()->is('layout-top-nav*') || request()->is('layout-boxed*') || request()->is('layout-fixed-sidebar*') || request()->is('layout-fixed-topnav*') || request()->is('layout-fixed-footer*') || request()->is('layout-collapsed-sidebar*') ? 'menu-open' : '' }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('layout-top-nav*') || request()->is('layout-boxed*') || request()->is('layout-fixed-sidebar*') || request()->is('layout-fixed-topnav*') || request()->is('layout-fixed-footer*') || request()->is('layout-collapsed-sidebar*') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Layout Options
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'layout-top-nav')) }}"
                                class="nav-link @yield('active-layout-top-nav')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'layout-boxed')) }}" class="nav-link @yield('active-layout-boxed')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Boxed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'layout-fixed-sidebar')) }}"
                                class="nav-link @yield('active-layout-fixed-sidebar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'layout-fixed-topnav')) }}"
                                class="nav-link @yield('active-layout-fixed-topnav')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Navbar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'layout-fixed-footer')) }}"
                                class="nav-link @yield('active-layout-fixed-footer')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Footer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'layout-collapsed-sidebar')) }}"
                                class="nav-link @yield('active-layout-collapsed-sidebar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Collapsed Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview    {{ request()->is('charts-chartjs*') || request()->is('charts-flot*') || request()->is('charts-inline*') ? 'menu-open' : '' }} ">

                    <a href="#"
                        class="nav-link {{ request()->is('charts-chartjs*') || request()->is('charts-flot*') || request()->is('charts-inline*') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Charts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'charts-chartjs')) }}"
                                class="nav-link @yield('active-charts-chartjs')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'charts-flot')) }}" class="nav-link @yield('active-charts-flot')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'charts-inline')) }}" class="nav-link @yield('active-charts-inline')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview    {{ request()->is('UI-general*') || request()->is('UI-icons*') || request()->is('UI-buttons*') || request()->is('UI-sliders*') || request()->is('UI-modals*') || request()->is('UI-navbar*') || request()->is('UI-timeline*') || request()->is('UI-ribbons*') ? 'menu-open' : '' }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('UI-general*') || request()->is('UI-icons*') || request()->is('UI-buttons*') || request()->is('UI-sliders*') || request()->is('UI-modals*') || request()->is('UI-navbar*') || request()->is('UI-timeline*') || request()->is('UI-ribbons*') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            UI Elements
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'UI-general')) }}" class="nav-link @yield('active-UI-general')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'UI-icons')) }}" class="nav-link @yield('active-UI-icons')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'UI-buttons')) }}" class="nav-link @yield('active-UI-buttons')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buttons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'UI-sliders')) }}" class="nav-link @yield('active-UI-sliders')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'UI-modals')) }}" class="nav-link @yield('active-UI-modals')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modals & Alerts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'UI-navbar')) }}" class="nav-link @yield('active-UI-navbar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Navbar & Tabs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'UI-timeline')) }}" class="nav-link @yield('active-UI-timeline')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'UI-ribbons')) }}" class="nav-link @yield('active-UI-ribbons')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ribbons</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview    {{ request()->is('forms-general*') || request()->is('forms-editors*') || request()->is('forms-advanced*') ? 'menu-open' : '' }} ">

                    <a href="#"
                        class="nav-link {{ request()->is('forms-general*') || request()->is('forms-editors*') || request()->is('forms-advanced*') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Forms
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'forms-general')) }}" class="nav-link @yield('active-forms-general')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'forms-advanced')) }}"
                                class="nav-link @yield('active-forms-advanced')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Advanced Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'forms-editors')) }}" class="nav-link @yield('active-forms-editors')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Editors</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview    {{ request()->is('tables-simple*') || request()->is('tables-data*') || request()->is('tables-jsgrid*') ? 'menu-open' : '' }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('tables-simple*') || request()->is('tables-data*') || request()->is('tables-jsgrid*') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'tables-simple')) }}" class="nav-link @yield('active-tables-simple')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'tables-data')) }}" class="nav-link @yield('active-tables-data')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DataTables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'tables-jsgrid')) }}" class="nav-link @yield('active-tables-jsgrid')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>jsGrid</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="{{ url('/' . ($page = 'calendar')) }}" class="nav-link @yield('active-calendar')">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/' . ($page = 'gallery')) }}" class="nav-link @yield('active-gallery')">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item has-treeview    {{ request()->is('mailbox*') || request()->is('mailbox-compose*') || request()->is('mailbox-read-mail*') ? 'menu-open' : '' }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('mailbox*') || request()->is('mailbox-compose*') || request()->is('mailbox-read-mail*') ? 'active' : '' }} ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'mailbox')) }}" class="nav-link @yield('active-mailbox')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'mailbox-compose')) }}"
                                class="nav-link @yield('active-mailbox-compose')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'mailbox-read-mail')) }}"
                                class="nav-link @yield('active-mailbox-read-mail')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview    {{ request()->is('examples-invoice*') || request()->is('page-profile*') || request()->is('examples-e_commerce*') || request()->is('examples-projects*') || request()->is('examples-project_add*') || request()->is('examples-project_edit*') || request()->is('examples-project_detail*') || request()->is('examples-contacts*') ? 'menu-open' : '' }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('examples-invoice*') || request()->is('page-profile*') || request()->is('examples-e_commerce*') || request()->is('examples-projects*') || request()->is('examples-project_add*') || request()->is('examples-project_edit*') || request()->is('examples-project_detail*') || request()->is('examples-contacts*') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'examples-invoice')) }}"
                                class="nav-link @yield('active-examples-invoice')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'page-profile')) }}" class="nav-link @yield('active-page-profile')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'examples-e_commerce')) }}"
                                class="nav-link @yield('active-examples-e_commerce')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-commerce</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'examples-projects')) }}"
                                class="nav-link @yield('active-examples-projects')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'examples-project_add')) }}"
                                class="nav-link @yield('active-examples-project_add')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'examples-project_edit')) }}"
                                class="nav-link @yield('active-examples-project_edit')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Edit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'examples-project_detail')) }}"
                                class="nav-link @yield('active-examples-project_detail')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'examples-contacts')) }}"
                                class="nav-link @yield('active-examples-contacts')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview    {{ request()->is('examples-legacy-user-menu*') || request()->is('examples-language-menu*') || request()->is('examples-examples-404*') || request()->is('examples-examples-500*') || request()->is('examples-blank*') || request()->is('examples-project_edit*') || request()->is('examples-project_detail*') || request()->is('examples-contacts*') ? 'menu-open' : '' }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('examples-legacy-user-menu*') || request()->is('examples-language-menu*') || request()->is('examples-examples-404*') || request()->is('examples-examples-500*') || request()->is('examples-blank*') || request()->is('examples-project_edit*') || request()->is('examples-project_detail*') || request()->is('examples-contacts*') ? 'active' : '' }} ">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Extras
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'page-login')) }}" class="nav-link @yield('active-page-login')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Login</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'page-register')) }}" class="nav-link @yield('active-page-register')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'lockscreen')) }}" class="nav-link @yield('active-lockscreen')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'examples-legacy-user-menu')) }}"
                                class="nav-link @yield('active-examples-legacy-user-menu')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Legacy User Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'examples-language-menu')) }}"
                                class="nav-link @yield('active-examples-language-menu')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Language Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'examples-404')) }}" class="nav-link @yield('active-examples-404')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'examples-500')) }}" class="nav-link @yield('active-examples-500')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'blank')) }}" class="nav-link @yield('active-blank')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . ($page = 'starter')) }}" class="nav-link @yield('active-starter')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.0" class="nav-link @yield('active-index')">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
