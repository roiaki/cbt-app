@extends('layouts.app')

@section('content')

<h3>出来事一覧</h3>

@if (count($events) > 0)
<table class="table table-striped table-bordered">
  <thead>
    <tr class="table-primary">
      <th>タイトル</th>
      <th>内容</th>
      <th>更新日</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($events as $event)
    <tr>
      <td>{{ $event->title }}</td>
      <td>{{ $event->content }}</td>
      <td>{{ $event->updated_at }}
        <p><a href="{{ route('events.show', $event->id) }}">詳細</a></p>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endif

{!! link_to_route('events.create', '新規作成', [], ['class' => 'btn btn-primary btn-lg']) !!}

<div class="d-flex justify-content-center">
  {{ $events->links('pagination::bootstrap-4') }}
</div>

@endsection