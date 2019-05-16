
　　　　{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- profile.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'Myプロフィール')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                 <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="body">氏名(name)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="body" value="{{ old('body') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">性別(gender)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="body" value="{{ old('body') }}">
                        </div>   
                    </div>       
                    <div class="form-group row">
                        <label class="col-md-2" for="body">趣味(hobby)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="body" value="{{ old('body') }}">
                        </div>
                    </div>        
                    <div class="form-group row">
                        <label class="col-md-2" for="body">自己紹介欄(introduction)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="body" value="{{ old('body') }}">
                        </div>
                    </div>            　
                            
                         
                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">   
                        <input type="text" name=""/>
                        <input type="submit" value="Submit"/>
                </form>
            </div>
        </div>
    </div>
@endsection
　　　　
　　　