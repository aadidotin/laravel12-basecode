<script setup>
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

</script>

<template>
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="/assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="/assets/images/logo-dark.png" alt="" height="17">
                </span>
            </a>
            <!-- Light Logo-->
            <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                    <img src="/assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="/assets/images/logo-light.png" alt="" height="17">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>

                <ul class="navbar-nav" id="navbar-nav">
                    <li class="nav-item">
                        <Link :href="route('saas.index')" class="nav-link menu-link">
                            <i class="ri-apps-2-line"></i> <span>Saas Dashboard</span>
                        </Link>
                    </li>

                    <li class="nav-item">
                        <Link :href="route('tenant.index')" class="nav-link menu-link">
                            <i class="ri-apps-2-line"></i> <span>Tenant</span>
                        </Link>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#subscriptions" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="subscriptions">
                            <i class="ri-apps-2-line"></i> <span>Subscriptions</span>
                        </a>
                        <div class="collapse menu-dropdown" id="subscriptions">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <Link :href="route('subscription.create')" class="nav-link"> New Subscription </Link>
                                    <Link :href="route('subscription.index')" class="nav-link"> Subscription List </Link>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
</template>

<style></style>
