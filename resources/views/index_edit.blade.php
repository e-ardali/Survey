@extends('layouts.dashboard')

@section('content')
    <div id="app" class="container">
        @include('parts.breadcrumb')
        @include('parts.page_title')

        <div class="box bg-white border rounded">
            <form method="post" action="{{ route('indices.update', ['index' => $record['id']]) }}">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="p-5">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-xl-4">
                            <div class="form-group">
                                <label>عنوان</label>
                                <input class="form-control @error('title') is-invalid @enderror" name="title"
                                       value="{{ $record['title'] }}">
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
                                    <option value="1" @if($record['type'] == 1) selected @endif>نقطه قوت</option>
                                    <option value="2" @if($record['type'] == 2) selected @endif>نقطه ضعف</option>
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
                                <button type="submit" class="btn btn-success px-5">ویرایش</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
