<script setup>
    import { useAuth, useNotification } from '@/seller/stores';
    import { useRouter } from 'vue-router';

    const auth = useAuth();
    const router = useRouter();
    const notify = useNotification();

    const handleLogout = async () => {
        try {
            const res = await auth.logout();
            if(res.data.status){
                notify.flashNotify('success', 'Logout Successfully', "Success");
                router.push({name: 'seller.login'});
            }
        } catch (error) {
            
        }
    }
</script>
<template>
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
             <!--  Profile -->
            <li class="nav-item dropdown profile">
                <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
                <img src="@/assets/img/profile/user.jpg" alt="User Avatar" class="profile-image">
                </a>
                <div class="dropdown-menu dropdown-menu-sm">
                    <a href="" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0)" @click="handleLogout" class="dropdown-item logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
</template>