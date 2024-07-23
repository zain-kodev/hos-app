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
                                        <td>{{$item->ProName}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{ number_format($item->price) }} SAR</td>
{{--                                        <td>--}}
{{--                                            @if($item->active == 0)--}}
{{--                                                <span class="badge badge rounded-pill d-block p-2 badge-soft-primary">في الانتظار<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>--}}
{{--                                            @else--}}
{{--                                                <span class="badge badge rounded-pill d-block p-2 badge-soft-success"> تمت الموافقة<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>--}}

{{--                                            @endif--}}
{{--                                        </td>--}}

                                        <td class="text-end">
                                            <div class="dropdown font-sans-serif position-static">
                                                <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-0">
                                                    <div class="bg-white py-2">
                                                        <a class="dropdown-item text-info" href="#!" data-bs-toggle="modal" data-bs-target="#edit{{ $item->ProID }}" >تعديل</a>
                                                        <a class="dropdown-item text-success" href="#!">تفاصيل</a>
                                                        <a class="dropdown-item text-danger" href="#!">حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit{{ $item->ProID }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">

                                            <form action="{{ route('PostProductEdit') }}" method="post" id="my-awesome-dropzone">
                                                @csrf
                                                <input type="hidden" name="ProID" value="{{ $item->ProID }}">
                                                <div class="modal-content position-relative">
                                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">

                                                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-0">
                                                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                            <h4 class="mb-1" id="modalExampleDemoLabel">تعديل بيانات المنتج </h4>
                                                        </div>
                                                        <div class="p-4 pb-0">
                                                        <div class="col-12 mb-3">
                                                            <label class="form-label" for="event-name">اسم المنتج</label>
                                                            <input class="form-control" name="name" type="text" placeholder="عنوان الفعالية" value="{{ $item->ProName }}"/>
                                                        </div>

                                                        <div class="col-12 mb-3">
                                                            <label class="form-label" for="event-name">عبارة مختصرة</label>
                                                            <input class="form-control" name="sentence" type="text"  value="{{ $item->sentence }}"/>
                                                        </div>

                                                        <div class="col-12 mb-3">
                                                            <label class="form-label" for="event-name">التصنيف </label>
                                                            <select name="category_id" class="form-select" >
                                                                @foreach($cats as $category)
                                                                    <option value="{{ $category->id }}"  @if($category->id == $item->category_id) selected="selected" @endif>{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                            <div class="col-12 mb-3">
                                                                <label class="form-label" for="event-name">سعر المنتج</label>
                                                                <input class="form-control" name="price" type="number"  value="{{ $item->price }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="p-4 pb-0">
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="message-text">وصف المنتج:</label>
                                                                <textarea class="form-control" rows="5" name="description_min" >{{ $item->description_min }}</textarea>
                                                            </div>

                                                        </div>

                                                        <div class="p-4 pb-0">
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="message-text">تفاصيل المنتج:</label>
                                                                <textarea class="form-control" rows="7" name="description_max" >{{ $item->description_max }}</textarea>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">إغلاق</button>

                                                        <button class="btn btn-primary" type="submit">ارسال </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
