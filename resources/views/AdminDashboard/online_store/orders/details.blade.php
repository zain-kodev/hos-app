@extends('AdminDashboard.layouts.layout')
@section('content')
<?php
$discount = $order->discount;
?>


<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../../assets/img/illustrations/corner-4.png);opacity: 0.7;">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
        <h5>الطلب رقم: #{{ $order->order }}</h5>
        <p class="fs--1">{{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('F d, Y') }}</p>
        <div><strong class="me-2">الحالة : </strong>
            <div class="badge rounded-pill badge-soft-success fs--2">مدفوع<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="mb-3 fs-0">معلومات العميل</h5>
                <h6 class="mb-2">{{ $order->user->name }}</h6>
                <p class="mb-1 fs--1">{{ $order->address }}</p>
                <p class="mb-0 fs--1"> <strong>البريد الالكتروني : </strong><a href="mailto:ricky@gmail.com">{{ $order->user->email }}</a></p>
                <p class="mb-0 fs--1"> <strong>رقم الجوال : </strong><a href="tel:7897987987">{{ $order->phone }}</a></p>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="mb-3 fs-0">معلومات الشحن</h5>
                <h6 class="mb-2">{{ $order->user->name }}</h6>
                <p class="mb-0 fs--1">{{ $order->address }}<br /></p>
                <div class="text-500 fs--1">(تطبق الشروط والاحكام)</div>
            </div>
            <div class="col-lg-4">
                <h5 class="mb-3 fs-0">طريقة الدفع</h5>
                <div class="d-flex"><img class="me-3" src="../../../assets/img/icons/visa.png" width="40" height="30" alt="" />
                    <div class="flex-1">
                        <h6 class="mb-0">البطاقة البنكية</h6>
                        <p class="mb-0 fs--1">**** **** **** 9809</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive fs--1">
            <table class="table table-striped border-bottom">
                <thead class="bg-200 text-900">
                <tr>
                    <th class="border-0">المنتج</th>
                    <th class="border-0 text-center">الكمية</th>
                    <th class="border-0 text-end">سعر الوحدة</th>
                    <th class="border-0 text-end">الاجمالي</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $item)
                <tr class="border-200">
                    <td class="align-middle">
                        <h6 class="mb-0 text-nowrap">{{ $item->name }} </h6>
                    </td>
                    <td class="align-middle text-center">{{ $item->quantity }}</td>
                    <td class="align-middle text-end">{{ number_format($item->price) }} ر.س </td>
                    <td class="align-middle text-end">{{ number_format($item->total_price_quantity) }} ر.س </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row g-0 justify-content-end">
            <div class="col-auto">
                <table class="table table-sm table-borderless fs--1 text-end">
                    <tr>
                        <th class="text-900">المجموع النسبي:</th>
                        <td class="fw-semi-bold">{{ number_format($order->sub_total) }} ر.س </td>
                    </tr>

                    <tr>
                        <th class="text-900">الخصم :</th>
                        @if($discount == null)
                            <td>{{ number_format(00) }} ريال </td>

                        @else
                            <td class="fw-semi-bold">{{ number_format($discount['applied']) }} ريال </td>
                        @endif
                    </tr>
                    <tr class="border-top">
                        <th class="text-900">المجموع:</th>
                        <td class="fw-semi-bold">{{ number_format($order->total) }} ر.س </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
