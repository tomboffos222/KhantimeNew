@extends('layouts.admin')

@section('content')




    <div class="d-flex" style="display: flex;">
        <div class="card d-block padding-5 w-50" style="padding:1%;margin-right: 10px; width: 25%;">

            <h4>
                <i class="material-icons">remove_red_eye</i> Итого просмотров: {{$total}}
            </h4>
        </div>
        <div class="card d-block padding-5 w-50" style="padding:1%;margin-right: 10px; width: 25%;">

            <h4>
                <i class="material-icons">remove_red_eye</i> Уникальных пользователей зашло : {{$user_counter}}
            </h4>
        </div>
        <div class="card d-block padding-5 w-50" style="padding:1%; width: 25%;margin-right: 10px;">

            <h4>
                <i class="material-icons">remove_red_eye</i> Всего зашло: {{$counter}}
            </h4>
        </div>

    </div>

    <table class="table-striped">

        <tr>
            <td>фото</td>
            <td>название</td>
            <td>просмотры</td>
            <td>действие</td>

        </tr>

        <tbody>
        @foreach($articles as $article)
            <tr>
                <td><img src="{!! $article->path !!}" alt=""></td>
                <td>{{$article->title}}</td>
                <td>
                    <i class="material-icons">remove_red_eye</i>    {{$article->views}}
                </td>
                <td>
                    @if($article->slide == null || $article->slide == 0)
                    <a href="{{route('admin.AddSlide',$article->id)}}" class="btn btn-success" style="margin-bottom:15px;display:block;">Добавить в слайд</a>

                    @elseif($article->slide == 1)
                    <a href="{{route('admin.DeleteSlide',$article->id)}}" class="btn btn-primary"  style="margin-bottom:15px;display:block;">Удалить из слайда</a>
                    @endif
                    <a href="{{route('admin.DeletePost',$article->id)}} " class="btn btn-danger">Удалить</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$articles->links()}}
    <style>
        table img{
            width: 250px;
            height: 150px;


        }

        td{
            padding: 10px 10px;
        }
        .card i,td i{
            position: relative;
            top:5px
        }
    </style>


@endsection
