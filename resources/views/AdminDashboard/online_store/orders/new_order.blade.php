@extends('index')
@section('content')
<!--    --><?php
//    $arrayData = json_decode($order->products, true);
//    ?>
    <div class="">
        <section class="content-header">
            <div class="">

                <ol class="breadcrumb">
                    <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i>الطلبات</a></li>
                    <li class="active">  طلب جديد </li>

                </ol>
            </div>
        </section>
    </div>
<form class="form-horizontal" method="POST" action="{{ route('PostProductEdit') }}">
@csrf
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">طلب جديد</h3>

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
{{--                            <div class="form-group">--}}
{{--                                <label for="State" class="col-sm-2 control-label">اسم المنتج</label>--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    <input  class="form-control" name="name" value="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="State" class="col-sm-2 control-label">القسم</label>
                                <div class="col-sm-8">
                                <select name="category_id" class="form-control select2" style="width: 100%">
                                    @foreach($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="State" class="col-sm-2 control-label">القسم</label>
                                <div class="col-sm-8">
                                <select name="category_id" class="form-control select2" style="width: 100%">
                                    @foreach($products as $item)
                                        <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="State" class="col-sm-2 control-label">ملاحظات العميل</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description_min" rows="3"></textarea>
                                </div>
                            </div>
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
{{--        <div class="col-md-6">--}}
{{--            <div class="box box-default">--}}
{{--                <div class="box-header with-border">--}}
{{--                    <h3 class="box-title">طلب جديد</h3>--}}

{{--                    <div class="box-tools pull-right">--}}
{{--                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <!-- /.box-tools -->--}}
{{--                </div>--}}
{{--                <!-- /.box-header -->--}}
{{--                <div class="box-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xs-12 table-responsive" >--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="State" class="col-sm-2 control-label">السعر</label>--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    <input  class="form-control" name="price" value="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="State" class="col-sm-2 control-label">الرابط</label>--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    <input  class="form-control" name="slug" value="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="State" class="col-sm-2 control-label">الوصف المختصر</label>--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.col -->--}}
{{--                    </div>--}}
{{--                    <div class="box-footer">--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--                <!-- /.box-body -->--}}
{{--            </div>--}}
{{--            <!-- /.box -->--}}
{{--        </div>--}}
    </div>
</form>



@endsection
