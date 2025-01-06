@extends('AdminDashboard.layouts.layout')
@section('content')

    <div class="row g-0">
        <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/img/illustrations/corner-4.png);">

            </div>

            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-lg-8">
                        <h3> لوحة التحكم</h3>
                        <p class="mb-0"> المنتجات </p>
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="#" target="_blank" style="font-family: 'Noto Kufi Arabic', sans-serif"> اضافة منتج جديد <span class="fas fa-chevron-left ms-1 fs--2"></span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li><p class="mb-0 flex-1">{{ $error }}</p></li>
                @endforeach
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('status'))
        <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
            <div class="bg-danger me-3 icon-item"><svg class="svg-inline--fa fa-times-circle fa-w-16 text-white fs-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path></svg><!-- <span class="fas fa-times-circle text-white fs-3"></span> Font Awesome fontawesome.com --></div>
            <p class="mb-0 flex-1">{!! session('status') !!}  </p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form method="POST" action="{{ route('createNewProduct') }}"  id="my-awesome-dropzone" enctype="multipart/form-data">
        @csrf
        <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">ادخال بيانات المنتج</h5>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="name"> اسم  المنتج</label>
                                <input class="form-control" name="name" type="text" placeholder="اسم المنتج" value="{{ old('name') }}" required/>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label" for="project_number"> الرمز - باللغة انجليزية</label>
                                <input class="form-control" name="slug" type="text" placeholder="CDI-RE2" value="{{ old('slug') }}" required/>
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="project_desc"> وصف مختصر المنتج</label>
                                <textarea class="form-control" name="description_min" id="description_min" rows="3" required="required">{{ old('description_min') }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="project_desc">تفاصيل المنتج</label>
                                <textarea class="form-control" name="description_max" id="description_max" rows="6" required="required">{{ old('description_max') }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <label class="col-form-label" for="message-text">صورة المنتج:</label>
                                <input type="file" name="file"  required="required"/>
{{--                                <div class="dropzone dropzone-single p-0" data-dropzone="data-dropzone" data-options='{"url":"dfd","maxFiles":1,"dictDefaultMessage":"Choose or Drop a file here"}'>--}}
{{--                                    <div class="fallback">--}}
{{--                                        <input type="file" name="file" />--}}
{{--                                    </div>--}}
{{--                                    <div class="dz-preview dz-preview-single">--}}
{{--                                        <div class="dz-preview-cover dz-complete"><img class="dz-preview-img" src="{{ asset('assets/img/generic/image-file-2.png') }}" alt="..." data-dz-thumbnail="" /><a class="dz-remove text-danger" href="#!" data-dz-remove="data-dz-remove"><span class="fas fa-times"></span></a>--}}
{{--                                            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="dz-message" data-dz-message="data-dz-message">--}}
{{--                                        <div class="dz-message-text"><img class="me-2" src="{{ asset('assets/img/icons/cloud-upload.svg') }}" width="25" alt="" />اضغط هنا لتحميل الصورة</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
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

                            <div class="mb-3">
                                <div class="d-flex flex-between-center">
                                    <label class="form-label" for="organizer">نوع المنتج</label>
                                </div>
                                <select class="form-select js-choice" id="category_id" size="3" name="category_id" data-options='{"removeItemButton":true,"placeholder":true}' required="required">
                                    <option value="">------ اختيار نوع المنتج -----</option>
                                    @foreach(\App\Models\Category::all() as $package)
                                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex flex-between-center">
                                    <label class="form-label" for="organizer"> عبارة مختصرة</label>
                                </div>
                                <input class="form-control" name="sentence" type="text" placeholder="للعطر افتضاح - مثلا !" value="{{ old('sentence') }}" required/>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex flex-between-center">
                                    <label class="form-label" for="organizer">سعر المنتج</label>
                                </div>
                                <input class="form-control" name="price" type="number" placeholder="3500" value="{{ old('price') }}" required/>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex flex-between-center">
                                    <label class="form-label" for="organizer"> التفعيل</label>
                                </div>
                                <select class="form-select js-choice" id="active" size="3" name="active" data-options='{"removeItemButton":true,"placeholder":true}' required="required">
                                    <option value="">------ اختيار -----</option>
                                    <option value="0">غير مفعل</option>
                                    <option value="1">مفعل</option>
                                </select>
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
                        <button class="btn btn-falcon-default btn-sm me-2" type="submit" id="Conse123">حفظ بيانات المشروع </button>
                        {{--<button class="btn btn-falcon-primary btn-sm">Make your event live </button>--}}
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
