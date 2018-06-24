@extends('layouts.app')

@section('title', 'Расписание')

@section('content')
    <div class="ui segment">
        <div class="ui stackable grid">
          <div class="row">
            <div class="sixteen wide column">
              <div class="ui steps">
                <div class="ui red step button" id="1">
                  <div class="content">
                    <a class="ui red button">ПН</a>
                  </div>
                </div>
                <div class="ui orange step button" id="2">
                  <div class="content">
                    <a class="ui orange button">ВТ</a>
                  </div>
                </div>
                <div class="ui yellow step button" id="3">
                  <div class="content">
                    <a class="ui yellow button">СР</a>
                  </div>
                </div>
                <div class="ui green step button" id="4">
                  <div class="content">
                    <a class="ui green button">ЧТ</a>
                  </div>
                </div>
                <div class="ui teal step button" id="5">
                  <div class="content">
                    <a class="ui teal button">ПТ</a>
                  </div>
                </div>
                <div class="ui blue step button" id="6">
                  <div class="content">
                    <a class="ui blue button">СБ</a>
                  </div>
                </div>
                <div class="ui violet step button" id="7">
                  <div class="content">
                    <a class="ui violet button">ВС</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="ten wide column">
              <div class="ui stackable grid">
                <div class="row">
                  <div class="sixteen wide column">
                    <form name="selectGroupForm" method="POST" class="ui form">
                      <div class="field">
                        <div class="ui stackable grid">
                          <div class="eleven wide column">
                            <select name="group" class="ui fluid dropdown">
                            
                            </select>
                          </div>
                          <div class="five wide column">
                            <input type="button" name="selectGroupButton" value="Показать расписание" class="ui button">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="sixteen wide column">
                  
                  </div>
                </div>
              </div>
            </div>
            <div class="six wide column">
                <table id="schedule_rings" class="ui unstackable table">
                    <thead>
                        <tr>
                        <th colspan="2"><h4>Звонки</h4></th>
                        </tr>
                        <tr>
                        <th><h4>Пара</h4></th>
                        <th><h4>Время</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>8:30 - 10:00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>10:10 - 11:40</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>11:50 - 13:40</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>13:50 - 15:20</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>15:30 - 17:00</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>17:10 - 18:30</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>18:35 - 20:00</td>
                        </tr>
                    </tbody>
                </table>
                <table id="schedule_lunchs" class="ui table celled">
                    <thead>
                        <tr>
                        <th colspan="2"><h4>Обеды</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>11:40 - 12:10</td>
                            <td> 1, 2 этаж старого здания</td>
                        </tr>
                        <tr>
                            <td>12:30 - 12:50</td>
                            <td> 1 этаж нового здания, 3 этаж старого здания</td>
                        </tr>
                        <tr>
                            <td>13:20 - 13:40</td>
                            <td> 3, 4 этаж нового здания</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/getDay.js') }}"></script>
@endsection