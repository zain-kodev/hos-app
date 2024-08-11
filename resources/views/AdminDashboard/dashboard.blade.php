@extends('AdminDashboard.layouts.layout')
@section('content')

    <div class="row g-0">
        <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/img/illustrations/corner-4.png);">

            </div>

            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-lg-8">
                        <h3> لوحة التحكم</h3>
                        <p class="mb-0">لوحة تحكم التطبيق</p>
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="#" target="_blank" style="font-family: 'Noto Kufi Arabic', sans-serif">الرئيسية <span class="fas fa-chevron-right ms-1 fs--2"></span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/illustrations/corner-1.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>العملاء<span class="badge badge-soft-warning rounded-pill ms-2">-0.23%</span></h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">المزيد<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/illustrations/corner-2.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>الطلبات<span class="badge badge-soft-info rounded-pill ms-2">0.0%</span></h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/orders/order-list.html">عرض الكل<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/illustrations/corner-3.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>اجمالي الدخل<span class="badge badge-soft-success rounded-pill ms-2">9.54%</span></h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" data-countup='{"endValue":43594,"prefix":"$"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="../index.html">الاحصائيات<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto col-lg align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor">قائمة الطلبات </h5>
                </div>

            </div>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive scrollbar">
                <table class="table table-striped overflow-hidden">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم العميل</th>
                        <th> البريد</th>
                        <th>التاريخ</th>
                        <th>رقم الطلب</th>
                        <th> المجموع</th>
                        <th> المدينة</th>
                        <th>خيارات</th>


                    </tr>
                    </thead>
                    <tbody>

                    @foreach($o as $key => $Single)
                        <tr>
                            <td style="visibility: hidden">{{$key}}</td>
                            <td><a href="{{url('orderDetails')}}/{{ $Single->OID }}">{{$Single->name}}</a> </td>
                            <td>{{ $Single->email }}</td>
                            <td>{{  \Carbon\Carbon::parse($Single->oca)->format('F d, Y') }}</td>
                            <td>{{$Single->order}}</td>
                            <td>{{ number_format($Single->total) }} SAR</td>
                            <td>{{ $Single->city }} </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>خيارات
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        @if('successful' == $Single->state)
                                            {{--                                        <li>--}}
                                            {{--                                            <a class="" href="#" target="_blank">موافقة</a>--}}
                                            {{--                                        </li>--}}
                                            <li>
                                                <a class="" href="{{url('orderDetails')}}/{{ $Single->OID }}" target="_blank">تفاصيل الطلب</a>
                                            </li>
                                        @endif

                                        @if('complete' == $Single->state)
                                            <li>
                                                <a class="" href="{{url('orderDetails')}}/{{ $Single->OID }}" target="_blank">تفاصيل الطلب</a>
                                            </li>
                                            <li>
                                                <a class="" href="{{ route('orderDetailsPrint',$Single->OID) }}" target="">عرض الفاتورة</a>
                                            </li>
                                            <li>
                                                <a class="" href="{{ url('addOrderToProjects') }}/{{ $Single->OID }}" target="">إضافة للمشاريع</a>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
