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
                        <p class="mb-0">ضيف جديد للفعالية</p>
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="#" target="_blank"> {{ $event->Title }} <span class="fas fa-chevron-left ms-1 fs--2"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-xl-12 col-xxl-12 h-100">
                <div class="card overflow-hidden">
                    <div class="card-img-top">
                    </div>
                    <div class="card-body">


                            <form method="post" action="{{ route('guestsListAdd') }}" class="needs-validation" novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="event_id" id="event_id" value="{{ $event->id }}">

                                <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-validation-wizard-name">الاسم الكامل*</label>
                                    <input class="form-control" type="text" name="name" placeholder="ادخل اسمك كاملا" required="required" id="bootstrap-wizard-validation-wizard-name" data-wizard-validate-name="true"/>
                                    <div class="invalid-feedback">ادخل اسمك كاملا</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-validation-wizard-email">البريد الالكتروني*</label>
                                    <input class="form-control" type="email" name="email" placeholder="example@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,}$" required="required" id="bootstrap-wizard-validation-wizard-email" data-wizard-validate-email="true" />
                                    <div class="invalid-feedback">ادخل البريد الالكتروني</div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <label class="form-label" for="bootstrap-wizard-validation-wizard-age">العمر*</label>
                                        <input class="form-control" type="number" name="age" required="required" id="bootstrap-wizard-validation-wizard-age" data-wizard-validate-age="true"/>
                                        <div class="invalid-feedback">ادخل عمرك</div>
                                    </div>
                                    <div class="col-6">
                                        {{--                                                @if($setting->is_private == 1)--}}
                                        {{--                                                        <label class="form-label" for="instagram">Instagram Page Link</label>--}}
                                        {{--                                                        <input class="form-control" type="text" name="instagram" required="required" id="bootstrap-wizard-validation-wizard-instagram" data-wizard-validate-instagram="true"/>--}}
                                        {{--                                                @endif--}}
                                    </div>
                                </div>


                                <div class="row g-2">
                                    <div class="col-6">
                                        <label class="form-label" for="bootstrap-wizard-validation-wizard-age">رقم الجوال*</label>
                                        <input class="form-control" type="number" name="phone" required="required" id="bootstrap-wizard-validation-wizard-phone" data-wizard-validate-phone="true"/>
                                        <div class="invalid-feedback">يجب ادخال رقم الجوال</div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="bootstrap-wizard-validation-wizard-age">رقم الواتساب*</label>
                                        <input class="form-control" type="number" name="whatsapp" required="required" id="bootstrap-wizard-validation-wizard-whatsapp" data-wizard-validate-whatsapp="true"/>
                                        <div class="invalid-feedback">يجب ادخال رقم الواتساب</div>
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="col-12">
                                        <label class="form-label" for="modal-auth-email">التذكرة</label>
                                        <select class="form-select" name="ticket_type" id="bootstrap-wizard-validation-wizard-ticket_type" required="required" data-wizard-validate-ticket_type="true">
                                            <option value="">إختر نوع التذكرة ...</option>
                                            <option value="Couple">Couple {{ $event->couple_price }} SAR</option>
                                            <option value="Single">Single Lady {{ $event->single_price }} SAR</option>
                                            <option value="SingleMan">Single Man {{ $event->single_man_price }} SAR</option>
                                            <option value="Table">Table 5 Person {{ $event->table_price }} SAR</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="guest" style="display: none">
                                    <div class="row g-2">
                                        <div class="border-dashed-bottom d-block d-md-none d-xl-block d-xxl-none my-4"><a></a></div>
                                        <p class="fs--1 mb-0 ">معلومات الضيف</p>
                                        <div class="col-6">
                                            <label class="form-label" for="bootstrap-wizard-validation-wizard-name2">اسم الضيف كاملا</label>
                                            <input class="form-control" type="text" name="name2" />
                                            <div class="invalid-feedback">ادخل الاسم الكامل للضيف</div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label" for="bootstrap-wizard-validation-wizard-age2">عمر الضيف</label>
                                            <input class="form-control" type="number" name="age2" />
                                            <div class="invalid-feedback">ادخل عمر الضيف</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6">

                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="terms" required="required" checked="checked" id="bootstrap-wizard-validation-wizard-checkbox" />
                                    <label class="form-check-label" for="bootstrap-wizard-validation-wizard-checkbox">اوافق على <a href="#!">الشروط </a>والاحكام <a href="#!">سياسة الخصوصية</a></label>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit" id="" onclick="return validation();">Register</button>
                                </div>
                            </form>


                    </div>
                </div>

            </div>

        </div>
    </div>

    <script>

        $(document).ready(function(){
            //console.log($('#parent').val());
            $(document).ajaxStart(function () {
                $(".loa").show();
            }).ajaxStop(function () {
                $(".loa").fadeOut();
            });
            $("#bootstrap-wizard-validation-wizard-ticket_type").change(function(){
                let vdf = $('#bootstrap-wizard-validation-wizard-ticket_type').val();
                if (vdf === 'Couple'){
                    $("#guest").css("display", "block");
                }else {
                    $("#guest").css("display", "none");
                }
            });
        });
    </script>
@endsection
