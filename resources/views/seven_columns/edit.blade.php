@extends('layouts.app')

@section('content')

<h3>id: {{ $seven_column->id }} の7コラム編集ページ</h3>

<div class="row">
  <div class="col-5">
    <!-- 'route' => ['messages.update', $message->id] というルーティング指定になります。
        配列の2つ目に $message->id を入れることで 
        update の URL である /messages/{message} の {message} に id が入ります
        -->
    {!! Form::model($seven_column, 
          ['route' => ['seven_columns.update', $seven_column->id], 
          'method' => 'put']) 
    !!}

    <form action="{{ route('seven_columns.update', ['param' => $seven_column->id] ) }}" method="POST">
      @csrf
      @method('PUT')
        <div class="form-group">
          <!-- タイトル -->
          <label for="title">①-1 タイトル</label>
          <input type="text"
                class="form-control"
                id="title"
                name="title"
                readonly
                value="{{ $seven_column->title }}">
        
          <!-- タイトル必須バリデーション表示 課題：まとめてかけないか-->
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
        <label for="content">①-2  内容</label>
        <textarea class="form-control" 
                  id="content" 
                  name="content" 
                  cols="50" 
                  rows="3"
                  readonly>{{ $seven_column->content }}</textarea>

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
        <label for="emotion-name">②-1  感情名</label>
        <input type="text" 
              class="form-control" 
              name="emotion_name" 
              readonly 
              value="{{ $seven_column->emotion_name }}">

        <!-- 内容必須バリデーション表示-->
        @if($errors->has('emotion_name'))
        @foreach($errors->get('emotion_name') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>
      
      <div class="form-group">
        <label for="emotion-strength">②-2  強さ</label>
        <input type="number" 
              class="form-control" 
              name="emotion_strength" 
              readonly 
              value="{{ $seven_column->emotion_strength }}">

        <!-- 内容必須バリデーション表示-->
        @if($errors->has('emotion_strength'))
        @foreach($errors->get('emotion_strength') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>
      
      <div class="form-group">
        <label for="thinking">③ その時考えたこと</label><br>
        <textarea class="form-control" 
                  id="thinking" 
                  name="thinking" 
                  cols="50" 
                  rows="3" 
                  readonly>{{ $seven_column->thinking }}</textarea>

        <!-- 内容必須バリデーション表示-->
        @if($errors->has('thinking'))
        @foreach($errors->get('thinking') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <div class="form-group">
        <label for="basis_thinking">④  考えの根拠</label>
        <textarea class="form-control" 
                  id="basis_thinking" 
                  name="basis_thinking" 
                  cols="50" 
                  rows="3">{{ $seven_column->basis_thinking }}</textarea>

        <!-- 内容必須バリデーション表示-->
        @if($errors->has('basis_thinking'))
        @foreach($errors->get('basis_thinking') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <div class="form-group">
        <label for="opposite_fact">⑤  逆の事実</label>
        <textarea class="form-control" 
                  id="opposite_fact" 
                  name="opposite_fact" 
                  cols="50" 
                  rows="3">{{ $seven_column->opposite_fact }}</textarea>

        <!-- 内容必須バリデーション表示-->
        @if($errors->has('opposite_fact'))
        @foreach($errors->get('opposite_fact') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <div class="form-group">
        <label for="new_thinking">⑥  新しい考え</label>
        <textarea class="form-control" 
                  id="new_thinking" 
                  name="new_thinking" 
                  cols="50" 
                  rows="3">{{ $seven_column->new_thinking }}</textarea>

        <!-- 内容必須バリデーション表示-->
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
        <textarea class="form-control" 
                  id="new_emotion" 
                  name="new_emotion" 
                  cols="50" 
                  rows="3">{{ $seven_column->new_emotion }}</textarea>

        <!-- 内容必須バリデーション表示-->
        @if($errors->has('new_emotion'))
        @foreach($errors->get('new_emotion') as $message)
        <ul>
          <li class="ml-2 my-1 text-danger">{{ $message }}</li>
        </ul>
        @endforeach
        @endif
      </div>

      <div class="buttons-first">
        {!! Form::submit('更新', ['class' => 'btn btn-primary btn-lg']) !!}
      </div>

      <div class="buttons">
        <button type="button" class="btn btn-secondary btn-lg" onclick="history.back(-1)">戻る</button>
      </div>
    </form>
    
  </div>
</div>

@endsection