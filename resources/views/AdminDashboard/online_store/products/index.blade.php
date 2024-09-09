@extends('AdminDashboard.layouts.layout')
@section('content')

    <div class="row g-0">
        <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url('{{ asset('assets/img/illustrations/corner-4.png') }}');">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>تحكم في التطبيق</h3>
                        <p class="mb-0">المنتجات</p>
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="#" target="_blank"> قائمة المنتجات <span class="fas fa-chevron-left ms-1 fs--2"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-7 col-xl-8 pe-lg-2 mb-3">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="col-auto col-lg align-self-center">
                            <h5 class="mb-0" data-anchor="data-anchor">قائمة المنتجات </h5>
                        </div>

                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive scrollbar">
                        <table class="table table-striped overflow-hidden">
                            <thead>
                            <tr class="btn-reveal-trigger">
                                <th scope="col">المنتج</th>
                                <th scope="col">القسم</th>
                                <th scope="col">السعر</th>
                                <th class="text-end" scope="col">الاجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                    <tr class="btn-reveal-trigger">
                                        <td><a href="{{ route('productEdit',$item->ProID) }}">{{$item->ProName}}</a> </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{ number_format($item->price) }} ر.س </td>
                                        <td class="text-end">
                                            <div class="dropdown font-sans-serif position-static">
                                                <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                                <span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-0">
                                                    <div class="bg-white py-2">
                                                        <a class="dropdown-item text-info" href="{{ route('productEdit',$item->ProID) }}">تعديل</a>
                                                        <a class="dropdown-item text-danger" href="#!">حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-xl-4 ps-lg-2 mb-3">
            <div class="card h-lg-100">
                <div class="card-header d-flex flex-between-center bg-light py-2">
                    <h6 class="mb-0">التصنيفات</h6><a class="py-1 fs--1 font-sans-serif" href="#!"></a>
                </div>
                <div class="card-body pb-0">
                    @foreach($cats as $cat)
                        <?php

                        $count = DB::table('products')->where('category_id',$cat->id)->count();
                        ?>
                    <div class="d-flex mb-3 hover-actions-trigger align-items-center">
                        <div class="file-thumbnail">
                            <img class="border h-100 w-100 fit-cover rounded-2" src="assets/img/products/5-thumb.png" alt="" />
                        </div>
                        <div class="ms-3 flex-shrink-1 flex-grow-1">
                            <h6 class="mb-1">
                                <a class="stretched-link text-900 fw-semi-bold" href="{{ url('products') }}/category/{{ $cat->slug }}">{{ $cat->name }}</a>
                            </h6>
                            <div class="fs--1"><span class="fw-semi-bold">{{ $count }}</span></div>
                        </div>
                    </div>
                    <hr class="bg-200" />
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
