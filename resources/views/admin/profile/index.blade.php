@extends('layouts.admin')
@section('title', '登録済みプロフィールの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ProfileController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">名前</th>
                                <th width="20%">性別</th>
                                <th width="50%">趣味</th>
                                <th width="50%">自己紹介</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $Profiles)
                                <tr>
                                    <th>{{ $Profiles->id }}</th>
                                    <td>{{ \Str::limit($Profiles->name, 100) }}</td>
                                    <td>{{ \Str::limit($Profiles->gender, 100) }}</td>
                                    <td>{{ \Str::limit($Profiles->hobby, 100) }}</td>
                                    <td>{{ \Str::limit($Profiles->introduction, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\ProfileController@edit', ['id' => $Profiles->id]) }}">編集</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection