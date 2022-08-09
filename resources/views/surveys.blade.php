@extends('layouts.dashboard')

@section('content')
    <div id="app" class="container">
        @include('parts.breadcrumb')
        @include('parts.page_title')
        <div class="box bg-white border rounded">
            <div class="p-4">
                <form class="mb-3">
                    <h6><b>فیلتر بر اساس تاریخ</b></h6>
                    <div class="row">
                        <div class="col-12 col-md">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>از تاریخ</label>
                                        <input class="form-control date-input" name="start_date"
                                               value="{{ request()->get('start_date') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group check-dates">
                                        <label>تا تاریخ</label>
                                        <input class="form-control date-input" name="end_date"
                                               value="{{ request()->get('end_date') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group mb-0">
                                        <label>از ساعت</label>
                                        <input type="time" class="form-control ltr" name="start_time"
                                               value="{{ request()->get('start_time') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-0">
                                        <label>تا ساعت</label>
                                        <input type="time" class="form-control ltr" name="end_time"
                                               value="{{ request()->get('end_time') }}">
                                    </div>
                                </div>
                            </div>
                            <small class="text-muted">
                                فیلتر ساعت زمانی اعمال میشود که تاریخ شروع و پایان برابر باشد.
                            </small>
                        </div>
                    </div>
                    <h6><b>فیلتر بر اساس فروشگاه</b></h6>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>منطقه</label>
                                <input class="form-control" name="zone" value="{{ request()->get('zone') }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label>استان</label>
                                <input class="form-control" name="state" value="{{ request()->get('state') }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label>شهر</label>
                                <input class="form-control" name="city" value="{{ request()->get('city') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>فروشگاه</label>
                                <input class="form-control" name="shop" value="{{ request()->get('shop') }}">
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <button class="btn btn-info px-5" type="submit">جستجو</button>
                    </div>
                </form>
                <hr class="mt-0 mb-3">
                @if(count($records))
                    <div class="row align-items-center">
                        <div class="col-12 col-sm mb-3 mb-sm-0">
                            <p class="mb-0">
                                <b>تعداد: {{ number_format($records->total()) }}</b>
                            </p>
                        </div>
                        <div class="col-12 col-sm-auto">
                            {{--@if(request()->get('start_date') && request()->get('end_date'))
                                <a class="btn btn-success btn-sm"
                                   href="{{ route('surveyResult', ['export' => 'xlsx', 'start_date' => request()->get('start_date'), 'end_date' => request()->get('end_date')]) }}">
                                    دانلود اکسل
                                </a>
                            @else
                                <a class="btn btn-success btn-sm"
                                   href="{{ route('surveyResult', ['export' => 'xlsx']) }}">
                                    دانلود اکسل
                                </a>
                            @endif--}}

                            <a class="btn btn-success btn-sm"
                               href="{{ route('surveyResult', array_merge(request()->all(), ['export' => 'xlsx']))  }}">
                                دانلود اکسل
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">فروشگاه</th>
                                <th class="text-center">زمان ثبت</th>
                                <th class="text-center">شماره امتیاز دهنده</th>
                                <th class="text-center">امتیاز</th>
                                <th class="text-center">نقاط قوت</th>
                                <th class="text-center">نقاط ضعف</th>
                                <th class="text-center">نظر</th>
                            </tr>
                            @foreach($records as $item)
                                <tr>
                                    <td class="small">
                                        @if($item->shop)
                                            {{ $item->shop->name }}
                                            (
                                            {{ $item->shop->city }}
                                            --
                                            {{ $item->shop->state }}
                                            )
                                        @else
                                            {{ 'فروشگاه شماره ' . request()->get('s') }}
                                        @endif
                                    </td>
                                    <td class="small text-center"
                                        dir="ltr">{{ jdate('Y/m/d -- H:i:s', strtotime($item->created_at)) }}</td>
                                    <td class="text-center small">{{ $item->mobile }}</td>
                                    <td class="text-center">
                                        @if($item->point == 'عالی' || $item->point == 'خوب')
                                        <span class="text-success">{{ $item->point }}</span>
                                        @elseif($item->point == 'متوسط')
                                            <span class="text-warning">{{ $item->point }}</span>
                                        @else
                                            <span class="text-danger">{{ $item->point }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($item->arrStrengths) && count($item->arrStrengths))
                                            <ul class="p-0 m-0 list-unstyled small">
                                                @foreach($item->arrStrengths as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-center m-0">--</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($item->arrWeaknesses) && count($item->arrWeaknesses))
                                            <ul class="p-0 m-0 list-unstyled small">
                                                @foreach($item->arrWeaknesses as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-center m-0">--</p>
                                        @endif
                                    </td>
                                    <td class="small">
                                        @if(isset($item->comment) && $item->comment)
                                            {{ $item->comment }}
                                        @else
                                            <p class="text-center m-0">--</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @if($records->lastPage() > 1)
                        <div class="mt-5">
                            {{ $records->appends(request()->all())->onEachSide(2)->links() }}
                        </div>
                    @endif
                @else
                    <h6 class="text-center font-weight-light">رکوردی وجود ندارد.</h6>
                @endif
            </div>
        </div>
    </div>
@endsection
