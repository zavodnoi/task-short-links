@extends('template')
@section('content')
  <div class="p-3">
    <h1 class="text-center mb-3 mb-lg-4">Создайте свою короткую ссылку</h1>
    @if($errors->count())
      <ul class="text-danger text-left m-auto" style="max-width: 500px;">
        @foreach ($errors->all() as $message)
          <li>{{$message}}</li>
        @endforeach
      </ul>
    @endif
    <form method="POST" action="/">
      {!! csrf_field() !!}
      <div class="row">
        <div class="col-lg-5 offset-lg-2 col-md-12 mb-1">
          <input type="text" class="form-control" name="link" placeholder="Ваша ссылка" value="{{old('link')}}">
        </div>
        <div class="col-lg-2 col-md-12 mb-1">
          <input type="text" class="form-control" name="expired_at" placeholder="Срок жизни" value="{{old('expired_at')}}">
        </div>
        <div class="col-lg-3 col-md-12 text-lg-left text-right">
          <button type="submit" class="btn btn-primary">Создать</button>
        </div>
      </div>
    </form>
  </div>
@endsection
