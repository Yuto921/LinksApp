<!-- default.blade.phpを親テンプレートとして使います -->
@extends('default')

@section('content')
<div class="container">
        <div>
            <h1>Submit a Link </h1>
            <form action="/submit" method="post" >
            <!-- エラーがあるかどうかをチェックする条件文
                 エラーが存在する場合は、bootstrapのアラートメッセージが表示され、
                 修正するようユーザーに求めます -->
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Plese fix the following errors
                    </div>
                @endif

                {!!csrf_field()!!}

                <!-- name="title" の値を紐づいている -->
                <div class="form-group{{ $errors->has('title') ? 'has-error' : ''}}">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                    @if($errors->has('title'))
                        <div class="alert alert-danger">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{ old('url') }}">
                    @if($errors->has('url'))
                        <span>
                            <div class="alert alert-danger">
                                {{ $errors->first('url') }}
                            </div>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="description">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <div class="alert alert-danger">
                        {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
