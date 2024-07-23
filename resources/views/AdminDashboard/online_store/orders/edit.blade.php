@extends('index')
@section('content')
    <?php
    $arrayData = json_decode($order->products, true);
    $discount = json_decode($order->discount, true);
    if (isset($arrayData[0]['variations']))
        $variations = json_decode($arrayData[0]['variations'], true);

    ?>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

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

                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
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
                                <select name="products[]" class="form-control select2" style="width: 50%" multiple="multiple">
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
            </div>
        </div>

    <div class="col-md-12" >
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">معلومات اخرى عن الطلب</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="POST" action="{{ route('editInvoiceNote') }}">
                    @csrf
                    <input name="oid" type="hidden" value="{{ $order->OID }}">
                    <div class="form-group">
                        <label for="State" class="control-label text-danger" style="margin: 20px">سيتم اضافة هذا الجزء في آخر الفاتورة</label>
                        <textarea name="invoice_note" class="textarea" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $order->invoice_note }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg btn-flat btn-block">حفظ</button>
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

        function removeItem(name) {
            var products = JSON.parse(document.querySelector('textarea[name="products"]').value);

            var newProducts = products.filter(item => item.name !== name);

            document.querySelector('textarea[name="products"]').value = JSON.stringify(newProducts);

            // Update the table
            location.reload();
        }
    </script>
@endsection
