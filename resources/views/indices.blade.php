@extends('layouts.dashboard')

@section('content')
    <div id="app" class="container">
        @include('parts.breadcrumb')
        @include('parts.page_title')
        <a href="#insert-box" class="btn btn-primary btn-sm mb-3" data-toggle="collapse" aria-controls="insert-box">
            <i class="mdi mdi-plus-circle top-1"></i>
            افزودن شاخص
        </a>
        <div id="insert-box"
             class="box bg-white border rounded collapse @if(!$errors->isEmpty() || request()->get('action') == 'create') show @endif">
            <form method="post" action="{{ route('indices.store') }}">
                @csrf
                <div class="p-5">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>عنوان</label>
                                <input class="form-control @error('title') is-invalid @enderror" name="title"
                                       value="{{ old('title') }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>نوع شاخص</label>
                                <select class="form-control custom-select @error('type') is-invalid @enderror"
                                        name="type">
                                    <option value="1" @if(old('type') == 1) selected @endif>نقطه قوت</option>
                                    <option value="2" @if(old('type') == 2) selected @endif>نقطه ضعف</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-auto align-self-end text-center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success px-5">افزودن</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="box bg-white border rounded">
            <div class="p-4">
                @if(count($records))
                    @foreach($records as $item)
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-auto py-2">
                                <h6 class="m-0 font-weight-bold">
                                    {{ $item->title }}
                                    <span
                                        class="small @if($item->type == 1) text-success @else text-danger @endif">({{ $item->type_str }})</span>
                                    <br>
                                    <a href="{{ route('indices.edit', ['index' => $item->id]) }}"
                                       class="small text-success">ویرایش</a>
                                    |
                                    <a class="small text-danger open-confirm-alert" href="#here"
                                       data-link="{{ route('indices.destroy', ['index' => $item->id]) }}">
                                        حذف
                                    </a>
                                </h6>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <div class="mt-5">
                        {{ $records->onEachSide(2)->links() }}
                    </div>
                @else
                    <h6 class="text-center font-weight-light">رکوردی وجود ندارد.</h6>
                @endif
            </div>
        </div>
    </div>
@endsection
