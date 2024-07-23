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
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="{{ url('/') }}" target="_blank"> تفاصيل القالب <span class="fas fa-chevron-left ms-1 fs--2"></span>
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
    <div class="row g-0">
        <div class="col-lg-4 col-xxl-4 pe-lg-4 mb-3 mb-lg-0">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0">محتوى الاعلان</h5>
                </div>
                <div class="card-body bg-light">
                    <div style="position: relative; padding-bottom: 193.25%; height: 0;">
                        <video style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" controls>
                            <source src="{{ $template->types['twilio/card']['media'][0] }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xxl-8">
            <div class="card">
                <div class="card-header bg-light btn-reveal-trigger d-flex flex-between-center">
                    <h5 class="mb-0">تفاصيل القالب</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless fs--1 mb-0">
                        <tbody><tr class="border-bottom">
                            <th class="ps-0 pt-0"><span class="text-success">{!! $template->types['twilio/card']['subtitle'] !!}</span>
                                <div class="text-400 fw-normal fs--4">{!! $template->types['twilio/card']['title'] !!}</div>
                            </th>
                        </tr>
                        <tr class="border-bottom">
                            <th class="ps-0">تاريخ الاضافة
                                <?php $dateCreated = $template->dateCreated; // Assuming $yourDataArray is an array containing the DateTime object
                                $formattedDate = $dateCreated->format('Y-m-d H:i:s');?>
                                <div class="text-400 fw-normal fs--4">{{ $formattedDate }}</div>
                            </th>
                        </tr>
                        <tr class="border-bottom">
                            <th class="ps-0">رابط الاعلان
                                <div class="text-400 fw-normal fs--4"><a href="{{ $template->types['twilio/card']['actions'][0]['url'] }}" target="_blank">عرض</a></div>
                            </th>
                        </tr>
                        <tr class="border-bottom">
                            <th class="ps-0">نص زر الاعلان
                                <div class="text-400 fw-normal fs--5">{{ $template->types['twilio/card']['actions'][0]['title'] }}</div>
                            </th>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light">
                    <div class="fw-semi-bold">
                        <form action="{{ route('TestsendBroadcastWhatsapp') }}" method="post">
                            @csrf
                            <input type="hidden" name="sid" value="{{ $template->sid }}">
                            <button class="btn btn-outline-success me-1 mb-1" type="submit">تجربة القالب</button>
                        </form>
                    </div>
                    <div class="fw-bold">
                        <form action="{{ route('sendBroadcastWhatsapp') }}" method="post">
                            @csrf
                            <input type="hidden" name="sid" value="{{ $template->sid }}">
                            <button class="btn btn-outline-info me-1 mb-1" type="submit">ارسال للجميع</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
