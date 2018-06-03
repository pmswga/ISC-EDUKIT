@extends('teacher.layouts.app')

@section('title', 'Персональная информация')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Информация о преподавателе</h1>
          <table class="table table-border">
              <tbody>
                  <tr>
                      <th>Имя</th>
                      <td>{{ Auth::user()->name }}</td>
                  </tr>
                  <tr>
                      <th>Email</th>
                      <td>{{ Auth::user()->email }}</td>
                  </tr>
                  <tr>
                      <th>Описание</th>
                      <td>{{ Auth::user()->getInfo()->caption }}</td>
                  </tr>
              </tbody>
          </table>

          <a href="#"></a>
        </div>
      </div>
    </div>
@endsection
