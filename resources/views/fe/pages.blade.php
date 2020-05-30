
@extends('layouts.fe')

@section('content')   
<style>
    body {
        background-color: #f8f9fa !important;
    }

    div.title {
        background-color: white;
        border-bottom: 1px solid #ddd;
        display: flex;
        flex-direction: row;
        justify-content: center;
        height: 150px;
        width: 100%;
    }

    div.title h2 {
        line-height: 150px;
    }

    div.wrapper {
        color: #333333;
        height: auto;
        position: relative;
        margin: auto;
        margin-bottom: 70px;
        margin-top: 30px;
        width: 750px;
    }

    div.wrapper h2 {
        font-family: "Open Sans";
        font-size: 22px;
        font-weight: 600;
    }

    div.wrapper h3 {
        font-family: "Open Sans";
        font-size: 19px;
        font-weight: 600;
    }

    div.wrapper h4 {
        font-family: "Open Sans";
        font-size: 17px;
        font-weight: 600;
    }

    div.wrapper p {
        font-family: "Open Sans";
        font-size: 15px;
        margin-bottom: 10px;
    }

    div.wrapper img {
        width: 50%;
    }

    @media screen and (max-width: 800px) {
        div.title {
            height: 100px;
        }

        div.title h2 {
            font-size: 23px;
            line-height: 100px;
        }

        div.wrapper {
            width: 90%;
        }
    }

</style>
<div class="title">
    <h2>{{$content->title}}</h2>								
</div>
<div class="wrapper">
    {!! $content->content !!}
</div>

@endsection