@extends('layouts.app')

@section('content')

<h3>3コラム一覧</h3>
@if (count($three_columns) > 0)
<table class="table table-striped table-bordered">
  <thead>
    <tr class="table-primary">
      <th>3コラムid</th>
      <th>感情名</th>
      <th>考えたこと</th>
      <th>更新日</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($three_columns as $three_column)
    <tr>
      <td>
        <a href="{{ route('three_columns.show', $three_column->id) }}">{{ $three_column->id }}</a>
      </td>
      <td>{{ $three_column->emotion_name }}</td>
      <td>{{ $three_column->thinking }}</td>
      <td>{{ $three_column->updated_at }}
        <p><a href="{{ route('three_columns.show', $three_column->id) }}">詳細</a></p>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endif

<div class="d-flex justify-content-center">
  {{ $three_columns->links('pagination::bootstrap-4') }}
</div>

@endsection