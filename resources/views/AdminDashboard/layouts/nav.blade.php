<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>

        </div>
        <a class="navbar-brand" href="{{ url('/') }}">
            <div class="d-flex align-items-center py-3">
                {{--<img class="me-2" src="{{ asset('logo3.jpeg') }}" alt="" width="160" height="50" style="border-radius: 5px;" />--}}
                <span class="font-sans-serif">فواح استور</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mb-2">
                        <div class="col-auto navbar-vertical-label">لوحة التحكم
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider"/>
                        </div>
                    </div>
                    <!-- parent pages--><a class="nav-link active" href="{{ url('/AdminDashboard') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">الرئيسية</span>
                        </div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link" href="{{ url('/AdminDashboard') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                                <span class="fab fa-expeditedssl"></span></span>
                            <span class="nav-link-text ps-1">الطلبات الجديدة</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url('AdminDashboard') }}" role="button">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fab fa-creative-commons-sampling§§ "></span>
                            </span>
                            <span class="nav-link-text ps-1">جميع الطلبات </span>
                        </div>
                    </a>

{{--                    <a class="nav-link" href="{{ url('/') }}" role="button">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <span class="nav-link-icon">--}}
{{--                                <span class="far fa-question-circle"></span>--}}
{{--                            </span>--}}
{{--                            <span class="nav-link-text ps-1">Waiting For Payment</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <a class="nav-link" href="{{ url('/PaidRequests') }}" role="button">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <span class="nav-link-icon">--}}
{{--                                <span class="far fa-money-bill-alt"></span>--}}
{{--                            </span>--}}
{{--                            <span class="nav-link-text ps-1">Confirmed Paid Requests</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <a class="nav-link" href="{{ url('/') }}" role="button">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <span class="nav-link-icon">--}}
{{--                                <span class="fab fa-bootstrap"></span>--}}
{{--                            </span>--}}
{{--                            <span class="nav-link-text ps-1">Block List</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label" style="font-family: 'Noto Kufi Arabic', sans-serif">
                             المنتجات
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider"/>
                        </div>
                    </div>
                    <a class="nav-link" href="{{ url('/products') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-rocket"></span></span><span
                                class="nav-link-text ps-1">قائمة المنتجات </span>
                        </div>
                    </a>
                    <a class="nav-link" href="{{ url('products') }}" role="button">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-circle"></span>
                            </span>
                            <span class="nav-link-text ps-1">التصنيفات</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label" style="font-family: 'Noto Kufi Arabic', sans-serif">
                            اعدادات النظام
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider"/>
                        </div>
                    </div>
                    <!-- parent pages--><a class="nav-link" href="{{ url('/AppInfo') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-cogs"></span></span><span
                                class="nav-link-text ps-1">الاعدادات</span>
                        </div>
                    </a>

                </li>
            </ul>
            {{--<div class="settings mb-3">
                <div class="card alert p-0 shadow-none" role="alert">
                    <button class="btn-close btn-sm end-0 position-absolute fs--2 fw-bold p-2" aria-label="Close" data-bs-dismiss="alert" type="button"></button>
                    <div class="card-body text-center"><img src="{{ asset('assets/img/illustrations/navbar-vertical.png') }}" alt="" width="80" />
                        <p class="fs--2 mt-2">Loving what you see? <br />Get your copy of <a href="#!">Falcon</a></p>
                        <div class="d-grid"><a class="btn btn-sm btn-purchase" href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/" target="_blank">Purchase</a></div>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
</nav>
