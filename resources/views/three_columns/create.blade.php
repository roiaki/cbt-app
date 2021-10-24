@extends('layouts.app')

@section('content')

<h3>３コラム新規作成</h3>

<div class="row">
  <div class="col-6">
    <!-- model 第一引数：Modelのインスタンス、第二引数：連想配列　-->
    {!! Form::open(['route' => ['three_columns.store', 'method' => 'get']] ) !!}

    <input type="hidden" name="eventid" value="{{ $event->id }}">

    <div class="form-group">

      <label for="title">1-1 出来事 の タイトル</label>
      <!-- idはグローバル属性であり、HTML内の全ての要素に適用される。
                 name属性はHTMLの特定の要素（フォーム要素）主にバックエンド
            -->
      <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" readonly>

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
      <label for="content">1-2 出来事 の 内容</label>
      <textarea class="form-control" id="content" name="content" cols="90" rows="5" readonly>{{ $event->content }}</textarea>

      <!-- バリデーションエラー表示-->
      @if($errors->has('content'))
      @foreach($errors->get('content') as $message)
      <ul>
        <li class="ml-2 my-1 text-danger">{{ $message }}</li>
      </ul>
      @endforeach
      @endif
    </div>


    <div class="form-group">
      <label for="emotion_name">2-1 感情名</label>
      <input type="text" class="form-control" id="emotion_name" name="emotion_name">

      <!-- バリデーションエラー表示-->
      @if($errors->has('emotion_name'))
      @foreach($errors->get('emotion_name') as $message)
      <ul>
        <li class="ml-2 my-1 text-danger">{{ $message }}</li>
      </ul>
      @endforeach
      @endif
    </div>

    <div class="form-group">
      <label for="emotion_strength">2-2 強さ</label>
      <input type="number" class="form-control" id="emotion_strength" name="emotion_strength">

      <!-- バリデーションエラー表示-->
      @if($errors->has('emotion_strength'))
      @foreach($errors->get('emotion_strength') as $message)
      <ul>
        <li class="ml-2 my-1 text-danger">{{ $message }}</li>
      </ul>
      @endforeach
      @endif
    </div>

    <div class="form-group">
      <label for="thinking">3-1 その時考えたこと</label><br>
      <textarea class="form-control" id="thinking" name="thinking" cols="90" rows="5"></textarea>

      <!-- バリデーションエラー表示-->
      @if($errors->has('thinking'))
      @foreach($errors->get('thinking') as $message)
      <ul>
        <li class="ml-2 my-1 text-danger">{{ $message }}</li>
      </ul>
      @endforeach
      @endif
    </div>

    <label>3-2 考え方の癖</label>
    <div class="form-group">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="habit[0]" id="1">
        <label class="form-check-label" for="1">
          一般化のし過ぎ
        </label>
      </div>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="habit[1]" id="2">
        <label class="form-check-label" for="2">
          自分への関連付け
        </label>
      </div>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="habit[2]" id="3">
        <label class="form-check-label" for="3">
          根拠のない推論
        </label>
      </div>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="habit[3]" id="4">
        <label class="form-check-label" for="4">
          白か黒か思考
        </label>
      </div>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="habit[4]" id="5">
        <label class="form-check-label" for="5">
          すべき思考
        </label>
      </div>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="habit[5]" id="6">
        <label class="form-check-label" for="6">
          過大評価と過少評価
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="habit[6]" id="7">
        <label class="form-check-label" for="7">
          感情による決めつけ
        </label>
      </div>
    </div>


    {!! Form::submit('作成', ['class' => 'btn btn-primary btn-lg']) !!}

    {!! Form::close() !!}
  </div>
</div>
@endsection