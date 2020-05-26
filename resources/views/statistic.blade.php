@extends('template')
@section('content')
  <div class="p-3">
    <h1>Список переходов по ссылке {{url($shortLink->code)}}</h1>
    <p class="lead text-muted mb-3 mb-lg-4">ведет на {{$shortLink->link}}</p>
    <p><a href="/">На главную</a></p>
    <table class="table table-striped mt-2">
      <thead>
      <tr>
        <th>Дата и время</th>
        <th>Страна</th>
        <th>Город</th>
        <th>Браузер</th>
        <th>ОС</th>
      </tr>
      </thead>
      <tbody>
      @forelse($clickthroughList as $clickthrough)
        <tr>
          <td>{{$clickthrough->visited_at}}</td>
          <td>{{$clickthrough->country}}</td>
          <td>{{$clickthrough->city}}</td>
          <td>{{$clickthrough->browser}}</td>
          <td>{{$clickthrough->os}}</td>
        </tr>
      @empty
        <tr>
          <td colspan="5">Переходов еще не было</td>
        </tr>
      @endforelse
      </tbody>
    </table>
  </div>
@endsection
