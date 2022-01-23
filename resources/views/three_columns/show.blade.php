@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h3>３コラム詳細ページ　id = {{ $three_column->id }}</h3>
<p>・ユーザーID:{{ $user->id }}　・イベントID：{{ $event->id }}　・3コラムID：{{ $three_column->id}}</p>

<table class="table table-bordered">
  <tr>
    <th>作成日時</th>
    <th>最終変更日時</th>
    <th>ユーザーID</th>
    <th>イベントID</th>
    <th>3コラムID</th>
  </tr>

  <tr>
    <td>{{ $three_column->created_at}}</td>
    <td>{{ $three_column->updated_at }}</td>
    <td>{{ $user->id }}</td>
    <td>{{ $event->id }}</td>
    <td>{{ $three_column->id }}</td>
  </tr>

  <tr>
    <th>1-1 タイトル</th>
    <th>1-2 内容</th>
    <th>2-1 感情</th>
    <th>2-2強さ</th>
    <th>3 その時考えた事</th>
  </tr>

  <tr>
    <td>{{ $three_column->title }}</td>
    <td>{{ $three_column->content }}</td>
    <td>{{ $three_column->emotion_name }}</td>
    <td>{{ $three_column->emotion_strength }}</td>
    <td>{{ $three_column->thinking }}</td>
  </tr>

</table>


<table class="table table-bordered">

  <tr>
    <th>考え方の癖</th>
    <td>
      <div class="form-group">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[0]" id="1" 
            <?php 
              if (in_array(1, $habit_id)) {
                echo 'checked';
              } 
            ?>
          >
          <label class="form-check-label" for="1">
            一般化のし過ぎ
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[0]" id="1" 
            <?php 
              if (in_array(2, $habit_id)) {
                echo 'checked';
              } 
            ?>
          >
          <label class="form-check-label" for="1">
            自分への関連付け
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[0]" id="1" 
            <?php 
              if (in_array(3, $habit_id)) {
                echo 'checked';
              } 
            ?>
          >
          <label class="form-check-label" for="1">
            根拠のない推論
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[0]" id="1" 
          <?php 
              if (in_array(4, $habit_id)) {
                echo 'checked';
              } 
            ?>
          >
          <label class="form-check-label" for="1">
            白か黒か思考
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[0]" id="1" 
            <?php 
              if (in_array(5, $habit_id)) {
                echo 'checked';
              } 
            ?>
          >
          <label class="form-check-label" for="1">
            すべき思考
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[0]" id="1" 
            <?php 
              if (in_array(6, $habit_id)) {
                echo 'checked';
              } 
            ?>
          >
          <label class="form-check-label" for="1">
            過大評価と過少評価
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="habit[0]" id="1" 
            <?php 
              if (in_array(7, $habit_id)) {
                echo 'checked';
              } 
            ?>
          >
          <label class="form-check-label" for="1">
            感情による決めつけ
          </label>
        </div>
      </div>
    </td>

  </tr>
</table>

<div class="buttons-first">
  <form action="{{ route('seven_columns.create', ['id' => $three_column->id]) }}" method="get">
    @CSRF
    <button type="submit" class="btn btn-success btn-lg">7コラム作成</button>
  </form>
</div>

<div class="buttons">
  <form action="{{ route('three_columns.edit', ['param' => $three_column->id] ) }}", method="get">
    @CSRF
    <button type="submit" class="btn btn-secondary btn-lg">編集</button>
  </form>
</div>

<div class="buttons">
  <form action="{{ route('three_columns.destroy', ['param' => $three_column->id] ) }}", method="post">
    @CSRF
    <button type="submit" class="btn btn-danger btn-lg" onclick="confirmDelete();return false;">削除</button>
  </form>
</div>

<div class="buttons">
  <button class="btn btn-primary btn-lg" onclick="history.back(-1)">戻る</button>
</div>

@endsection