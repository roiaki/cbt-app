@extends('layouts.app')

@section('content')

<h3>7コラム一覧</h3>

@if (count($seven_columns) > 0)
<table class="table table-striped table-bordered">
  <thead>
    <tr class="table-primary">
      <th>id</th>
      <th>タイトル</th>
      <th>内容</th>
      <th>更新日</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($seven_columns as $seven_column)
    <tr>
      <td>{{ $seven_column->id }}</td>
      <td>{{ $seven_column->title }}</td>
      <td>{{ $seven_column->content }}</td>
      <td>{{ $seven_column->updated_at }}
        <p><a href="{{ route('seven_columns.show', $seven_column->id) }}">詳細</a></p>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="d-flex justify-content-center">
  {{ $seven_columns->links('pagination::bootstrap-4') }}
</div>
@endif

@endsection