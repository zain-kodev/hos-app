<?php

$cancelled_orders_count = $cou->filter(function($order) {
    return $order->state === 'canceled';
})->count();

$waiting_orders_count = $cou->filter(function($order) {
    return $order->state === 'waiting';
})->count();
$successful_orders_count = $cou->filter(function($order) {
    return $order->state === 'successful';
})->count();
$complete_orders_count = $cou->filter(function($order) {
    return $order->state === 'complete';
})->count();
?>
@extends('index')
@section('content')

    <div class="">
        <section class="content-header">
            <div class="">

                <ol class="breadcrumb">
                    <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> المتجر الالكتروني</a></li>
                    <li class="active"> الطلبات الجديدة </li>

                </ol>
            </div>
        </section>
    </div>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$cou->count()}}</h3>
                    <p> جميع الطلبات</p>
                </div>
                <div class="icon">
                    <i class="fa fa-tasks"></i>
                </div>
                <a href="{{ url('newOrders') }}" class="small-box-footer">
                    المزيد <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$complete_orders_count}}<sup style="font-size: 20px"></sup></h3>
                    <p>الطلبات المقبولة </p>
                </div>
                <div class="icon">
                    <i class="fa fa-line-chart"></i>
                </div>
                <a href="{{url('newOrders')}}/type/complete" class="small-box-footer">
                    المزيد <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $successful_orders_count }}</h3>
                    <p>الطلبات الجديدة</p>
                </div>
                <div class="icon">
                    <i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>
                </div>
                <a href="{{url('newOrders')}}/type/successful" class="small-box-footer">
                    المزيد <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $waiting_orders_count }}</h3>
                    <p>في انتظار الدفع</p>
                </div>
                <div class="icon">
                    <i class="fa fa-folder-open"></i>
                </div>
                <a href="{{url('newOrders')}}/type/waiting" class="small-box-footer">
                    المزيد <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
    </div>

    <div class="col-md-12" >
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">قائمة الطلبات الجديدة</h3>
                <div class="box-tools pull-right">
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#PStages">
                        <i class="fa fa-plus"></i>
                        إنشاء طلب جديد
                    </a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="" style="margin-bottom: 20px">
{{--                    <a href="{{ url('emoployeeCreate') }}" class="btn btn-info" name="emoployeeCreate" id="Town"><i class="fa fa-plus"></i> اضافة موظف</a>--}}

                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم العميل</th>
                        <th>حالة الطلب</th>
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
                            <td>
                                @if('successful' == $Single->state)
                                    <span class="badge bg-blue">جديد</span>
                                @elseif('refunded' == $Single->state)
                                    <span class="badge bg-warning">refunded</span>
                                @elseif('canceled' == $Single->state)
                                    <span class="badge bg-red">تم الغاءه</span>
                                @elseif('complete' == $Single->state)
                                    <span class="badge bg-green">تم قبوله</span>
                                @endif

                            </td>
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
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="PStages" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">انشاء طلب جديد</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('route'=>'createNewOrder','id'=>'','class'=>'form-horizontal')) }}
                    <div class="form-group">
                        <label for="State" class="col-sm-2 control-label">العميل</label>
                        <div class="col-sm-8">
                            <select name="usr_id" class="form-control select2" style="width: 100%">
                                @foreach($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="State" class="col-sm-2 control-label">المنتجات</label>
                        <div class="col-sm-8">
                            <select name="pro_id[]" class="form-control select2" multiple="multiple" data-placeholder="----اختر الباقات المطلوبة----" style="width: 100%">
                                @foreach($products as $item)
                                    <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="State" class="col-sm-2 control-label">ملاحظات العميل</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="usr_note" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-plus"></i>
                        حفظ
                    </button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
