@extends('logo2')
@section('content')
    <?php
    $arrayData = json_decode($order->products, true);
    $discount = json_decode($order->discount, true);
    ?>
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <img src="{{ asset('emr_logo.png') }}" style="width: 70px;height: 70px;">تسعيرة
                    <small class="pull-left">التاريخ: {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('F d, Y') }}</small>
                </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                طريقة الدفع
                <address>
                    <strong>منصة إعمار لخدمات الاعمال</strong><br>
                    الرقم الضريبي : <strong>311407618600004</strong><br>
                     اسم البنك :<strong>البنك الأهلي السعودي</strong><br>
                    رقم الحساب : <strong>15400000973808</strong><br>
                    رقم آيبان : <strong>SA0810000015400000973808</strong><br>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                العميل
                <address>
                    <strong>{{ $order->name }}</strong><br>
                    العنوان : {{ $order->address }}<br>
                    الجوال : {{ $order->phone }}<br>
                    البريد الالكتروني : {{ $order->email }}
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>الفاتورة {{ $order->order }} </b><br>
                <br>
                <b>رقم الطلب :</b> {{ $order->order }}<br>
                <b>تاريخ الطلب :</b> {{ \Carbon\Carbon::parse($order->created_at)->format('F d, Y') }}<br>
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
                    <tr>
                        <td></td>
                        <td></td>
                        <td><strong>المجموع النسبي:</strong></td>
                        <td><strong>{{ number_format($order->sub_total) }} ريال </strong></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><strong>الخصم</strong> </td>
                        @if($discount == null)
                            <td>{{ number_format(00) }} ريال </td>

                        @else
                            <td>{{ number_format($discount['applied']) }} ريال </td>
                        @endif
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
                        <td><strong>المجموع:</strong></td>
                        <td><strong>{{ number_format($order->total) }} ريال </strong></td>
                    </tr>
                    </tbody>
                </table>
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
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="#" target="_blank" class="btn btn-primary pull-left" onclick="print();"><i class="fa fa-print"></i> طباعة</a>
            </div>
        </div>
    </section>

@endsection
