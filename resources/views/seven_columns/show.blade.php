@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h3>7コラム詳細ページ id = {{ $seven_column->id }} </h3>

<table class="table table-bordered">
  <tr>
    <th>作成日時</th>
    <td>{{ $seven_column->created_at }}</td>
  </tr>
  <tr>
    <th>最終変更日時</th>
    <td>{{ $seven_column->updated_at }}</td>
  </tr>
  <tr>
    <th>id</th>
    <td>{{ $seven_column->id }}</td>
  </tr>
  <tr>
    <th>出来事ID</th>
    <td>{{ $seven_column->event_id }}</td>
  </tr>
  <tr>
    <th>3コラムID</th>
    <td>{{ $seven_column->threecol_id }}</td>
  </tr>
  <tr>
    <th>ユーザーID</th>
    <td>{{ $seven_column->user_id }}</td>
  </tr>
</table>

<table class="table table-bordered">
  <tr>
    <th>1-1 タイトル</th>
    <td>{{ $seven_column->title }}</td>
  </tr>
  <tr>
    <th>1-2 内容</th>
    <td>{{ $seven_column->content }}</td>
  </tr>
</table>

<table class="table table-bordered">
  <tr>
    <th>2-1 感情と強さ</th>
    <td>{{ $seven_column->emotion_name }}</td>
    <td>{{ $seven_column->emotion_strength }}</td>
  </tr>

  <tr>
    <th>3-1 その時考えた事</th>
    <td>{{ $seven_column->thinking }}</td>
  </tr>

  <tr>
    <th>3-2 考え方の癖</th>
    <td><?php foreach($habit_names as $name) {
                echo "・" . $name . "<br>";
              } 
        ?>
    </td>

  </tr>
  <tr>
    <th>4 その考えの根拠</th>
    <td>{{ $seven_column->basis_thinking }}</td>
  </tr>

  <tr>
    <th>5 逆の事実</th>
    </th>
    <td>{{ $seven_column->opposite_fact }}</td>
  </tr>

  <tr>
    <th>6 新しい考え</th>
    <td>{{ $seven_column->new_thinking }}</td>
  </tr>

  <tr>
    <th>7 新しい感情</th>
    <td>{{ $seven_column->new_emotion }}</td>
  </tr>
</table>

<div class="buttons-first">
  <form action="{{ route('seven_columns.edit', ['param' => $seven_column->id] ) }}" , method="GET">
    @CSRF
    <button type="submit" class="btn btn-secondary btn-lg">編集</button>
  </form>
</div>

<div class="buttons">
  <form action="{{ route('seven_columns.destroy', ['param' => $seven_column->id] ) }}" method="POST">
    @CSRF
    <button type="submit" class="btn btn-danger btn-lg" onclick="return confirmDelete();">削除</button>
  </form>
</div>

<div class="buttons">
  <button class="btn btn-primary btn-lg" onclick="history.back(-1)">戻る</button>
</div>
@endsection