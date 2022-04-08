@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
  <div class="col-sm-7">
    
    <h3 class="title_head">出来事　新規作成</h3>

      <form action="{{ route('events.store') }}" method="post">
        @csrf
        <div class="form-group">
        
          <label class="heading" for="title">出来事 の タイトル</label>
          <input type="text" class="form-control" id="title" name="title" value = "{{ old('title') }}">

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
          <label class="heading" for="content">出来事 の 内容</label>
          <textarea class="form-control" id="content" name="content" cols="90" rows="7">{{ old('content') }}</textarea>

          <!-- バリデーションエラー表示-->
          @if($errors->has('content'))
          @foreach($errors->get('content') as $message)
          <ul>
            <li class="ml-2 my-1 text-danger">{{ $message }}</li>
          </ul>
          @endforeach
          @endif
        </div>

        <input type="submit" value="出来事作成" class="btn btn-primary btn-lg"> 
        
        <div class="buttons">
          <button type="button" class="btn btn-secondary btn-lg" onclick="history.back(-1)">戻る</button>
        </div>
        
      </form>

  </div>
</div>

@endsection