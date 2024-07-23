@extends('index')
@section('content')
<?php
use Illuminate\Support\Facades\DB;$db_ext = DB::connection('OnlineStoreDB');?>
    <div class="">
        <section class="content-header">
            <div class="">

                <ol class="breadcrumb">
                    <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> المتجر الالكتروني</a></li>
                    <li class="active">  المنتجات والباقات </li>

                </ol>
            </div>
        </section>
    </div>

{{-- @include('online_store.products.stats')--}}
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">الاقسام</h3>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        @foreach($cats as $cat)
                            <?php

                            $count = $db_ext->table('ic_products')->where('category_id',$cat->id)->count();
                            ?>
                        <li class="">
                            <a href="{{ url('products') }}/category/{{ $cat->slug }}">
                                 {{ $cat->name }}
                                <span class="label label-default pull-left">{{ $count }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /. box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">التفعيل</h3>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ url('products') }}/available/1"><i class="fa fa-circle-o text-red"></i> المنتجات المفعلة</a></li>
                        <li><a href="{{ url('products') }}/available/0"><i class="fa fa-circle-o text-yellow"></i> الغير مفعلة</a></li>
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-9" >
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">قائمة الباقات والخدمات والمنتجات</h3>

                    <div class="box-tools pull-right">
                        <a href="#" class="btn btn-danger">
                            <i class="fa fa-plus"></i>
                            إضافة منتج جديد
                        </a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="" style="margin-bottom: 20px">
                        {{--                    <a href="{{ url('emoployeeCreate') }}" class="btn btn-info" name="emoployeeCreate" id="Town"><i class="fa fa-plus"></i> اضافة موظف</a>--}}

                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>اسم المنتج</th>
                            {{--                        <th>وصف مختصر</th>--}}
{{--                            <th>اسم مختصر</th>--}}
                            <th>القسم</th>
                            <th> السعر</th>
{{--                            <th>تفاصيل المنتج</th>--}}
                            <th>خيارات</th>


                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($products))
                            @foreach($products as $Single)
                                <tr>
                                    <td>{{$Single->ProName}}</td>
                                    {{--                                <td>{{$Single->description_min}}</td>--}}
{{--                                    <td>{{ $Single->sentence }}</td>--}}
                                    <td>{{$Single->name}}</td>
                                    <td>{{ number_format($Single->price) }} SAR</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>خيارات
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a class="" href="{{url('productEdit')}}/{{ $Single->ProID }}" target="_blank">تعديل</a>
                                                </li>
                                                <li>
                                                    <a class="" href="{{ url('productDetails')}}/{{ $Single->ProID }}" target="_blank">تفاصيل</a>
                                                </li>
                                                <li>
                                                    <a class="" href="#" target="_blank">حذف</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
