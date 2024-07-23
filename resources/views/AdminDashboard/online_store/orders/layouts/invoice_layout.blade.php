<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>KO-SATA-INVOICE </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="برنامج ادارة خدمات عملاء منصة إعمار" />
    <meta name="keywords" content="برنامج ادارة خدمات عملاء منصة إعمار" />
    <meta name="author" content=" منصة إعمار - جدة"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
    </style>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ public_path('emr_logo.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="{{ public_path('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <link rel="stylesheet" href="{{ public_path('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ public_path('dist/css/font-awesome.css') }}">
    <script src="{{ public_path('bootstrap/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ public_path('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ public_path('dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ public_path('dist/fonts/fonts-fa.css') }}">
    <link rel="stylesheet" href="{{ public_path('dist/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ public_path('style.css') }}">
    <style type="text/css">
        td,th{
            align-content: center;
        }
    </style>


</head>
<body class="login-page">

<?php
$arrayData = json_decode($order->products, true);
$discount = json_decode($order->discount, true);
?>
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> تفاصيل الطلب
                <small class="pull-left">التاريخ: 2/10/2014</small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            الشركة
            <span>
                    <strong>منصة إعمار لخدمات الاعمال</strong><br>
                    المملكة العربية السعودية<br>
                    منطقة مكه المكرمة ، جده<br>
                    الجوال : 0558860566<br>
                    البريد الالكتروني : info@almasaeedstudio.com
                </span>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            العميل
            <span>
                    <strong>{{ $order->name }}</strong><br>
                    العنوان : {{ $order->address }}<br>
                    الجوال : {{ $order->phone }}<br>
                    البريد الالكتروني : {{ $order->email }}
                </span>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>الفاتورة {{ $order->order }} </b><br>
            <br>
            <b>رقم الطلب :</b> {{ $order->order }}<br>
            <b>تاريخ الطلب :</b> {{ \Carbon\Carbon::parse($order->created_at)->format('F d, Y') }}<br>
            <b>Account:</b> 968-34567
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>الكمية</th>
                    <th>الباقة</th>
                    <th>سعر الباقة</th>
                    <th>المجموع</th>
                </tr>
                </thead>
                <tbody>
                @foreach($arrayData as $item)
                    <tr>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ number_format($item['price']) }} ريال</td>
                        <td>{{ number_format($item['total_price_quantity']) }} ريال</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p class="lead">طرق الدفع المتوفرة:</p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">اسم الشركة</th>
                        <td>شركة منصة إعمار لخدمات الأعمال</td>
                    </tr>
                    <tr>
                        <th style="width:50%">الرقم الضريبي</th>
                        <td>311407618600004</td>
                    </tr>
                    <tr>
                        <th style="width:50%">اسم البنك</th>
                        <td>البنك الأهلي السعودي</td>
                    </tr>
                    <tr>
                        <th style="width:50%">رقم الحساب</th>
                        <td>15400000973808</td>
                    </tr>
                    <tr>
                        <th style="width:50%">رقم آيبان</th>
                        <td>SA0810000015400000973808</td>
                    </tr>
                </table>
            </div>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                {{ $order->note ? $order->note : 'لا توجد ملاحظات من العميل' }}
            </p>
        </div><!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">التفاصيل المالية </p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">المجموع النسبي:</th>
                        <td>{{ number_format($order->sub_total) }} ريال </td>
                    </tr>
                    <tr>
                        <th>الضريبة (15%)</th>
                        <td>{{ number_format($order->sub_total) }} ريال </td>
                    </tr>
                    <tr>
                        <th>الخصم </th>
                        @if($discount == null)
                            <td>{{ number_format(00) }} ريال </td>

                        @else
                            <td>{{ number_format($discount['applied']) }} ريال </td>
                        @endif
                    </tr>
                    <tr>
                        <th>المجموع:</th>
                        <td>{{ number_format($order->total) }} ريال </td>
                    </tr>
                </table>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- this row will not appear when printing -->
    {{--        <div class="row no-print">--}}
    {{--            <div class="col-xs-12">--}}
    {{--                <a href="#" target="_blank" class="btn btn-primary pull-left" onclick="print();"><i class="fa fa-print"></i> طباعة</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
</section>

<script src="{{ public_path('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ public_path('bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>
