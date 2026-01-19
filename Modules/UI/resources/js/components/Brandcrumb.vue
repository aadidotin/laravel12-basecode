<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    title: String,
    breadcrumb: Array,
})
</script>

<template>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                <h4 class="mb-sm-0">{{ title }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item" v-for="(item, index) in breadcrumb" :key="index">
                            <Link v-if="!item.active"
                                :href="item.href && typeof item.href === 'string' ? item.href : '#'">{{ item.label }}
                            </Link>
                            <span v-else>{{ item.label }}</span>
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
</template>

<style></style>
