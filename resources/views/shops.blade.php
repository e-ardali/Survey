@extends('layouts.dashboard')

@section('content')
    <div id="app" class="container">
        @include('parts.breadcrumb')
        @include('parts.page_title')
        <a href="#insert-box" class="btn btn-primary btn-sm mb-3" data-toggle="collapse" aria-controls="insert-box">
            <i class="mdi mdi-plus-circle top-1"></i>
            افزودن فروشگاه
        </a>
        <div id="insert-box"
             class="box bg-white border rounded collapse @if(!$errors->isEmpty() || request()->get('action') == 'create') show @endif">
            <div class="p-4">
                <h5 class="font-weight-bold">به شکل تکی</h5>
                <form method="post" action="{{ route('shops.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-12 col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>کد فروشگاه</label>
                                <input class="form-control @error('shop_code') is-invalid @enderror" name="shop_code"
                                       value="{{ old('shop_code') }}">
                                @error('shop_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>نام فروشگاه</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>منطقه</label>
                                <input class="form-control @error('zone') is-invalid @enderror" name="zone"
                                       value="{{ old('zone') }}">
                                @error('zone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label>استان</label>
                                <input type='text'
                                       class="form-control flexdatalist select-state"
                                       data-data='{{ route('cities') }}'
                                       data-search-in='name'
                                       data-min-length='0'
                                       value="{{ old('state') }}"
                                       name='state'>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="form-group">
                                <label>شهر</label>
                                <input type='text'
                                       class='flexdatalist form-control select-city'
                                       list='cities'
                                       data-min-length='0'
                                       value="{{ old('city') }}"
                                       name='city' disabled="true">
                                <small class="form-text text-muted">* ابتدا استان را انتخاب کنید.</small>
                                <datalist id="cities">

                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success px-5">افزودن</button>
                        </div>
                    </div>

                </form>
            </div>
            <hr>
            <div class="p-4">
                <h5 class="font-weight-bold">به شکل یکجا</h5>
                <p class="mb-0">فرمت صحیح فایل اکسل به شکل زیر است:</p>
                <p>
                    کد فروشگاه
                    |
                    نام فروشگاه
                    |
                    منطقه
                    |
                    استان
                    |
                    شهر
                </p>
                <form method="post" action="{{ route('shops.updateByExcel') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>فایل</label>
                                <input type="file" class="form-control custom-file @error('shops') is-invalid @enderror"
                                       name="shops"
                                       value="{{ old('shops') }}">
                                @error('shops')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="pt-3">
                        <button type="submit" class="btn btn-success px-5">افزودن</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="box bg-white border rounded">
            <div class="p-4">
                @if(count($records))
                    <form class="mb-3">
                        <h6><b>فیلتر</b></h6>
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
                            <button type="submit" class="btn btn-info">جستجو</button>
                        </div>
                    </form>
                    <h6>
                        تعداد:
                        <b>{{ $records->total() }}</b>
                    </h6>
                    <hr class="mt-0 mb-3">
                    @foreach($records as $item)
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-auto py-2">
                                <p class="m-0 font-weight-bold">
                                    {{ $item->name }}
                                    <span class="small">({{ $item->shop_code }})</span>
                                    <span class="small">
                                        @if($item->state)
                                            --
                                            {{ $item->state }}
                                        @endif
                                        @if($item->city)
                                            --
                                            {{ $item->city }}
                                        @endif
                                        @if($item->zone)
                                            --
                                            منطقه:
                                            {{ $item->zone }}
                                        @endif
                                    </span>
                                    <br>
                                    <a href="{{ route('surveyResult', ['shop' => $item->id]) }}"
                                       class="small text-primary">نظرات</a>
                                    |
                                    <a href="{{ route('shops.edit', ['shop' => $item->id]) }}"
                                       class="small text-success">ویرایش</a>
                                    |
                                    <a class="small text-danger open-confirm-alert" href="#here"
                                       data-link="{{ route('shops.destroy', ['shop' => $item->id]) }}">
                                        حذف
                                    </a>
                                </p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
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
