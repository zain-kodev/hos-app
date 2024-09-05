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
                        <h3>المنتجات</h3>
                        <p class="mb-0">تعديل المنتجات</p>
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="#" target="_blank"> تعديل المنتجات <span class="fas fa-chevron-left ms-1 fs--2"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row g-0">
        <div class="col-lg-12 col-xl-12 pe-lg-2 mb-3">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="col-auto col-lg align-self-center">
                            <h5 class="mb-0" data-anchor="data-anchor">تعديل المنتج </h5>
                        </div>

                    </div>
                </div>
                <div class="card-body pt-0">
                    <form action="{{ route('PostProductEdit') }}" method="post" id="my-awesome-dropzone">
                        @csrf
                        <input type="hidden" name="ProID" value="{{ $product->ProID }}">
                        <div class="p-4 pb-0">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">اسم المنتج</label>
                                <input class="form-control" name="name" type="text" placeholder="عنوان الفعالية" value="{{ $product->ProName }}"/>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">عبارة مختصرة</label>
                                <input class="form-control" name="sentence" type="text"  value="{{ $product->sentence }}"/>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">التصنيف </label>
                                <select name="category_id" class="form-select" >
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"  @if($category->id == $product->category_id) selected="selected" @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">سعر المنتج</label>
                                <input class="form-control" name="price" type="number"  value="{{ $product->price }}"/>
                            </div>
                        </div>
                        <div class="p-4 pb-0">
                            <div class="mb-3 min-vh-50">
                                <label class="col-form-label" for="message-text">وصف المنتج:</label>
                                <textarea class="form-control tinymce d-none" rows="5" name="description_min" >{{ $product->description_min }}</textarea>
                            </div>

                        </div>
                        <div class="p-4 pb-0">
                            <div class="mb-3 min-vh-50">
                                <label class="col-form-label" for="message-text">تفاصيل المنتج:</label>
                                <textarea class="form-control tinymce d-none" rows="7" name="description_max" >{{ $product->description_max }}</textarea>
                            </div>

                        </div>
                        <div class="p-4 pb-0">
                            <div class="mb-3 min-vh-50 row">

                                <div class="col-lg-6 col-xl-6 pe-lg-2 mb-3">
                                    <label class="col-form-label" for="message-text">صورة المنتج:</label>
                                    <div class="dropzone dropzone-single p-0" data-dropzone="data-dropzone" data-options='{"url":"{{ route('editTemp',$product->ProID ) }}","maxFiles":1,"dictDefaultMessage":"Choose or Drop a file here"}'>
                                        <div class="fallback">
                                            <input type="file" name="file" />
                                        </div>
                                        <div class="dz-preview dz-preview-single">
                                            <div class="dz-preview-cover dz-complete"><img class="dz-preview-img" src="{{ asset('assets/img/generic/image-file-2.png') }}" alt="..." data-dz-thumbnail="" /><a class="dz-remove text-danger" href="#!" data-dz-remove="data-dz-remove"><span class="fas fa-times"></span></a>
                                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                            </div>
                                        </div>
                                        <div class="dz-message" data-dz-message="data-dz-message">
                                            <div class="dz-message-text"><img class="me-2" src="{{ asset('assets/img/icons/cloud-upload.svg') }}" width="25" alt="" />اضغط هنا لتحميل الصورة</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 pe-lg-2 mb-3">
                                    <img class="dz-preview-img" src="{{ asset($product->proImg) }}" />
                                </div>

                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">ارسال </button>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
