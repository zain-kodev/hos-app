@extends('AdminDashboard.layouts.layout')
@section('content')

    <div class="row g-0">
        <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(public/assets/img/illustrations/corner-4.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>  لوحة التحكم</h3>
                        <p class="mb-0">الحملات الترويجية</p>
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="{{ url('/') }}" target="_blank"> قائمة القوالب <span class="fas fa-chevron-left ms-1 fs--2"></span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
            <div class="bg-danger me-3 icon-item"><svg class="svg-inline--fa fa-times-circle fa-w-16 text-white fs-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path></svg><!-- <span class="fas fa-times-circle text-white fs-3"></span> Font Awesome fontawesome.com --></div>
            <p class="mb-0 flex-1">{!! session('status') !!}  </p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto col-lg align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor">قائمة القوالب</h5>
                </div>
                <div class="col-6 col-sm-auto ms-auto text-end ps-0">

                    <div id="table-purchases-replace-element">
                        <a class="btn btn-falcon-success btn-sm" href="#!" data-bs-toggle="modal" data-bs-target="#newTemp">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="d-none d-sm-inline-block ms-1">اضافة قالب جديد</span>
                        </a>

                    </div>
                </div>
{{--                <button class="btn btn-outline-info me-1 mb-1" type="button">ارسال للجميع--}}
{{--                </button>--}}
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive scrollbar">
                <table class="table table-striped overflow-hidden">
                    <thead>
                    <tr class="btn-reveal-trigger">
{{--                        <th scope="col">العنوان</th>--}}
                        <th scope="col">اسم القالب</th>
                        <th scope="col">اللغة</th>
{{--                        <th scope="col">الرقم</th>--}}
                        <th scope="col">التاريخ</th>
                        <th class="text-end" scope="col">إجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($templates as $item)
                        <?php $dateCreated = $item->dateCreated; // Assuming $yourDataArray is an array containing the DateTime object
                        $formattedDate = $dateCreated->format('Y-m-d H:i:s');?>
                        <tr class="btn-reveal-trigger">
{{--                            <td>{{ $item->sid }}</td>--}}
                            <td>{{ $item->friendlyName }}</td>
                            <td>{{ $item->language }}</td>
{{--                            <td>{{ $item->sid }}</td>--}}
                            <td>{{ $formattedDate }}</td>

                            <td class="text-end">
                                <div class="dropdown font-sans-serif position-static">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-0">
                                        <div class="bg-white py-2">
                                            <a class="dropdown-item text-warning" href="{{ route('twilioTemplatesById',$item->sid) }}" target="_blank">تفاصيل</a>
                                            {{--                                            <a class="dropdown-item text-success" href="{{ route('updateControlEvent',$item->id) }}">تحكم</a>--}}
                                            {{--                                            <a class="dropdown-item text-info" href="{{ route('guestsList',$item->id) }}">ضيوف الفعالية</a>--}}
{{--                                            <a class="dropdown-item text-secondary" href="#!">طلبات</a>--}}
{{--                                            <a class="dropdown-item text-danger" href="#!">حذف</a>--}}
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

    <div class="modal fade" id="newTemp" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-6" role="document">
            <div class="modal-content border-0">
                <div class="modal-header px-5 position-relative modal-shape-header bg-shape">

                    <div class="position-relative z-index-1 light">
                        <h4 class="mb-0 text-white" id="authentication-modal-label">اضافة قالب جديد </h4>
                        <p class="fs--1 mb-0 text-white">عند اضافة قالب جديد يجب الانتظار لمدة 5 دقيقة للموافقة عليه</p>
                    </div>

                    <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
{{--                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">--}}
{{--                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
                <div class="modal-body py-4 px-5">
                    <form method="post" action="{{ route('twilioCreateTemplate') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">اسم القالب</label>
                            <input class="form-control" type="text" id="name" name="name" required/>
                            <div class="invalid-feedback">Please provide a valid city.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="language">اللغة</label>
                            <select class="form-select" name="language"  >
                                <option value="en">en</option>
                                <option value="ar">ar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="subtitle">عنوان الرسالة</label>
                            <input class="form-control" type="text" id="subtitle" name="subtitle"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="title">نص الرسالة</label>
                            <textarea class="form-control" name="title"></textarea>
                        </div>

                        <div class="row gx-3">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="eventUrl">رابط الفعالية</label>
                                <input class="form-control" type="text" name="eventUrl" />
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="btnTitle">النص على الزر</label>
                                <input class="form-control" type="text" id="btnTitle" name="btnTitle"  />
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-block w-100 mt-3" type="submit">ارسال البيانات</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
