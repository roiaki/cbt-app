@extends('layouts.app')

@section('content')

<h3>７コラム新規作成</h3>

<div class="row">
  <div class="col-6">
    <!-- model 第一引数：Modelのインスタンス、第二引数：連想配列　-->
    <form action="{{ route('seven_columns.store') }}" method="POST">
      @csrf

      <input type="hidden" name="threecol_id" value="{{ $threecolumn->id }}">
      <input type="hidden" name="event_id" value="{{ $threecolumn->event_id }}">
      
      <div class="form-group">
        <label for="title">①-1　出来事 の タイトル</label>
        <!-- idはグローバル属性であり、HTML内の全ての要素に適用される。
                 name属性はHTMLの特定の要素（フォーム要素）主にバックエンド
            -->
        <input type="text" 
               class="form-control" 
               id="title" 
               name="title" 
               value="{{ $threecolumn->title }}"
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
        <label for="content">①-2  出来事 の 内容</label>
        <textarea class="form-control" 
                  id="content" 
                  name="content" 
                  cols="90" 
                  rows="5"
                  readonly>{{ $threecolumn->content }}</textarea>

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
        <label for="emotion_name">②-1　感情名</label>
        <input type="text"
               class="form-control" 
               id="emotion_name" 
               name="emotion_name"
               readonly  
               value="{{ $threecolumn->emotion_name }}"
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
        <label for="emotion_strength">②-2　感情の強さ</label>
        <input type="number"
               class="form-control"
               id="emotion_strength"
               name="emotion_strength"
               readonly
               value="{{ $threecolumn->emotion_strength }}"
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
        <label for="thinking">③　その時考えたこと</label>
        <p>ポイント：言い訳せずに簡単な言葉で表現する</p>
        <textarea class="form-control" 
                  id="thinking" 
                  name="thinking" 
                  cols="90" 
                  rows="5" 
                  readonly>{{ $threecolumn->thinking }}</textarea>

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
        <label for="basis_thinking">④　自分の考えの根拠</label>
        <p>ポイント：客観的であるとベスト。<br>人から尋ねられた時に「だって」と説明するように</p>
        <textarea class="form-control" 
                  id="basis_thinking" 
                  name="basis_thinking" 
                  cols="90" 
                  rows="5"></textarea>

        @if($errors->has('basis_thinking'))
        @foreach($errors->get('basis_thinking') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <div class="form-group">
        <label for="opposite_fact">⑤　逆の事実</label>
        <p>ポイント：「でも」そう考えなくても良いのでは？</p>
        <textarea class="form-control" 
                  id="opposite_fact" 
                  name="opposite_fact" 
                  cols="90" 
                  rows="5"></textarea>

        @if($errors->has('opposite_fact'))
        @foreach($errors->get('opposite_fact') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <div class="form-group">
        <label for="new_thinking">⑥　新しい考え方</label>
        <p>ポイント:④と考えられるけど、⑤とも考えられる</p>
        <textarea class="form-control" 
                  id="new_thinking" 
                  name="new_thinking" 
                  cols="90" 
                  rows="5"></textarea>

        @if($errors->has('new_thinking'))
        @foreach($errors->get('new_thinking') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <div class="form-group">
        <label for="new_emotion">⑦  新しい感情</label>
        <p>ポイント：「⑥新しい考え」のように考えると、どんな感情と強さに変わった？</p>
        <textarea class="form-control" 
                  id="new_emotion" 
                  name="new_emotion" 
                  cols="90" 
                  rows="5"></textarea>

        @if($errors->has('new_emotion'))
        @foreach($errors->get('new_emotion') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>
  
      <input type="submit" class="btn btn-primary btn-lg" value="3コラムから7コラムへ">

      <div class="buttons">
        <button type="button" class="btn btn-secondary btn-lg" onclick="history.back(-1)">戻る</button>
      </div>

    </form>
    
  </div>
</div>
@endsection