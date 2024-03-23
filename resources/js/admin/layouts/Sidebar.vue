<template>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="i" class="brand-link text-center">
            <span class="brand-text font-weight-light">Global Bazar</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <router-link :to="{name: 'admin.dashboard'}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link :to="{name: 'admin.manage.files'}" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                        Manage Files
                        </p>
                    </router-link>
                </li>

                  <!-- <li class="nav-header">AUTHORIZATIONS</li> -->

                <!-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard <i class="right fas fa-angle-left"></i>
                    </p>
                    
                    </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
           
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>