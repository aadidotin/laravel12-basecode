<script setup>
import Sidebar from '@UI/components/Sidebar.vue';
import Header from '@UI/components/Header.vue';
import Footer from '@UI/components/Footer.vue';

</script>

<template>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <Header />

        <!-- ========== App Menu ========== -->

        <Sidebar />

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- <x-layout.brandcrumb /> -->

                    <slot />

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <Footer />
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!--preloader-->
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div> -->
</template>

<style></style>