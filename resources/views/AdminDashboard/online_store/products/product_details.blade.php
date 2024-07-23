@extends('index')
@section('content')

    <div class="">
        <section class="content-header">
            <div class="">

                <ol class="breadcrumb">
                    <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> المتجر الالكتروني</a></li>
                    <li><a href="{{ url('products') }}"><i class="fa fa-dashboard"></i>المنتجات</a></li>
                    <li class="active">  تفاصيل المنتج </li>

                </ol>
            </div>
        </section>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">بيانات الباقة</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 table-responsive" >
                            <table class="table table-striped" >

                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>اسم المنتج</td>
                                    <td>
                                        <div class="col-sm-10">
                                            {{ $product->ProName }}
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td> السعر</td>
                                    <td>
                                        <div class="col-sm-10">
                                            {{ number_format($product->price) }} ريال
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td> الاسم المختصر </td>
                                    <td>
                                        <div class="col-sm-10">
                                            {{ $product->sentence }}
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>الرابط</td>
                                    <td>
                                        <div class="col-sm-10">
                                            {{ $product->slug }}
                                        </div>
                                    </td>

                                </tr>

                                </tbody>

                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="box-footer">
                    </div>

                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">بيانات الباقة</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 table-responsive" >
                            <table class="table table-striped" >

                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>القسم</td>
                                    <td>
                                        <div class="col-sm-10">
                                            {{ $product->name }}
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td> الوصف المختصر</td>
                                    <td>
                                        <div class="col-sm-10">
                                            {{ $product->description_min }}
                                        </div>
                                    </td>

                                </tr>


                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="box-footer">
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <div class="col-md-12" >
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">تفاصيل المنتج</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! $product->description_max !!}
                <div class="" style="margin-bottom: 20px">
                    {{--                    <a href="{{ url('emoployeeCreate') }}" class="btn btn-info" name="emoployeeCreate" id="Town"><i class="fa fa-plus"></i> اضافة موظف</a>--}}

                </div>

            </div>
        </div>
    </div>
@endsection
