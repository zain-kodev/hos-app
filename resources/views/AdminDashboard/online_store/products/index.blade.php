@extends('AdminDashboard.layouts.layout')
@section('content')

    <div class="row g-0">
        <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url('{{ asset('assets/img/illustrations/corner-4.png') }}');">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>تحكم في التطبيق</h3>
                        <p class="mb-0">المنتجات</p>
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="#" target="_blank"> قائمة المنتجات <span class="fas fa-chevron-left ms-1 fs--2"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-7 col-xl-8 pe-lg-2 mb-3">
            <div class="card h-lg-100 overflow-hidden">
                <div class="card-body p-0">
                    <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
                        <thead class="bg-light">
                        <tr class="text-900">
                            <th>Best Selling Products</th>
                            <th class="text-end">Revenue ($3189)</th>
                            <th class="pe-card text-end" style="width: 8rem">Revenue (%)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="border-bottom border-200">
                            <td>
                                <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/12.png" width="60" alt="" />
                                    <div class="flex-1 ms-3">
                                        <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Raven Pro</a></h6>
                                        <p class="fw-semi-bold mb-0 text-500">Landing</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-end fw-semi-bold">$1311</td>
                            <td class="align-middle pe-card">
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-2 rounded-3 bg-200" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 41%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="fw-semi-bold ms-2">41%</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-bottom border-200">
                            <td>
                                <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/10.png" width="60" alt="" />
                                    <div class="flex-1 ms-3">
                                        <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Boots4</a></h6>
                                        <p class="fw-semi-bold mb-0 text-500">Portfolio</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-end fw-semi-bold">$860</td>
                            <td class="align-middle pe-card">
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-2 rounded-3 bg-200" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 27%;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="fw-semi-bold ms-2">27%</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-bottom border-200">
                            <td>
                                <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/11.png" width="60" alt="" />
                                    <div class="flex-1 ms-3">
                                        <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Falcon</a></h6>
                                        <p class="fw-semi-bold mb-0 text-500">Admin</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-end fw-semi-bold">$539</td>
                            <td class="align-middle pe-card">
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-2 rounded-3 bg-200" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 17%;" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="fw-semi-bold ms-2">17%</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-bottom border-200">
                            <td>
                                <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/14.png" width="60" alt="" />
                                    <div class="flex-1 ms-3">
                                        <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Slick</a></h6>
                                        <p class="fw-semi-bold mb-0 text-500">Builder</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-end fw-semi-bold">$245</td>
                            <td class="align-middle pe-card">
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-2 rounded-3 bg-200" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 8%;" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="fw-semi-bold ms-2">8%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/13.png" width="60" alt="" />
                                    <div class="flex-1 ms-3">
                                        <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Reign Pro</a></h6>
                                        <p class="fw-semi-bold mb-0 text-500">Agency</p>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-end fw-semi-bold">$234</td>
                            <td class="align-middle pe-card">
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-2 rounded-3 bg-200" style="height: 5px;">
                                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 7%;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="fw-semi-bold ms-2">7%</div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-light py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Last 7 days</option>
                                <option>Last Month</option>
                                <option>Last Year</option>
                            </select>
                        </div>
                        <div class="col-auto"><a class="btn btn-sm btn-falcon-default" href="#!">View All</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-xl-4 ps-lg-2 mb-3">
            <div class="card h-lg-100">
                <div class="card-header d-flex flex-between-center bg-light py-2">
                    <h6 class="mb-0">Shared Files</h6><a class="py-1 fs--1 font-sans-serif" href="#!">View All</a>
                </div>
                <div class="card-body pb-0">
                    <div class="d-flex mb-3 hover-actions-trigger align-items-center">
                        <div class="file-thumbnail"><img class="border h-100 w-100 fit-cover rounded-2" src="assets/img/products/5-thumb.png" alt="" />
                        </div>
                        <div class="ms-3 flex-shrink-1 flex-grow-1">
                            <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!">apple-smart-watch.png</a></h6>
                            <div class="fs--1"><span class="fw-semi-bold">Antony</span><span class="fw-medium text-600 ms-2">Just Now</span></div>
                            <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="assets/img/icons/cloud-download.svg" download="download"><img src="assets/img/icons/cloud-download.svg" alt="" width="15" /></a>
                                <button class="btn btn-light border-300 btn-sm me-1 text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><img src="assets/img/icons/edit-alt.svg" alt="" width="15" /></button>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-200" />
                    <div class="d-flex mb-3 hover-actions-trigger align-items-center">
                        <div class="file-thumbnail"><img class="border h-100 w-100 fit-cover rounded-2" src="assets/img/products/3-thumb.png" alt="" />
                        </div>
                        <div class="ms-3 flex-shrink-1 flex-grow-1">
                            <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!">iphone.jpg</a></h6>
                            <div class="fs--1"><span class="fw-semi-bold">Antony</span><span class="fw-medium text-600 ms-2">Yesterday at 1:30 PM</span></div>
                            <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="assets/img/icons/cloud-download.svg" download="download"><img src="assets/img/icons/cloud-download.svg" alt="" width="15" /></a>
                                <button class="btn btn-light border-300 btn-sm me-1 text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><img src="assets/img/icons/edit-alt.svg" alt="" width="15" /></button>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-200" />
                    <div class="d-flex mb-3 hover-actions-trigger align-items-center">
                        <div class="file-thumbnail"><img class="img-fluid" src="assets/img/icons/zip.png" alt="" />
                        </div>
                        <div class="ms-3 flex-shrink-1 flex-grow-1">
                            <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!">Falcon v1.8.2</a></h6>
                            <div class="fs--1"><span class="fw-semi-bold">Jane</span><span class="fw-medium text-600 ms-2">27 Sep at 10:30 AM</span></div>
                            <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="assets/img/icons/cloud-download.svg" download="download"><img src="assets/img/icons/cloud-download.svg" alt="" width="15" /></a>
                                <button class="btn btn-light border-300 btn-sm me-1 text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><img src="assets/img/icons/edit-alt.svg" alt="" width="15" /></button>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-200" />
                    <div class="d-flex mb-3 hover-actions-trigger align-items-center">
                        <div class="file-thumbnail"><img class="border h-100 w-100 fit-cover rounded-2" src="assets/img/products/2-thumb.png" alt="" />
                        </div>
                        <div class="ms-3 flex-shrink-1 flex-grow-1">
                            <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!">iMac.jpg</a></h6>
                            <div class="fs--1"><span class="fw-semi-bold">Rowen</span><span class="fw-medium text-600 ms-2">23 Sep at 6:10 PM</span></div>
                            <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="assets/img/icons/cloud-download.svg" download="download"><img src="assets/img/icons/cloud-download.svg" alt="" width="15" /></a>
                                <button class="btn btn-light border-300 btn-sm me-1 text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><img src="assets/img/icons/edit-alt.svg" alt="" width="15" /></button>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-200" />
                    <div class="d-flex mb-3 hover-actions-trigger align-items-center">
                        <div class="file-thumbnail"><img class="img-fluid" src="assets/img/icons/docs.png" alt="" />
                        </div>
                        <div class="ms-3 flex-shrink-1 flex-grow-1">
                            <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!">functions.php</a></h6>
                            <div class="fs--1"><span class="fw-semi-bold">John</span><span class="fw-medium text-600 ms-2">1 Oct at 4:30 PM</span></div>
                            <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="assets/img/icons/cloud-download.svg" download="download"><img src="assets/img/icons/cloud-download.svg" alt="" width="15" /></a>
                                <button class="btn btn-light border-300 btn-sm me-1 text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><img src="assets/img/icons/edit-alt.svg" alt="" width="15" /></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
