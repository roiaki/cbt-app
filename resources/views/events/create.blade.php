@extends('layouts.app')

@section('content')

<h3>出来事　新規作成</h3>

<div class="row">
  <div class="col-5">
    <!-- model 第一引数：Modelのインスタンス、第二引数：連想配列　-->
    {!! Form::open(['route' => 'events.store']) !!}

    <div class="form-group">
      <!-- タイトル -->
      <label for="title">出来事 の タイトル</label>
      <!-- idはグローバル属性であり、HTML内の全ての要素に適用される。
            name属性はHTMLの特定の要素（フォーム要素）主にバックエンド
      -->
      <input type="text" class="form-control" id="title" name="title">

      <!-- バリデーションエラー表示-->
      @if($errors->has('title'))
      @foreach($errors->get('title') as $message)
      <ul>
        <li class="ml-2 my-1 text-danger">{{ $message }}</li>
      </ul>
      @endforeach
      @endif
    </div>

    <div class="form-group">
      <!-- 内容 -->
      <label for="content">出来事 の 内容</label>
      <textarea class="form-control" id="content" name="content" cols="90" rows="7"></textarea>

      <!-- バリデーションエラー表示-->
      @if($errors->has('content'))
      @foreach($errors->get('content') as $message)
      <ul>
        <li class="ml-2 my-1 text-danger">{{ $message }}</li>
      </ul>
      @endforeach
      @endif
    </div>

    {!! Form::submit('作成', ['class' => 'btn btn-primary btn-lg']) !!}

    {!! Form::close() !!}
  </div>
</div>
@endsection