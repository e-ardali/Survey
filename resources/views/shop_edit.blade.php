@extends('layouts.dashboard')

@section('content')
    <div id="app" class="container">
        @include('parts.breadcrumb')
        @include('parts.page_title')

        <div class="box bg-white border rounded">
            <form method="post" action="{{ route('shops.update', ['shop' => $record->id]) }}">
                @method('PUT')
                @csrf
                <div class="p-5">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>کد فروشگاه</label>
                                <input class="form-control @error('shop_code') is-invalid @enderror" name="shop_code"
                                       value="{{ $record->shop_code }}">
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
                                       value="{{ $record->name }}">
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
                                       value="{{ $record->zone }}">
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
                                       value="{{ $record->state }}"
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
                                       value="{{ $record->city }}"
                                       name='city' @if(!$record->state) disabled="true" @endif>
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
                </div>
            </form>
        </div>
    </div>
@endsection
