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

    <!-- Favicon -->
 <style>
     @font-face {
         font-family: 'IBM' ;
         src: url('https://ko-sky.net/fonts/IBMPlexSansArabic-Regular.ttf') format("truetype");
         font-weight: 400;
         font-style: normal;
     }
     body {
         /*font-family: DejaVu Sans, sans-serif;*/
         font-family: 'IBM' !important;
         direction: rtl ;
         text-align:right;
     }
     h1,h2,h3,h4,h5,th{
         font-family: 'IBM';
     }
     h4 {
         font-family: 'IBM';
         margin: 0;
     }
     h2{
         font-family: 'IBM';
     }

     .w-full {
         direction: rtl;
         text-align: right;
         width: 100%;
     }

     .w-half {
         direction: rtl;
         text-align: right;
         width: 50%;
     }
     .w-q {
         direction: rtl;
         text-align: right;
         width: 25%;
     }

     .margin-top {
         margin-top: 1.25rem;
     }

     .footer {
         font-size: 0.875rem;
         padding: 1rem;
         background-color: rgb(241, 245, 249);
     }

     table {
         width: 100%;
         border-spacing: 0;
         direction: rtl;
     }

     table.products {
         font-size: 0.875rem;
     }

     table.products tr {
         font-family: 'IBM';
         background-color: rgb(96, 165, 250);
     }

     table.products th {
         font-family: 'IBM';
         color: #ffffff;
         padding: 0.5rem;
     }

     table tr.items {
         background-color: rgb(241, 245, 249);
     }

     table tr.items td {
         padding: 0.5rem;
     }

     .total {
         direction: rtl;
         text-align: right;
         margin-top: 1rem;
         font-size: 0.875rem;
     }

 </style>

</head>
<body>

<table class="w-full">
    <tr>
        <td class="w-half">
            <h4 style="font-family: 'IBM'">Bank</h4>
            <div>البنك الأهلي السعودي</div>
            <div>رقم الحساب : 15400000973808</div>
            <div> SA0810000015400000973808 رقم آيبان </div>
        </td>
        <td class="w-q">
            <img src="https://ko-sky.net/logo20222.svg" alt="E'MMAR" width="200" />
        </td>
    </tr>
</table>

<div class="margin-top">
    <table class="w-full">
        <tr>
            <td class="w-half">
                <h4 style="font-family: 'IBM'">To</h4>
                <div>{{ $order->name }}</div>
                <div>{{ $order->email  }}</div>
                <div>{{ $order->Ophone  }}</div>
            </td>
            <td class="w-half">
                <h4 style="font-family: 'IBM'">From</h4>
                <div>منصة إعمار لخدمات الاعمال</div>
                <div>info@ko-design.ae</div>
                <div>+966500662210</div>
            </td>

        </tr>
    </table>
</div>

<div class="margin-top">
    <table class="products">
        <tr>
            <th style="font-family: 'IBM'">Total</th>
            <th style="font-family: 'IBM'">Price</th>
            <th style="font-family: 'IBM'">Package</th>
            <th style="font-family: 'IBM'">QTY</th>
        </tr>

            @foreach($arrayData as $item)
            <tr class="items">
                <td style="text-align: right">{{ number_format($item['total_price_quantity']) }} SAR</td>
                <td style="text-align: right">{{ number_format($item['price']) }} SAR</td>
                <td style="text-align: right">{{ $item['name'] }}</td>
                <td style="text-align: right">{{ $item['quantity'] }}</td>
            </tr>
            @endforeach

    </table>
</div>



<div class="total">
    <table>
        <tr class="items">
            <td style="text-align: right">
               <span>  {{ number_format($order->sub_total) }} SAR</span>
            </td>
            <td style="text-align: right">المجموع النسبي</td>
        </tr>
        <tr class="items">
            <td style="text-align: right">
                @if($discount == null)
                     0.00
                @else
                         {{ number_format($discount['applied']) }} SAR
                @endif
            </td>
            <td style="text-align: right">الخصم</td>
        </tr>
        <tr class="items">
            <td style="text-align: right">{{ number_format($order->total) }} SAR </td>
            <td style="text-align: right">المجموع</td>
        </tr>
    </table>
</div>
@if(isset($order->invoice_note))
<div class="footer margin-top">
    {!! $order->invoice_note !!}
</div>
@endif

<div class="footer margin-top">
    <div>شكرا</div>
    <div>&copy; E'MMAR PLATFORM</div>
</div>

</body>
</html>
