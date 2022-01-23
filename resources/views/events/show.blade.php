@extends('layouts.app')

@section('content')

<h3>出来事詳細ページ　id = {{ $event->id }} </h3>

<table class="table table-bordered">
  <tr>
    <th>作成日時</th>
    <th>最終変更日時</th>
    <th>出来事id</th>
    <th>タイトル</th>
    <th>内容</th>

  </tr>
  <tr>
    <td>{{ $event->created_at }}</td>
    <td>{{ $event->updated_at }}</td>
    <td>{{ $event->id }}</td>
    <td>{{ $event->title }}</td>
    <td>{{ $event->content }}</td>
  </tr>
  

</table>
<!--
<a href="{{ route('three_columns.create', $event->id) }}" 
      class="btn btn-success btn-lg" 
      role="button"
      onclick="confirmDelete();return false;" 
      aria-pressed="true">この出来事を元に3コラムを作成
</a>
-->

<div class="buttons-first">
  <form action="{{ route('three_columns.create', ['id' => $event->id]) }}" method="get">
    @CSRF
    <button type="submit" class="btn btn-success btn-lg">3コラム作成</button>
  </form>
</div>

<div class="buttons">
  <form action="{{ route('events.edit', ['event' => $event->id] ) }}", method="get">
    @CSRF
    <button type="submit" class="btn btn-secondary btn-lg">編集</button>
  </form>
</div>

<div class="buttons">
  <form action="{{ route('events.delete', ['event' => $event->id] ) }}", method="post">
    @CSRF
    <button type="submit" class="btn btn-danger btn-lg" onclick="confirmDelete();return false;">削除</button>
  </form>
</div>

<div class="buttons">
  <button class="btn btn-primary btn-lg" onclick="history.back(-1)">戻る</button>
</div>


@endsection