@extends('index')
@section('content')
    <?php
    $arrayData = json_decode($order->products, true);
    $discount = json_decode($order->discount, true);
    if (isset($arrayData[0]['variations']))
        $variations = json_decode($arrayData[0]['variations'], true);

    ?>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <div id="item-template" style="display: none; margin-top: 20px;margin-bottom: 15px;">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">العدد</label>
                    <input type="number" name="count[]" class="form-control"  placeholder="عددالمنتج او الخدمة" required="required">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">اسم المنتج او الخدمة</label>
                    <input type="text" name="name[]" class="form-control" placeholder="اسم المنتج" required="required">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">السعر</label>
                    <input type="number" name="price[]" class="form-control" placeholder="سعر المنتج" required="required">
                </div>
            </div>

        </div>
    </div>
    <div class="">
        <section class="content-header">
            <div class="">

                <ol class="breadcrumb">
                    <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i>الطلبات</a></li>
                    <li class="active"> تعديل الطلب </li>

                </ol>
            </div>
        </section>
    </div>


    <div class="col-md-12" >
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل الطلب</h3>

                <div class="box-tools pull-right">

                    <button class="btn btn-flat bg-maroon" data-toggle="modal" data-target="#orderEdit">
                        إضافة خاصة
                    </button>

                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>العدد</th>
                            <th>الباقة</th>
                            <th>السعر</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($arrayData as $key => $item)

                            <tr>
                                <td>{{ $item['quantity'] }}</td>
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
                        <tr>
                            <td></td>
                            <td><strong>المجموع</strong></td>
                            <td>SAR <strong>{{ number_format($order->total) }}</strong></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="orderEdit" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="btn btn-flat bg-maroon" id="addNewRow">
                        إضافة منتج
                    </button>

                </div>

                <form action="{{ route('addToOrderVipUpdate') }}" method="post">
                    @csrf
                    <input name="oid" type="hidden" value="{{ $order->OID }}">

                    <div class="modal-body">

                        <div id="clo">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">العدد</label>
                                        <input type="number" name="count[]" class="form-control"  placeholder="عددالمنتج او الخدمة" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">اسم المنتج او الخدمة</label>
                                        <input type="text" name="name[]" class="form-control" placeholder="اسم المنتج" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">السعر</label>
                                        <input type="number" name="price[]" class="form-control" placeholder="سعر المنتج" required="required">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-plus"></i>
                            حفظ
                        </button>
                    </div>
                </form>


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
    <script>
        $(document).ready(function() {
            $('#addNewRow').on('click', function() {
                console.log('click');
                var itemTemplate = $('#item-template').html();
                $("#clo").append(itemTemplate);
            });
        });
        function removeItem(name) {
            var products = JSON.parse(document.querySelector('textarea[name="products"]').value);

            var newProducts = products.filter(item => item.name !== name);

            document.querySelector('textarea[name="products"]').value = JSON.stringify(newProducts);

            // Update the table
            location.reload();
        }
    </script>
@endsection
