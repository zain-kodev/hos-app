@extends('AdminDashboard.layouts.layout')

@push('styles')
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    {{--    <div class="card mb-3">--}}
    {{--        <div class="card-body">--}}
    {{--            <div class="row flex-between-center">--}}
    {{--                <div class="col-md">--}}
    {{--                    <h5 class="mb-2 mb-md-0">Create Event</h5>--}}
    {{--                </div>--}}
    {{--                <div class="col-auto">--}}
    {{--                    <button class="btn btn-falcon-default btn-sm me-2" role="button">Save</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <form method="POST" action="{{ route('updateEvent',$event->id) }}"  id="my-awesome-dropzone" enctype="multipart/form-data">
        @csrf
        <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">ادخال بيانات الفعالية</h5>
                    </div>
                    <div class="card-body bg-light">


                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">عنوان الفعالية</label>
                                <input class="form-control" name="Title" type="text" placeholder="عنوان الفعالية" value="{{ $event->Title }}"/>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="start-date">تاريخ الفعالية</label>
                                <input class="form-control datetimepicker" name="start_date" type="text" placeholder="d/m/y" data-options='{"dateFormat":"y-m-d","disableMobile":true}'  value="{{ $event->start_date }}"/>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="start-time">زمن بداية الفعالية</label>
                                <input class="form-control datetimepicker" name="start_time" type="text" placeholder="H:i" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}'  value="{{ $event->start_time }}"/>
                            </div>
                            {{--<div class="col-sm-6 mb-3">
                                <label class="form-label" for="end-date">End Date</label>
                                <input class="form-control datetimepicker" id="end-date" type="text" placeholder="d/m/y" data-options='{"dateFormat":"d/m/y","disableMobile":true}' />
                            </div>--}}
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="end-time">زمن انتهاء الفعالية</label>
                                <input class="form-control datetimepicker" name="end_time" type="text" placeholder="H:i" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}'  value="{{ $event->end_time }}"/>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="registration-deadline">تاريخ قفل التسجيل</label>
                                <input class="form-control datetimepicker" name="registration_deadline" type="text" placeholder="d-m-y" data-options='{"dateFormat":"d-m-y","disableMobile":true}' value="{{ $event->registration_deadline }}" />
                            </div>

                            <div class="col-12">
                                <div class="border-dashed-bottom my-3"></div>
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="event-description">اوصف الفعالية</label>
                                <textarea class="form-control" name="desc" id="desc" rows="6">{{ $event->desc }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="location">الموقع الجغرافي</label>
                                <input class="form-control" name="location" id="location" value="{{ $setting->location }}"  style="direction: ltr"  required/>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="bank_account">حساب IBAN الخاص بك</label>
                                <input class="form-control" name="bank_account" id="bank_account" value="{{ $setting->bank_account }}"  style="direction: ltr"  required/>
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="stc_account"> حساب STC Pay الخاص بك</label>
                                <input class="form-control" name="stc_account" id="stc_account" value="{{ $setting->stc_account }}" style="direction: ltr" required/>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="location">رقم واتساب الدعم الفني للفعالية</label>
                                <input class="form-control" name="whatsapp_account" id="whatsapp_account" value="{{ $setting->whatsapp_account }}" style="direction: ltr" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ps-lg-2">
                <div class="sticky-sidebar">
                    <div class="card mb-lg-0">
                        <div class="card-header">
                            <h5 class="mb-0">معلومات اخرى</h5>
                        </div>
                        <div class="card-body bg-light">
                            <div class="border-dashed-bottom my-3"></div>
                            <div class="card-header">
                                <h5 class="mb-0">صورة غلاف الفعالية</h5>
                            </div>
                            <div class="card-body bg-light">
                                <div class="dropzone dropzone-single p-0" data-dropzone="data-dropzone" data-options='{"url":"{{ route('uploadeTemp') }}","maxFiles":1,"dictDefaultMessage":"Choose or Drop a file here"}'>
                                    <div class="fallback">
                                        <input type="file" name="cover_photo" />
                                    </div>
                                    <div class="dz-preview dz-preview-single">
                                        <div class="dz-preview-cover dz-complete"><img class="dz-preview-img" src="{{ asset('assets/img/generic/image-file-2.png') }}" alt="..." data-dz-thumbnail="" /><a class="dz-remove text-danger" href="#!" data-dz-remove="data-dz-remove"><span class="fas fa-times"></span></a>
                                            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                        </div>
                                    </div>
                                    <div class="dz-message" data-dz-message="data-dz-message">
                                        <div class="dz-message-text"><img class="me-2" src="{{ asset('assets/img/icons/cloud-upload.svg') }}" width="25" alt="" />Drop your file here</div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3 mb-5">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0">وصلت هنا؟ ، احفظ البيانات</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-falcon-default btn-sm me-2" type="submit" id="Conse1">حفظ الفعالية </button>
                        {{--<button class="btn btn-falcon-primary btn-sm">Make your event live </button>--}}
                    </div>
                </div>
            </div>
        </div>

    </form>



    <script>

        $('#Conse123').click(function () {

            $( "#my-awesome-dropzone" ).on( "submit", function( event ) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                event.preventDefault();

                var myForm = document.getElementById('my-awesome-dropzone');
                var formData = new FormData(myForm);
                var headers = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url : $(this).attr('action'),
                    data : formData ,
                    //dataType: 'json',
                    cache:false,
                    contentType: false,
                    processData: false,
                    success  : function(data) {
                        swal("Good Job ",data , "success");
                        $("#my-awesome-dropzone").trigger("reset");
                        //$('#Modal2222').modal('toggle');
                        /*window.location.reload();*/
                        myForm.reset();
                    },
                    error: function(xhr, textStatus, thrownError){
                        // console.log(thrownError);
                        swal("sorry!", "Something Went wrong", "error");
                        myForm.reset();
                        $("#my-awesome-dropzone").trigger("reset");
                    }

                });


            });


        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @push('scripts')
        <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
        <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
        <script src="{{ asset('vendors/dropzone/dropzone.min.js') }}"></script>
    @endpush
@endsection
