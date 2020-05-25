@extends('template')
@section('content')
  <div class="p-5">
    <h1>Создайте свою короткую ссылку</h1>
    <form class="form-inline m-auto" style="max-width: 500px;" method="POST">
      <div class="form-group mr-auto">
        <input type="text" class="form-control" style="width: 300px" name="link" placeholder="Ваша ссылка">
      </div>
      <div class="form-group mr-auto">
        <input type="text" class="form-control" style="width: 110px" name="link" placeholder="Срок жизни">
      </div>
      <button type="submit" class="btn btn-primary">Создать</button>
    </form>
  </div>
@endsection
