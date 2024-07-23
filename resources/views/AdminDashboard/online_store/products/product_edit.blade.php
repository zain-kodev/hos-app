@extends('index')
@section('content')
    <style>
        .photo-container {
            position: relative;
            display: inline-block;
        }

        .buttons {
            position: absolute;
            bottom: 80%;
            left: 80%;

        }

        .photo-container:hover .buttons {
            opacity: 1;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <div class="">
        <section class="content-header">
            <div class="">

                <ol class="breadcrumb">
                    <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> المتجر الالكتروني</a></li>
                    <li class="active"> تعديل بيانات الباقة </li>

                </ol>
            </div>
        </section>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal" method="POST" action="{{ route('PostProductEdit') }}">
        @csrf
        <input type="hidden" name="ProID" value="{{ $product->ProID }}">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"> تعديل البيانات</h3>

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
                            <div class="form-group">
                                <label for="State" class="col-sm-2 control-label">اسم المنتج</label>
                                <div class="col-sm-8">
                                    <input  class="form-control" name="name" value="{{ $product->ProName }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="State" class="col-sm-2 control-label">القسم</label>
                                <div class="col-sm-8">
                                    <select name="category_id" class="form-control select2" style="width: 100%">
                                        @foreach($categories as $item)
                                            <option value="{{ $item->id }}"  @if($item->id == $product->category_id) selected="selected" @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
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
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"> تعديل البيانات</h3>

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
                            <div class="form-group">
                                <label for="State" class="col-sm-2 control-label">السعر</label>
                                <div class="col-sm-8">
                                    <input  class="form-control" type="number" name="price" value="{{ $product->price }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="State" class="col-sm-2 control-label">الاسم المختصر</label>
                                <div class="col-sm-8">
                                    <input  class="form-control" name="sentence" value="{{ $product->sentence }}">
                                </div>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="State" class="col-sm-2 control-label">الرابط</label>--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    <input  class="form-control" name="slug" value="{{ $product->slug }}">--}}
{{--                                </div>--}}
{{--                            </div>--}}

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
                    <h3 class="box-title">الوصف المختصر</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <textarea class="textarea" name="description_min" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {{ $product->description_min }}
                </textarea>

                </div>
                <div class="box-footer">

                </div>
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
                    <textarea class="textarea" name="description_max" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {{ $product->description_max }}
                </textarea>

            </div>
            <div class="box-footer">
                <button class="btn btn-default btn-block btn-warning">حفظ البيانات</button>
            </div>
        </div>
    </div>
    </form>
    <div class="col-md-12" >
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> صور المنتج</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class='row margin-bottom'>
                    <div class='col-sm-6'>
                        <div class="photo-container">
                            @if(\App\Helpers\MyAws::GetLocalUrl($product->img) == 'Unknown' )
                                <img class='img-responsive' src="{{ asset('dist/img/placeholder.png') }}" alt='Photo'>
                                <div class="buttons">
                                    <button class="update-button btn-info">ارفق الصورة</button>
                                </div>
                            @else
                                <img class='img-responsive' src="{{ \App\Helpers\MyAws::GetLocalUrl($product->img) }}" alt='Photo'>
                                <div class="buttons">
                                    <button class="update-button btn-info">تحديث الصورة </button>
                                </div>
                            @endif

                        </div>
                    </div><!-- /.col -->
                    <div class='col-sm-6'>
                        <div class='row'>
                            @foreach($images as $img)
                                <div class='col-sm-6'>
                                    <div class="photo-container">
                                        @if(\App\Helpers\MyAws::GetLocalUrl($img->img) == 'Unknown' )
                                            <img class='img-responsive' src="{{ asset('dist/img/placeholder.png') }}" alt='Photo'>
                                            <div class="buttons">
                                                <button class="update-button btn-info">ارفق الصورة</button>
                                            </div>
                                        @else
                                            <img class='img-responsive' src="{{ \App\Helpers\MyAws::GetLocalUrl($img->img) }}" alt='Photo'>
                                            <div class="buttons">
                                                <button class="update-button btn-info">تحديث الصورة</button>
                                            </div>
                                        @endif
                                    </div>
                                </div><!-- /.col -->
                            @endforeach
                        </div><!-- /.row -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            <div class="box-footer">

            </div>
        </div>
    </div>
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            //CKEDITOR.replace('editor1');
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });
    </script>
@endsection
