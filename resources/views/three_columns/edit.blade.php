@extends('layouts.app')

@section('content')

<h3>id: {{ $three_column->id }} の　3コラム　編集ページ</h3>

<div class="row">
  <div class="col-6">
    <!-- 'route' => ['messages.update', $message->id] というルーティング指定になります。
        配列の2つ目に $message->id を入れることで 
        update の URL である /messages/{message} の {message} に id が入ります
    -->

    <form action="{{ route('three_columns.update', ['param' => $three_column->id] ) }}" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" name="eventid" value="{{ $event->id }}">

      <div class="form-group">
        <!-- タイトル -->
        <label for="title">出来事 の タイトル</label>
        <!-- idはグローバル属性であり、HTML内の全ての要素に適用される。
                 name属性はHTMLの特定の要素（フォーム要素）主にバックエンド
            -->
        <input type="text" 
               class="form-control" 
               id="title" 
               name="title" 
               value="{{ $event->title }}" 
               readonly
        >

        <!-- タイトル必須バリデーション表示-->
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
        <textarea class="form-control" 
                  id="content" 
                  name="content" 
                  cols="90" 
                  rows="5" 
                  readonly>{{ $event->content }}</textarea>

        <!-- 内容必須バリデーション表示-->
        @if($errors->has('content'))
        @foreach($errors->get('content') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>


      <div class="form-group">
        <label for="emotion_name">感情名</label>
        <input type="text" 
               class="form-control" 
               id="emotion_name" 
               name="emotion_name" 
               value="{{$three_column->emotion_name }}"
        >

        <!-- 感情名必須バリデーション表示-->
        @if($errors->has('emotion_name'))
        @foreach($errors->get('emotion_name') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <div class="form-group">
        <label for="emotion_strength">強さ</label>
        <input type="number" 
               class="form-control" 
               id="emotion_strength" 
               name="emotion_strength" 
               value="{{ $three_column->emotion_strength }}"
        >

        <!-- 感情名必須バリデーション表示-->
        @if($errors->has('emotion_strength'))
        @foreach($errors->get('emotion_strength') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <div class="form-group">
        <label for="thinking">その時考えたこと</label><br>
        <textarea class="form-control" 
                  id="thinking" 
                  name="thinking" 
                  cols="90" 
                  rows="7">{{$three_column->thinking }}</textarea>

        <!-- 感情名必須バリデーション表示-->
        @if($errors->has('thinking'))
        @foreach($errors->get('thinking') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <div class="form-group">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[0]" id="1" <?php
                                                                                  if (in_array(1, $habit_id)) {
                                                                                    echo 'checked';
                                                                                  }
                                                                                  ?>>
          <label class="form-check-label" for="1">
            一般化のし過ぎ
          </label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[1]" id="2" <?php
                                                                                  if (in_array(2, $habit_id)) {
                                                                                    echo 'checked';
                                                                                  }
                                                                                  ?>>
          <label class="form-check-label" for="2">
            自分への関連付け
          </label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[2]" id="3" <?php
                                                                                  if (in_array(3, $habit_id)) {
                                                                                    echo 'checked';
                                                                                  }
                                                                                  ?>>
          <label class="form-check-label" for="3">
            根拠のない推論
          </label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[3]" id="4" <?php
                                                                                  if (in_array(4, $habit_id)) {
                                                                                    echo 'checked';
                                                                                  }
                                                                                  ?>>
          <label class="form-check-label" for="4">
            白か黒か思考
          </label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[4]" id="5" <?php
                                                                                  if (in_array(5, $habit_id)) {
                                                                                    echo 'checked';
                                                                                  }
                                                                                  ?>>
          <label class="form-check-label" for="5">
            すべき思考
          </label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[5]" id="6" <?php
                                                                                  if (in_array(6, $habit_id)) {
                                                                                    echo 'checked';
                                                                                  }
                                                                                  ?>>
          <label class="form-check-label" for="6">
            過大評価と過少評価
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[6]" id="7" <?php
                                                                                  if (in_array(7, $habit_id)) {
                                                                                    echo 'checked';
                                                                                  }
                                                                                  ?>>
          <label class="form-check-label" for="7">
            感情による決めつけ
          </label>
        </div>
        <!-- 必須バリデーション表示-->
        @if($errors->has('habit'))
        @foreach($errors->get('habit') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <input type="submit" class="btn btn-primary btn-lg" value="更新">

      <div class="buttons">
        <button type="button" class="btn btn-secondary btn-lg" onclick="history.back(-1)">戻る</button>
      </div>
    </form>
  </div>
</div>

@endsection