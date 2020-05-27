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
          <input type="text" class="form-control" name="expired_at" placeholder="истечет (дд.мм.гггг)"
                 value="{{old('expired_at')}}">
        </div>
        <div class="col-lg-3 col-md-12 text-lg-left text-right">
          <button type="submit" class="btn btn-primary">Создать</button>
        </div>
      </div>
    </form>
    @if($shortLinkList->count())
      <table class="table table-striped mt-2">
        <thead>
        <tr>
          <th>Исходная ссылка</th>
          <th>Короткая ссылка</th>
          <th>Истекает</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($shortLinkList as $shortLink)
          <tr>
            <td>{{$shortLink->link}}</td>
            <td>{{url($shortLink->code)}}</td>
            <td>
              @isset($shortLink->expired_at)
                {{$shortLink->expired_at->format('d.m.Y')}}
              @endisset
            </td>
            <td>
              <a class="btn btn-outline-dark" href="{{route('statistic', $shortLink->code)}}">
                Статистика
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    @endif
  </div>
@endsection
