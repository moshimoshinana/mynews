


<!--{{-- layouts/admin.blade.phpを読み込む --}}-->
@extends('layouts.profile')


<!--{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}-->
@section('title', 'プロフィールの新規作成')

<!--{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}-->
@section('content')
     <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース新規作成</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="gender" rows="20">{{ old('gender') }}</textarea>
                        </div>
                    </div>
                                        <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="20">{{ old('hobby') }}</textarea>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="送信">
                </form>
            </div>
        </div>
    </div>
@endsection
