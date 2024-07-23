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
                        <p class="mb-0">الفعاليات</p>
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="{{ url('/') }}" target="_blank"> قائمة الفعاليات <span class="fas fa-chevron-left ms-1 fs--2"></span>
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
                    <h5 class="mb-0" data-anchor="data-anchor">قائمة الفعاليات</h5>
                </div>

            </div>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive scrollbar">
                <table class="table table-striped overflow-hidden">
                    <thead>
                    <tr class="btn-reveal-trigger">
                        <th scope="col">العنوان</th>
                        <th scope="col">التاريخ</th>
                        <th scope="col">بداية الفعالية</th>
                        <th scope="col">آخر موعد للتقديم</th>
                        <th scope="col">عدد التذاكر</th>
                        <th scope="col"> رابط الفعالية</th>
                        <th class="text-end" scope="col">إجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $item)
                        <tr class="btn-reveal-trigger">
                            <td>{{ $item->Title }}</td>
                            <td>{{ $item->start_date }}</td>
                            <td>{{ $item->start_time }}</td>
                            <td>{{ $item->registration_deadline }}</td>
                            <td>{{ $item->ticket_number }}</td>
                            <td>
                                <div id="copy_{{ $item->id }}" style="font-size: 0.1px;">
                                    {{ url('JoinEvent?eventId=') }}{{ \Illuminate\Support\Facades\Crypt::encrypt($item->id) }}
                                </div>
                                <a href="#" id="btn_{{ $item->id }}" onclick="copyToClipboard('copy_{{ $item->id }}','btn_{{ $item->id }}','copyResult{{ $item->id }}');">نسخ الرابط</a> <span id="copyResult{{ $item->id }}" style="color: green"></span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown font-sans-serif position-static">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-0">
                                        <div class="bg-white py-2">
                                            <a class="dropdown-item text-warning" href="{{ route('EditEvent',$item->id) }}">تعديل</a>
{{--                                            <a class="dropdown-item text-success" href="{{ route('updateControlEvent',$item->id) }}">تحكم</a>--}}
{{--                                            <a class="dropdown-item text-info" href="{{ route('guestsList',$item->id) }}">ضيوف الفعالية</a>--}}
                                            <a class="dropdown-item text-secondary" href="#!">طلبات الانضمام</a>
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

    <script>
        let copyToClipboard = (txt,btn,spn) => {
            console.log(spn);
            let answer = document.getElementById(spn);
            let copy   = document.getElementById(btn);
            let selection = window.getSelection();
            let range = document.createRange();
            let textToCopy = document.getElementById(txt);
            console.log(copy);
            range.selectNodeContents(textToCopy);
            selection.removeAllRanges();
            selection.addRange(range);
            let successful = document.execCommand('copy');
            if(successful){
                answer.innerHTML = 'تم نسخ الرابط';
            } else {
                answer.innerHTML = 'Unable to copy!';
            }
            console.log(successful);
            window.getSelection().removeAllRanges();

        }

    </script>

@endsection
