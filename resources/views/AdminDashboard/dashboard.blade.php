@extends('AdminDashboard.layouts.layout')
@section('content')

    <div class="row g-0">
        <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/img/illustrations/corner-4.png);">
            </div>
            <!--/.bg-holder-->

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
                    <tr class="btn-reveal-trigger">
                        <th scope="col">الاسم</th>
                        <th scope="col">الجوال</th>
                        <th scope="col">البريد</th>
                        <th scope="col">اسم الكيان</th>
                        <th scope="col">الرقم الضريبي</th>
                        <th scope="col">المنطقة</th>
                        <th scope="col">نوع المؤسسة</th>
                        <th scope="col">تاريخ الطلب</th>
                        <th scope="col">الحالة</th>
                        <th class="text-end" scope="col">الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($data as $item)--}}
{{--                        <tr class="btn-reveal-trigger">--}}
{{--                            <td>{{ $item->first_name }} {{ $item->last_name }}</td>--}}
{{--                            <td>{{ $item->phone }}</td>--}}
{{--                            <td>{{ $item->email }}</td>--}}
{{--                            <td>{{ $item->org_name }}</td>--}}
{{--                            <td>{{ $item->org_reg_number }}</td>--}}
{{--                            <td>{{ $item->region }}</td>--}}
{{--                            <td>{{ $item->acType }}</td>--}}
{{--                            <td>{{ $item->join_at }}</td>--}}
{{--                            <td>--}}
{{--                                @if($item->active == 0)--}}
{{--                                    <span class="badge badge rounded-pill d-block p-2 badge-soft-primary">في الانتظار<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>--}}
{{--                                @else--}}
{{--                                    <span class="badge badge rounded-pill d-block p-2 badge-soft-success"> تمت الموافقة<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>--}}

{{--                                @endif--}}
{{--                            </td>--}}

{{--                            <td class="text-end">--}}
{{--                                <div class="dropdown font-sans-serif position-static">--}}
{{--                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-end border py-0">--}}
{{--                                        <div class="bg-white py-2">--}}
{{--                                            @if($item->active == 0)--}}
{{--                                            <form action="{{ route('acceptOrg') }}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <input name="orgID" type="hidden" value="{{ $item->id }}">--}}
{{--                                                <button type="submit" class="dropdown-item" style="font-family: 'Noto Kufi Arabic'">موافقة</button>--}}
{{--                                            </form>--}}
{{--                                                <a class="dropdown-item text-danger" href="#!">رفض</a>--}}
{{--                                            @endif--}}
{{--                                                <a class="dropdown-item text-danger" href="#!">حذف</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}

{{--                    @endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
