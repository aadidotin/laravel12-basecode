<script setup>
import PortalLayout from "@UI/layouts/PortalLayout.vue";
import Brandcrumb from "@UI/components/Brandcrumb.vue";
import { route } from "ziggy-js";
</script>

<template>
    <PortalLayout>
        <Brandcrumb title="Create Subscription" :breadcrumb="[
            { label: 'Subscriptions', href: route('subscription.index') },
            { label: 'Create', active: true }
        ]" />

        <!-- Form Element -->
        <form class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Create Subscription</h4>
                    </div><!-- end card header -->

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Subscription Name *</label>
                                    <input type="text" id="establishment-name" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" id="establishment-name" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Last Name *</label>
                                    <input type="text" id="establishment-name" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Gender *</label>
                                    <select id="gender" class="form-select">
                                        <option value="">Please choose gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" id="establishment-email" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-text">+91</span>
                                        <input class="form-control" type="text" maxlength="10"
                                            onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || (event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57))"
                                            id="std_contact">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Alternate Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-text">+91</span>
                                        <input class="form-control" type="text" maxlength="10"
                                            onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || (event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57))"
                                            id="std_contact">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea id="establishment-address" class="form-control" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Date Format</label>
                                    <select id="date-format" class="form-select">
                                        <option value="d-m-y">DD-MM-YY</option>
                                        <option value="d-m-Y">DD-MM-YYYY</option>
                                        <option value="m-d-y">MM-DD-YY</option>
                                        <option value="m-d-Y">MM-DD-YYYY</option>
                                        <option value="Y-m-d">YYYY-MM-DD</option>
                                        <option value="d/m/y">DD/MM/YY</option>
                                        <option value="d/m/Y">DD/MM/YYYY</option>
                                        <option value="m/d/y">MM/DD/YY</option>
                                        <option value="m/d/Y">MM/DD/YYYY</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Time Format</label>
                                    <select id="time-format" class="form-select">
                                        <option value="H:i">H:i — 24-hour (e.g. 23:45)</option>
                                        <option value="H:i:s">H:i:s — 24-hour with seconds (e.g. 23:45:30)</option>
                                        <option value="G:i">G:i — 24-hour no leading zero (e.g. 7:05)</option>
                                        <option value="g:i a">g:i a — 12-hour no leading zero, lowercase am/pm (e.g.
                                            7:05 pm)</option>
                                        <option value="g:i A">g:i A — 12-hour no leading zero, uppercase AM/PM (e.g.
                                            7:05 PM)</option>
                                        <option value="h:i a">h:i a — 12-hour with leading zero, lowercase am/pm (e.g.
                                            07:05 pm)</option>
                                        <option value="h:i A">h:i A — 12-hour with leading zero, uppercase AM/PM (e.g.
                                            07:05 PM)</option>
                                        <option value="g:i:s a">g:i:s a — 12-hour no leading zero with seconds,
                                            lowercase (e.g. 7:05:30 pm)</option>
                                        <option value="h:i:s A">h:i:s A — 12-hour with seconds, uppercase (e.g. 07:05:30
                                            PM)</option>
                                        <option value="H.i">H.i — 24-hour with dot separator (e.g. 23.45)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </PortalLayout>
</template>

<style></style>
