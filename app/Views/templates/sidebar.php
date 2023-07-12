 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center">
    <div class="sidebar-brand-icon rotate-n-15">
    <!-- <i class="fa fa-codepen"></i> -->
    </div>
    <div class="sidebar-brand-text mx-3">Sistem Cuti SPWM</div>
</a>

<?php if (in_groups('user')): ?>
    <hr class="sidebar-divider ">

<!-- Heading -->
<div class="sidebar-heading">
    User Management
</div>

<li class="nav-item">
    <a class="nav-link" href="<?=base_url('/user/approveduser')?>">
         <i class="fas fa-users"></i>
        <span>Setujui Cuti</span></a>
</li>

<?php endif;?>
<?php if (in_groups('admin')): ?>
<!-- Divider -->
<hr class="sidebar-divider ">

<!-- Heading -->
<div class="sidebar-heading">
    User Management
</div>


<!-- Nav Item - User List -->
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('admin/userlist')?>">
         <i class="fas fa-users"></i>
        <span>User List</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?=base_url('admin/pegawailist')?>">
         <i class="fas fa-users"></i>
        <span>Pegawai List</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?=base_url('admin/divisilist')?>">
         <i class="fas fa-users"></i>
        <span>Divisi List</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?=base_url('admin/cutilist')?>">
         <i class="fas fa-users"></i>
        <span>Setujui Cuti</span></a>
</li>

<?php endif;?>
<!-- Divider -->
<hr class="sidebar-divider ">

<!-- Heading -->
<!-- <div class="sidebar-heading">
    User Profile
</div> -->


<!-- Nav Item - MY Profile -->
<!-- <li class="nav-item">
    <a class="nav-link" href="<?=base_url('user')?>">
         <i class="fas fa-user"></i>
        <span>My Profile</span></a>
</li> -->

<!-- Nav Item - Edit Profile-->
<!-- <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-user-edit"></i>
        <span>Edit Profile</span></a>
</li> -->

 <!-- Divider -->
 <!-- <hr class="sidebar-divider "> -->

   <!-- Nav Item - Log Out-->
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('logout')?>">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->