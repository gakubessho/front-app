@extends("layouts.helloapp")

@section("title","Show")

@section("menubar")
    @parent
    詳細ページ
@endsection

@section("content")
    <table>
        <tr><th>id: </th><td>{{$items->id}}</td></tr>
        <tr><th>name: </th><td>{{$items->name}}</td></tr>
        <tr><th>mail: </th><td>{{$items->mail}}</td></tr>
        <tr><th>age: </th><td>{{$items->age}}</td></tr>
    </table>
@endsection

@section("footer")
    copyright 2018 
@endsection

