
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
                        <h3>تحكم في الفعالية</h3>
                        <p class="mb-0">الفعاليات</p>
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="#" target="_blank"> {{ $event->Title }} <span class="fas fa-chevron-left ms-1 fs--2"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row g-0">
    <div class="col-xxl-8 pe-xxl-2 mb-3 d-flex flex-column align-items-stretched">
        <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url('{{ asset('assets/img/illustrations/corner-4.png') }}');">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>اسعار التذاكر </h3>
                        <p class="mt-2">يمكنك تعديل اسعار الفعالية من هنا  </p>
                        <p class="mt-2">Couple : {{ $event->couple_price }} SAR</p>
                        <p class="mt-2">Single Lady: {{ $event->single_price }} SAR</p>
                        <p class="mt-2">Single Man : {{ $event->single_man_price ? $event->single_man_price :'-------'  }} SAR</p>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle ps-0 btn-sm" id="change-plan" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">تحديث الاسعار</button>
                            <div class="dropdown-menu py-3" aria-labelledby="change-plan" style="min-width: 15rem;">
                                <div class="dropdown-item px-3 py-2"><span class="d-flex justify-content-between fs--1 text-black"><span class="fw-semi-bold">Couple</span><span>{{ $event->couple_price }} SAR</span></span>
                                    <ul class="list-unstyled ps-1 my-2 fs--1">

                                        <form method="post" action="{{ route('UpdateEventPrice') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $event->id }}">
                                            <input type="number" class="form-control" name="couple_price" value="{{ $event->couple_price }}">
                                            <button type="submit" class="mt-2 btn btn-outline-primary rounded-pill me-1 mb-1">تحديث</button>
                                        </form>

                                    </ul>
                                </div>
                                <div class="dropdown-divider my-0"></div>
                                <div class="dropdown-item px-3 py-2"><span class="d-flex justify-content-between fs--1 text-black"><span class="fw-semi-bold">Single Lady</span><span>{{ $event->single_price }} SAR</span></span>
                                    <ul class="list-unstyled ps-1 my-2 fs--1">
                                        <form method="post" action="{{ route('UpdateEventPrice') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $event->id }}">
                                            <input type="number" class="form-control" name="single_price" value="{{ $event->single_price }}">
                                            <button type="submit" class="mt-2 btn btn-outline-primary rounded-pill me-1 mb-1">تحديث</button>
                                        </form>
                                    </ul>
                                </div>
{{--                                <div class="dropdown-divider my-0"></div>--}}
{{--                                <div class="dropdown-item px-3 py-2"><span class="d-flex justify-content-between fs--1 text-black"><span class="fw-semi-bold">Extended License</span><span>$99.00</span></span>--}}
{{--                                    <ul class="list-unstyled ps-1 my-2 fs--1">--}}
{{--                                        <li> <span class="fas fa-circle" data-fa-transform="shrink-11"></span><span class="ms-1">Unlimited websites</span></li>--}}
{{--                                        <li> <span class="fas fa-circle" data-fa-transform="shrink-11"></span><span class="ms-1">Paying users allowed</span></li>--}}
{{--                                    </ul>--}}
{{--                                    <p class="fs--2 mb-0"> <a href="#!">Extended License</a></p>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-light mb-3 h-xxl-100">
            <div class="card-body p-3">
                @if($event->Active == 1)
                    <p class="fs--1 mb-0"> الفعالية متوفرة الآن على تطبيق تولم <a href="#!"><span class="fas fa-exchange-alt me-2" data-fa-transform="rotate-90"></span>حجب الفعالية من التطبيق</a></p>
                @else
                    <p class="fs--1 mb-0"> الفعالية غير متوفرة على تطبيق تولم <a href="#!"><span class="fas fa-exchange-alt me-2" data-fa-transform="rotate-90"></span>اتاحة الفعالية على التطبيق</a></p>

                @endif
            </div>
        </div>
        <div class="card mb-3 h-xxl-100">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0">يمكنك ايقاف الفعالية من التطبيق والرابط من هنا</h5>
                    </div>
                    <div class="col-auto">
{{--                        <button class="btn btn-falcon-default btn-sm me-2">Save</button>--}}
                        <button class="btn btn-falcon-primary btn-sm">آيقاف الفعالية </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card h-xxl-100">
            <div class="card-body fs--1">
                <div class="d-flex"><span class="fas fa-gift fs-0 text-warning"></span>
                    <div class="flex-1 ms-2"><a class="fw-semi-bold" href="pages/user/profile.html"> المزيد من التطوير قادم قريبآ </a>تمنياتنا بالتوفيق </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xxl-4 ps-xxl-2 mb-3">
            <div class="card mb-3 mb-xxl-0 h-xxl-100">
                <div class="card-header">
                    <h5 class="mb-0">خدمات البريد الالكتروني</h5>
                </div>
                <div class="card-body bg-light">
                    <h5 class="fs-0">ارسال قبول الفعالية للكل</h5>
                    <p class="fs--1">قبول المنضمين يكون تلقائيا في حال كانت الفعالية عامة ، لكن يمكن ارسال بريد قبل للكل اذا كانت الفعالية خاصة</p>

                    @if($setting->is_private == 1)
                        <form action="{{ route('AcceptAllRequestAdmin') }}" method="post">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <button type="submit" class="btn btn-falcon-success d-block">قبول الكل</button>
                        </form>
                    @else
                        <button type="button" class="btn btn-falcon-danger d-block">القبول تلقائيا في الفعاليات العامة</button>
                    @endif

                    <div class="border-dashed-bottom my-4"></div>
                    <h5 class="fs-0">الموقع الجغرافي للفعالية</h5>
                    <p class="fs--1">يتم ارسال الموقع تلقائيا بعد تأكيد عملية الدفع للفعاليات العامة ، لكن يمكنك ارسال الموقع لكل المنضمين من هنا</p>
                    <form action="{{ route('sendLocationToAll') }}" method="post">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <button type="submit" class="btn btn-falcon-warning d-block">ارسال الموقع</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-4 ps-xxl-2 mb-3">
            <div class="card mb-3 mb-xxl-0 h-xxl-100">
                <div class="card-header">
                    <h5 class="mb-0">خدمات البريد الالكتروني</h5>
                </div>
                <div class="card-body bg-light">
                    <h5 class="fs-0">ارسال تذكير للاشخاص الذين لم يكملوا لادفع</h5>
                    <p class="fs--1">قم بإدخال نص البريد الالكتروني وسيتم ارسال بريد الكتروني لكل الاشخاص الذين لم يكملوا عملية الدفع</p>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#error-modal" class="btn btn-falcon-success d-block">ارسال التذكير </button>
                    <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">

                            <form action="{{ route('paymentReminderToAll') }}" method="post">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <div class="modal-content position-relative">
                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">

                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0">
                                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                        <h4 class="mb-1" id="modalExampleDemoLabel">اكتب نص الايميل </h4>
                                    </div>
                                    <div class="p-4 pb-0">

                                            <div class="mb-3">
                                                <label class="col-form-label" for="message-text">محتوى البريد:</label>
                                                <textarea class="form-control" name="text" id="text"></textarea>
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

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
