@extends('index')
@section('content')
<?php
$arrayData = json_decode($order->products, true);
$discount = json_decode($order->discount, true);
if (isset($arrayData[0]['variations']))
$variations = json_decode($arrayData[0]['variations'], true);

?>
    <div class="">
        <section class="content-header">
            <div class="">

                <ol class="breadcrumb">
                    <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i>الطلبات</a></li>
                    <li class="active"> تفاصيل الطلب </li>

                </ol>
            </div>
        </section>
    </div>


{{--    <div class="col-md-12" >--}}
{{--        <div class="box box-default">--}}
{{--            <div class="box-header with-border">--}}
{{--                <h3 class="box-title">تفاصيل الطلب</h3>--}}

{{--                <div class="box-tools pull-right">--}}
{{--                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <!-- /.box-tools -->--}}
{{--            </div>--}}
{{--            <!-- /.box-header -->--}}
{{--            <div class="box-body">--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="pad margin no-print">--}}
{{--        <div class="callout callout-info" style="margin-bottom: 0!important;">--}}
{{--            <h4><i class="fa fa-info"></i> Note:</h4>--}}
{{--            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> تفاصيل الطلب
                    <small class="pull-left">التاريخ: {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('F d, Y') }}</small>
                </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                الشركة
                <address>
                    <strong>منصة إعمار لخدمات الاعمال</strong><br>
                    المملكة العربية السعودية<br>
                    منطقة مكه المكرمة ، جده<br>
                    الجوال : 0500662210<br>
                    البريد الالكتروني : info@ko-design.ae
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                العميل
                <address>
                    <strong>{{ $order->name }}</strong><br>
                    العنوان : {{ $order->address }}<br>
                    الجوال : {{ $order->Ophone }}<br>
                    البريد الالكتروني : {{ $order->email }}
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>تسعيرة {{ $order->order }} </b><br>
                <br>
                <b>رقم الطلب :</b> {{ $order->order }}<br>
                <b>تاريخ الطلب :</b> {{ \Carbon\Carbon::parse($order->created_at)->format('F d, Y') }}<br>
                <b>الحساب :</b> --------
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
                        <td>{{ $item['name'] }} <br/>
                            @if(isset($variations))
                            @foreach ($variations as $item2)
                                @foreach ($item2 as $key => $value)
                                    @if ($key == 'project_type')
                                        @php
                                            $newKey = 'نوع المشروع'; // Replace 'New Value for Specific Key' with the value you want to display for the specific key
                                        @endphp

                                    @elseif($key == 'services_required')
                                        @php
                                            $newKey = 'الخدمات المطلوبة'; // Replace 'New Value for Specific Key' with the value you want to display for the specific key
                                        @endphp
                                    @elseif($key == 'land_services')
                                        @php
                                            $newKey = 'خدمات الارض'; // Replace 'New Value for Specific Key' with the value you want to display for the specific key
                                        @endphp
                                    @else
                                        @php
                                            $newKey = $key;
                                        @endphp
                                    @endif

                                    @if (is_array($value))
                                        <span><strong style="color: red">{{ $newKey }}</strong></span>: <br>
                                        @foreach ($value as $subValue)
                                            - {{ $subValue }} <br>
                                        @endforeach
                                    @else
                                        <span><strong style="color: red">{{ $newKey }}</strong></span>: {{ $value }} <br>
                                    @endif
                                @endforeach
                            @endforeach
                            @endif
                        </td>
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
{{--            <div class="col-xs-6">--}}
{{--                <p class="lead">طرق الدفع المتوفرة:</p>--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table">--}}
{{--                        <tr>--}}
{{--                            <th style="width:50%">اسم الشركة</th>--}}
{{--                            <td>شركة منصة إعمار لخدمات الأعمال</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th style="width:50%">الرقم الضريبي</th>--}}
{{--                            <td>311407618600004</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th style="width:50%">اسم البنك</th>--}}
{{--                            <td>البنك الأهلي السعودي</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th style="width:50%">رقم الحساب</th>--}}
{{--                            <td>15400000973808</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th style="width:50%">رقم آيبان</th>--}}
{{--                            <td>SA0810000015400000973808</td>--}}
{{--                        </tr>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">--}}
{{--                    {{ $order->note ? $order->note : 'لا توجد ملاحظات من العميل' }}--}}
{{--                </p>--}}
{{--            </div>--}}
            <div class="col-xs-6">
                <p class="lead">التفاصيل المالية </p>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">المجموع النسبي:</th>
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
{{--                        <tr>--}}
{{--                            <th>الضريبة (15%)</th>--}}
{{--                            <td>{{ number_format($order->total * 15 /100) }} ريال </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>المجموع:</th>--}}
{{--                            <td>{{ number_format(($order->total * 15 /100)+$order->total) }} ريال </td>--}}
{{--                        </tr>--}}
                        <tr>
                            <th>المجموع:</th>
                            <td>{{ number_format($order->total) }} ريال </td>
                        </tr>
                    </table>
                </div>
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
                <a href="{{ route('orderDetailsPrint',$order->OID) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> عرض وطباعة الفاتورة</a>
                @if($order->state == 'successful')
                <form action="{{route('acceptOrder')}}" method="post">
                    @csrf
                    <input name="id" type="hidden" value="{{ $order->OID }}">
                    <button type="submit" class="btn btn-success pull-left">الموافقة على الطلب <i class="fa fa-credit-card"></i>  </button>

                </form>
                @endif
                @if($order->state == 'complete')
                <a href="{{ url('MailInvoice') }}?order_id={{ $order->OID }}" class="btn btn-primary pull-left" style="margin-left: 5px;"><i class="fa fa-file-invoice"></i>  ارسال الفاتورة </a>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#SendRqsModal"><i class="fa fa-money"></i>ارسال سند الاستلام للعميل</a>

                @endif
                <a href="{{ url('orderVipEdit') }}/{{ $order->OID }}" class="btn bg-maroon pull-left" style="margin-left: 5px;"><i class="fa fa-download"></i> تعديل خاص  </a>
                <a class="btn btn-warning pull-left" style="margin-left: 5px;" data-toggle="modal" data-target="#PStages"><i class="fa fa-file-invoice"></i> تطبيق كوبون </a>
                <a href="{{ url('orderEdit') }}/{{ $order->OID }}" class="btn btn-success pull-left" style="margin-left: 5px;" target="_blank"><i class="fa fa-file-invoice"></i> تعديل الطلب </a>
                <a href="{{ url('InvoiceView') }}?order={{ $order->order }}&&order_id={{ $order->OID }}" class="btn btn-danger pull-left" style="margin-left: 5px;"><i class="fa fa-print"></i>  تحميل الفاتورة </a>
            </div>
        </div>
    </section>
<!-- /.content -->
    <div class="clearfix"></div>

<div class="modal fade" id="SendRqsModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                اكتب مبلغ السند
            </div>
            <div class="modal-body">

                <form action="{{ url('sendRQS') }}" method="POST">
                    @csrf
                    <input type="hidden" name="bennar" value="{{ $order->order }}">
                    <input type="hidden" name="total" value="{{ $order->total }}">
                    <div class="form-inline">
                        <label>
                            <input type="number" name="soa" class="form-control" placeholder="اكتب مبلغ السند " required="required"/>
                        </label>
                        <label>
                            <input type="text" name="for_what" class="form-control" placeholder="اكتب مقابل السند " required="required"/>
                        </label>

                    </div>
                    <div class="form-inline">

                        <select class="form-control select2" name="currency" style="width: 50%">
                            <option>اختر العملة</option>
                            <option value="ريال">ريال</option>
                            <option value="درهم">درهم</option>

                        </select>
                    </div>

                    <div class="form-inline">
                        <select class="form-control select2" name="bank" style="width: 50%">
                            <option>اختر البنك</option>
                            <option value="AJMAN BANK">عجمان</option>
                            <option value="ENMA BANK">الانماء</option>
                            <option value="AHLI BANK">الاهلي</option>
                        </select>
                        <label>
                            <input type="date" name="DRP" class="form-control" required="required"/>
                        </label>
                        <label>
                            <button type="submit" class="btn btn-warning">ارسال</button>
                        </label>

                    </div>
                </form>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="orderEdit" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تعديل الطلب </h4>
            </div>
            <div class="modal-body">


                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الباقة</th>
                            <th>السعر</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($arrayData as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ number_format($item['price']) }}</td>
                                <td>
                                    <form action="{{ route('removeFromOrderUpdate') }}" method="post">
                                        @csrf
                                        <input name="oid" type="hidden" value="{{ $order->OID }}">
                                        <input name="kid" type="hidden" value="{{ $key }}">
                                        <button class="btn bg-navy" type="submit">حذف من الطلب</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <h3 class="box-title">إضافة منتجات للطلب</h3>
                <form method="POST" action="{{ route('addToOrderUpdate') }}">
                    @csrf
                    <input name="oid" type="hidden" value="{{ $order->OID }}">
                    <div class="form-group">
                        <label for="State" class="control-label">اختر منتجات لاضافتها</label>
                        <div class="">
                            <select name="products[]" class="form-control select2" style="width: 100%" multiple="multiple">
                                @foreach($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}- <strong>{{ $item->price }} </strong></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-plus"></i>
                        إضافة
                    </button>
                </form>
            </div>
            <div class="modal-footer">


            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="PStages" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تطبيق كوبون</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(array('route'=>'applyCoupon','id'=>'','class'=>'form-horizontal')) }}
                <input name="oid" type="hidden" value="{{ $order->OID }}">
                <div class="form-group">
                    <label for="State" class="col-sm-2 control-label">الكوبون</label>
                    <div class="col-sm-8">
                        <select name="coupon" class="form-control select2" style="width: 100%">
                            @foreach($coupons as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}- <strong>{{ $item->code }} - {{ $item->type }} - {{ $item->value }}</strong></option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                    تطبيق
                </button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<script>
    function removeItem(name) {
        var products = JSON.parse(document.querySelector('textarea[name="products"]').value);

        var newProducts = products.filter(item => item.name !== name);

        document.querySelector('textarea[name="products"]').value = JSON.stringify(newProducts);

        // Update the table
        location.reload();
    }
</script>
@endsection
