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
                        <p class="mb-0">ضيوف الفعالية</p>
                        <a class="btn btn-link btn-sm ps-0 mt-2" href="#" target="_blank"> {{ $event->Title }} <span class="fas fa-chevron-left ms-1 fs--2"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">ضيوف الفعالية</h5>
                    <br>
                    <br>
                </div>

                <input type="text" id="myInput" class="search form-control mr-5 ml-5"  onkeyup="myFunction();" placeholder="Search by guest number..">
                <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                    <div class="d-none" id="orders-bulk-actions">
                        <div class="d-flex">
                            <select class="form-select form-select-sm" aria-label="Bulk actions">
                                <option selected="">Bulk actions</option>
                                <option value="Refund">Refund</option>
                                <option value="Delete">Delete</option>
                                <option value="Archive">Archive</option>
                            </select>
                            <button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button>
                        </div>
                    </div>
                    <div id="orders-actions">
                        {{--                            <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-plus"--}}
                        {{--                                                                                              data-fa-transform="shrink-3 down-2"></span><span--}}
                        {{--                                    class="d-none d-sm-inline-block ms-1">New</span></button>--}}
                        {{--                            <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter"--}}
                        {{--                                                                                                   data-fa-transform="shrink-3 down-2"></span><span--}}
                        {{--                                    class="d-none d-sm-inline-block ms-1">Filter</span></button>--}}
                        {{--                            <form method="POST" action="{{ route('AcceptAllRequest') }}">--}}
                        {{--                                @csrf--}}
                        {{--                                <button class="btn btn-falcon-danger btn-sm" type="button">--}}
                        {{--                                    <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span>--}}
                        {{--                                    <span class="d-none d-sm-inline-block ms-1">Accept All</span>--}}
                        {{--                                </button>--}}
                        {{--                            </form>--}}

                        <a href="{{ url('guestsListCreate',$event->id) }}" class="btn btn-falcon-info mt-3 btn-sm"><span class="d-none d-sm-inline-block ms-1">إضافة ضيف جديد</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden results" id="myTable">
                    <thead class="bg-200 text-900">
                    <tr>
                        {{--                            <th>--}}
                        {{--                                <div class="form-check fs-0 mb-0 d-flex align-items-center">--}}
                        {{--                                    <input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox"--}}
                        {{--                                           data-bulk-select='{"body":"table-orders-body","actions":"orders-bulk-actions","replacedElement":"orders-actions"}'/>--}}
                        {{--                                </div>--}}
                        {{--                            </th>--}}
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">الاسم</th>
                        <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">الجوال</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address"
                            style="min-width: 12.5rem;">نوع التذكرة - العمر
                        </th>
                        <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="status">الحالة</th>
                        <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">سعر التذكرة</th>
                        {{--                            <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">Invited By who ?</th>--}}
                        {{--                            <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">insta link</th>--}}
                        <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">Date</th>
                        <th class="no-sort"></th>
                    </tr>
                    </thead>
                    <tbody class="list" id="table-orders-body">
                    @foreach($join_requests as $single)
                        <?php
                        $tic = DB::table('tickets')->where('event_id',$single->event_id)->first();
                        ?>
                        <tr class="btn-reveal-trigger">
                            {{--                                <td class="align-middle" style="width: 28px;">--}}
                            {{--                                    <div class="form-check fs-0 mb-0 d-flex align-items-center">--}}
                            {{--                                        <input class="form-check-input" type="checkbox" id="checkbox-14"--}}
                            {{--                                               data-bulk-select-row="data-bulk-select-row"/>--}}
                            {{--                                    </div>--}}
                            {{--                                </td>--}}
                            <td class="order py-2 align-middle white-space-nowrap">
                                {{--                                    <a href="#"> <strong>#{{ $single->id }}</strong></a>--}}
                                <strong>{{ $single->name }}</strong><br/><a href="mailto:lavon@example.com">{{ $single->email }}</a>
                            </td>
                            <td class="date py-2 align-middle">{{ $single->phone }}</td>
                            <td class="address py-2 align-middle white-space-nowrap">{{ $single->ticket_type }}
                                <p class="mb-0 text-500">age {{ $single->age }}</p>
                            </td>
                            <td class="status py-2 align-middle text-center fs-0 white-space-nowrap">
                                @if($single->status == 'pending')
                                    <span class="badge badge rounded-pill d-block badge-soft-warning">
                                في الانتظار
                                <span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span>
                                </span>
                                @elseif($single->status == 'waiting')
                                    <span class="badge badge rounded-pill d-block p-2 badge-soft-primary">مقبول<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>
                                @elseif($single->status == 'Paid')
                                    <span class="badge badge rounded-pill d-block p-2 badge-soft-success">مؤكد السداد<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                                @elseif($single->status == 'blocked')
                                    <span class="badge badge rounded-pill d-block p-2 badge-soft-danger">محظور<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                                @endif
                            </td>
                            <td class="amount py-2 align-middle text-end fs-0 fw-medium">
                                {{ $single->price }} SAR
                            </td>
                            {{--                                <td class="amount py-2 align-middle text-end fs-0 fw-medium">--}}
                            {{--                                    {{ $single->invited_by }}--}}
                            {{--                                </td>--}}
                            {{--                                <td class="amount py-2 align-middle text-end fs-0 fw-medium">--}}
                            {{--                                    <a href="{{ $single->instagram }}" target="_blank"> Visit</a>--}}
                            {{--                                </td>--}}
                            <td class="amount py-2 align-middle text-end fs-0 fw-medium">
                                {{ Carbon\Carbon::parse($single->CDate)->format('M jS h:i A') }}
                            </td>
                            <td class="py-2 align-middle white-space-nowrap text-end">
                                <div class="dropdown font-sans-serif position-static">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button"
                                            id="order-dropdown-14" data-bs-toggle="dropdown" data-boundary="viewport"
                                            aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="fas fa-ellipsis-h fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end border py-0"
                                         aria-labelledby="order-dropdown-14">
                                        <div class="bg-white py-2">
                                            {{--                                                @if($single->status == 'pending')--}}
                                            {{--                                                <form action="{{ url('AcceptRequest') }}" method="POST">--}}
                                            {{--                                                    @csrf--}}
                                            {{--                                                    <input type="hidden" name="jr" value="{{ $single->JdID }}">--}}
                                            {{--                                                    <button type="submit" class="dropdown-item">Accept</button>--}}
                                            {{--                                                </form>--}}
                                            {{--                                                @endif--}}
                                            @if($single->status == 'waiting')
                                                <form action="{{ url('MarkAsPaid') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="rid" value="{{ $single->JdID }}">
                                                    <button type="submit" class="dropdown-item">تحديد كمدفوع</button>
                                                </form>
                                            @endif

                                            <form action="{{ url('BlockRequest') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="rid" value="{{ $single->JdID }}">
                                                <button type="submit" class="dropdown-item text-warning">حظر</button>
                                            </form>
                                            {{--                                                <form action="{{ url('checkPaidRequest') }}" method="POST">--}}
                                            {{--                                                    @csrf--}}
                                            {{--                                                    <input type="hidden" name="rid" value="{{ $single->id }}">--}}
                                            {{--                                                    <button type="submit" class="dropdown-item text-warning">Check Payment Status</button>--}}
                                            {{--                                                </form>--}}


                                            <div class="dropdown-divider"></div>
                                            <form action="{{ url('DeleteRequest') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="rid" value="{{ $single->JdID }}">
                                                <button type="submit" class="dropdown-item text-danger">حذف</button>
                                            </form>

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
        <div class="card-footer">
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                        data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                        data-list-pagination="next"><span class="fas fa-chevron-right">             </span></button>
            </div>
        </div>
    </div>

@endsection
