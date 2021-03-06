@extends("layouts.helloapp")

@section("title","Person.index")

@section("menubar")
    @parent
    インデックスページ
@endsection

@section("content")
    <table>
    <tr><td>Person</td><td>Board</tr></td>
        @foreach ($items as $item)
            <tr>    
                <td>{{$item->getData()}}</td>
                <td>@if ($item->board != null)
                        {{$item->board->getData()}}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section("footer")
    copyright 2018 
@endsection

