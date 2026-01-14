<script setup>
</script>

<template>
    <div className="auth-container d-flex">
        <div className="container mx-auto align-self-center">
            <div className="row">
                <div
                    className="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                    <div className="auth-cover-bg-image"></div>
                    <div className="auth-overlay"></div>

                    <div className="auth-cover">
                        <div className="position-relative">
                            <!-- <img src="/assets/images/background/1.png" alt="auth-img" /> -->

                            <h2 className="mt-5 text-white font-weight-bolder px-2">Join the community of expert
                                developers</h2>
                            <p className="text-white px-2">It is easy to setup with great customer experience. Start
                                your 7-day free trial</p>
                        </div>
                    </div>
                </div>

                <div
                    className="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                    <div className="card">
                        <form className="card-body">
                            <div className="row">
                                <div className="col-md-12 mb-3">
                                    <h2>Sign In</h2>
                                    <p>Enter your email and password to login</p>
                                </div>
                                <div className="col-md-12">
                                    <div className="mb-3">
                                        <label className="form-label">Email</label>
                                        <input type="email" className="form-control" />
                                    </div>
                                </div>
                                <div className="col-12">
                                    <div className="mb-4">
                                        <label className="form-label">Password</label>
                                        <div className="position-relative">
                                            <input type="password" className="form-control pe-5" />
                                            <span className="btn position-absolute end-0 px-3 top-0">
                                                <span className="mdi mdi-eye-off"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-12">
                                    <div className="mb-3">
                                        <div className="form-check form-check-primary form-check-inline">
                                            <input className="form-check-input me-3" type="checkbox"
                                                id="form-check-default" />
                                            <label className="form-check-label" htmlFor="form-check-default">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div className="col-12">
                                    <div className="mb-4">
                                        <button className="btn btn-primary w-100">
                                            SIGN IN
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@import url('../../assets/css/style.css');
</style>