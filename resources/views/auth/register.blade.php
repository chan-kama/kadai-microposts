@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Sign up</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'signup.post']) !!}   {{-- フォームを作成　入力データはルーティング名signup.postへ渡す　signup.postはroutes/web.phpに定義 --}}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}         {{-- ラベル作成　ラベルタイトルはName --}}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}     {{-- 入力欄作成　データ名はname　oldで再入力時に入力済みデータを保持 --}}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
            
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}     {{-- セキュリティの観点からpasswordにはoldを適用せず --}}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection