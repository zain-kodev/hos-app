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
                        <p class="mb-0">معلومات المؤسسة</p>
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="#" target="_blank"> تعديل معلومات المؤسسة <span class="fas fa-chevron-left ms-1 fs--2"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-12 col-xl-12 pe-lg-2 mb-3">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="col-auto col-lg align-self-center">
                        </div>

                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive scrollbar">
                        <table class="table table-striped overflow-hidden">
                            <thead>
                            <tr class="btn-reveal-trigger">
                                <th scope="col">من نحن</th>
                                <th scope="col">الشروط والاحكام</th>
                                <th scope="col">سياسة الامان والخصوصية</th>
                                <th scope="col">سياسة الشحن والاسترجاع</th>
                                <th class="text-end" scope="col">الاجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($info as $item)
                                <tr class="btn-reveal-trigger">
                                    <td>{{$item->about_us}}</td>
                                    <td>{{$item->terms_condition}}</td>
                                    <td>{{ $item->privacy_policy }} </td>
                                    <td>{{ $item->shiping_return }} </td>
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
                                                    <a class="dropdown-item text-info" href="#!" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}" >تعديل</a>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">

                                        <form action="{{ route('editAppInfo') }}" method="post" id="my-awesome-dropzone">
                                            @csrf
                                            <input type="hidden" name="ProID" value="{{ $item->id }}">
                                            <div class="modal-content position-relative">
                                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">

                                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                        <h4 class="mb-1" id="modalExampleDemoLabel">تعديل بيانات المنتج </h4>
                                                    </div>

                                                    <div class="p-4 pb-0">
                                                        <div class="mb-3 min-vh-50">
                                                            <label class="col-form-label" for="message-text"> من نحن:</label>
                                                            <textarea class="form-control tinymce d-none" rows="7" name="about_us" >{{ $item->about_us }}</textarea>
                                                        </div>

                                                    </div>

                                                    <div class="p-4 pb-0">
                                                        <div class="mb-3 min-vh-50">
                                                            <label class="col-form-label" for="message-text">الشروط والاحكام:</label>
                                                            <textarea class="form-control tinymce d-none" rows="7" name="terms_condition" >{{ $item->terms_condition }}</textarea>
                                                        </div>

                                                    </div>

                                                    <div class="p-4 pb-0">
                                                        <div class="mb-3 min-vh-50">
                                                            <label class="col-form-label" for="message-text"> سياسة الخصوصية:</label>
                                                            <textarea class="form-control tinymce d-none" rows="7" name="privacy_policy" >{{ $item->privacy_policy }}</textarea>
                                                        </div>

                                                    </div>

                                                    <div class="p-4 pb-0">
                                                        <div class="mb-3 min-vh-50">
                                                            <label class="col-form-label" for="message-text"> سياسة الشحن والارجاع:</label>
                                                            <textarea class="form-control tinymce d-none" rows="7" name="shiping_return" >{{ $item->shiping_return }}</textarea>
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
    </div>
@endsection
