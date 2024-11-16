@extends('auth.layout')

@section('content')

    <div class="row min-vh-100 bg-100">
        <div class="col-6 d-none d-lg-block position-relative">
            <div class="bg-holder" style="background-image:url(../../../assets/img/generic/19.jpg);">
            </div>
            <!--/.bg-holder-->

        </div>
        <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
            <div class="row justify-content-center g-0">
                <div class="col-lg-9 col-xl-8 col-xxl-6">
                    <div class="card">
                        <div class="card-header bg-circle-shape bg-shape text-center p-2"><a class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light" href="../../../index.html">falcon</a></div>
                        <div class="card-body p-4">
                            <div class="row flex-between-center">
                                <div class="col-auto">
                                    <h3>Register</h3>
                                </div>
                                <div class="col-auto fs--1 text-600"><span class="mb-0 fw-semi-bold">Already User?</span> <span><a href="../../../pages/authentication/split/login.html">Login</a></span></div>
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" for="split-name">Name</label>
                                    <input class="form-control" type="text" id="split-name" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="split-email">Email address</label>
                                    <input class="form-control" type="email" id="split-email" />
                                </div>
                                <div class="row gx-3">
                                    <div class="mb-3 col-sm-6">
                                        <label class="form-label" for="split-password">Password</label>
                                        <input class="form-control" type="password" id="split-password" />
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label class="form-label" for="split-confirm-password">Confirm Password</label>
                                        <input class="form-control" type="password" id="split-confirm-password" />
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cover-register-checkbox" />
                                    <label class="form-label" for="cover-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button>
                                </div>
                            </form>
                            <div class="position-relative mt-4">
                                <hr class="bg-300" />
                                <div class="divider-content-center">or register with</div>
                            </div>
                            <div class="row g-2 mt-2">
                                <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                                <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
