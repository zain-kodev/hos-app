<?php
$arrayData = json_decode($order->products, true);
$discount = json_decode($order->discount, true);

?>
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
{{--    <script src="{{ public_path('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>--}}
{{--    <link rel="stylesheet" href="{{ public_path('bootstrap/css/bootstrap.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ public_path('dist/css/font-awesome.css') }}">--}}
{{--    <script src="{{ public_path('bootstrap/js/bootstrap.min.js') }}"></script>--}}
{{--    <link rel="stylesheet" href="{{ public_path('dist/css/AdminLTE.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ public_path('dist/css/skins/_all-skins.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ public_path('dist/fonts/fonts-fa.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ public_path('dist/css/bootstrap-rtl.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ public_path('style.css') }}">--}}
    <style>
        body { font-family: DejaVu Sans, sans-serif;direction: rtl ;text-align:right;}
    </style>
    <!-- Favicon -->

    <style type="text/css">
        .invoice{
            border: 0px !important;
        }
        .row{
            width: 100%;
        }
        .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
            float: right;
        }
        .col-sm-4 {
            width: 33.33333333%;
        }

        .col-sm-6 {
            width: 50%;
        }
        .col-sm-8 {
            width: 70%;
        }
        .col-sm-12 {
            width: 100%;
        }
        td{
            float: right;
            direction: rtl;
        }
    </style>

    <style>
        {!! $cssContent5 !!}
        {!! $cssContent !!}
        {!! $cssContent2 !!}
    </style>
</head>
<body class="login-page" style="background: #ffffff !important;">


<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-sm-12">
            <h2 class="page-header">
                 تفاصيل الطلب
                <small class="pull-left" style="float: left"> {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('F d, Y') }}</small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <span >الشركة</span><br>
            <span>
                    <strong>منصة إعمار لخدمات الاعمال</strong><br>
                    المملكة العربية السعودية<br>
                    منطقة مكه المكرمة ، جده<br>
                      info@ko-design.ae
                </span>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <span>العميل</span></br>
            <span>
                    <strong>{{ $order->name }}</strong><br>
                    العنوان : {{ $order->address }}<br>
                    الجوال : {{ $order->phone }}<br>
                    البريد الالكتروني : {{ $order->email }}
                </span>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>تسعيرة {{ $order->order }} </b><br>
            <br>
            {{ $order->order }} <b>رقم الطلب :</b> <br>
            {{ \Carbon\Carbon::parse($order->created_at)->format('F d, Y') }} <b>تاريخ الطلب :</b> <br>
            -----    <b>----:</b>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Table row -->
    <div class="row" style="margin-top: 45px">
        <div class="col-sm-12 table-responsive">
            <table class="table table-striped" dir="rtl">
                <thead>
                <tr>
                    <th style="text-align: right">المجموع</th>
                    <th style="text-align: right">سعر الباقة</th>
                    <th style="text-align: right">الباقة</th>
                    <th style="text-align: right">الكمية</th>



                </tr>
                </thead>
                <tbody>
                @foreach($arrayData as $item)
                    <tr>
                        <td style="text-align: right">{{ number_format($item['total_price_quantity']) }} ريال</td>
                        <td style="text-align: right">{{ number_format($item['price']) }} ريال</td>
                        <td style="text-align: right">{{ $item['name'] }}</td>
                        <td style="text-align: right">{{ $item['quantity'] }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>{{ number_format($order->sub_total) }} ريال </strong></td>
                    <td><strong>المجموع النسبي:</strong></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    @if($discount == null)
                        <td>{{ number_format(00) }} ريال </td>

                    @else
                        <td>{{ number_format($discount['applied']) }} ريال </td>
                    @endif
                    <td><strong>الخصم</strong> </td>
                </tr>
                {{--                    <tr>--}}
                {{--                        <td></td>--}}
                {{--                        <td></td>--}}
                {{--                        <td><strong>الضريبة (15%)</strong></td>--}}
                {{--                        <td>{{ number_format($order->total * 15 /100) }} ريال </td>--}}
                {{--                    </tr>--}}
                {{--                    <tr>--}}
                {{--                        <td></td>--}}
                {{--                        <td></td>--}}
                {{--                        <td><strong>المجموع:</strong></td>--}}
                {{--                        <td><strong>{{ number_format(($order->total * 15 /100)+$order->total) }} ريال </strong></td>--}}
                {{--                    </tr>--}}

                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>{{ number_format($order->total) }} ريال </strong></td>
                    <td><strong>المجموع:</strong></td>
                </tr>
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row" style="margin-top: 50px">
        <!-- accepted payments column -->
        <!-- /.col -->

        <div class="col-sm-8">
            <p class="">طرق الدفع المتوفرة:</p>
            <div class="table-responsive">
                <table class="table" dir="rtl">
                    <tr>
                        <td style="text-align: right">شركة منصة إعمار لخدمات الأعمال</td>
                        <th  style="text-align: right">اسم الشركة</th>
                    </tr>
                    <tr>
                        <td style="text-align: right">311407618600004</td>
                        <th  style="text-align: right">الرقم الضريبي</th>
                    </tr>
                    <tr>
                        <td style="text-align: right">البنك الأهلي السعودي</td>
                        <th  style="text-align: right">اسم البنك</th>
                    </tr>
                    <tr>
                        <td style="text-align: right">15400000973808</td>
                        <th  style="text-align: right">رقم الحساب</th>
                    </tr>
                    <tr>
                        <td style="text-align: right">SA0810000015400000973808</td>
                        <th  style="text-align: right">رقم آيبان</th>
                    </tr>
                </table>
            </div>

        </div>
        <div class="col-sm-6">

        </div><!-- /.col -->
    </div><!-- /.row -->
    @if(isset($order->invoice_note))
        <div class="row">
            <div class="text-muted well well-sm no-shadow">
                {!! $order->invoice_note !!}
            </div>
        </div>
    @endif

    <!-- this row will not appear when printing -->
    {{--        <div class="row no-print">--}}
    {{--            <div class="col-xs-12">--}}
    {{--                <a href="#" target="_blank" class="btn btn-primary pull-left" onclick="print();"><i class="fa fa-print"></i> طباعة</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
</section>



</body>
</html>
