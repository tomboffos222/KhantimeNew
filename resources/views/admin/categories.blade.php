@extends('layouts.admin')

@section('content')







    <div class="col-lg-6">
        <table class="table-striped">

            <tr>

                <td>название</td>
                <td>действие</td>
            </tr>

            <tbody>
            @foreach($articles as $article)
                <tr>

                    <td>{{$article->name}}</td>
                    <td>

                        <a href="{{route('admin.DeleteCategory',$article->id)}} " class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$articles->links()}}
    </div>
    <div class="col-lg-6">
        <table class="table-striped">

            <tr>

                <td>название</td>
                <td>Главная категория</td>
                <td>действие</td>
            </tr>

            <tbody>
            @foreach($sub_cats as $sub_cat)
                <tr>

                    <td>{{$sub_cat->title}}</td>
                    <td>
                        @foreach($articles as $article)
                            @if($article['id'] == $sub_cat['parent_id'])
                                {{$article->name}}
                            @endif
                        @endforeach
                    </td>
                    <td>

                        <a href="{{route('admin.DeleteSubCategory',$sub_cat->id)}} " class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$articles->links()}}
    </div>
    <style>
        table img{
            width: 250px;
            height: 150px;


        }

        td{
            padding: 10px 10px;
        }
    </style>


@endsection
