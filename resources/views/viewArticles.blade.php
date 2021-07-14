@extends('layouts.app')

@section('style')
<style>
            body  {
                background: rgb(238,174,202);
                background: linear-gradient(90deg, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
                padding: 0px;
                margin: 0px;
            }
            .paginate {
            display:flex;
            justify-content:space-around;
        }
        img{
            height: 400px;
        }   
        </style>
@endsection

@section('links')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}"> Home </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin') }}"> Dashboard </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/viewArticles') }}"> View Articles </a>
    </li>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @foreach($articles as $article)
            <div class="card m-5">
                <div class="card-header d-flex justify-content-between">
                    <div><h3>{{$article->title}}</h3>Created at : {{$article->created_at}}</div>
                    <div><h4>Category</h4><center style="font-weight: bold;">{{$article->category->name}}</center></div>
                    @if($article->published == 1)
                        <div style="color:#0a750ac4;font-size: 20px;font-weight: bold;">Published</div>
                    @endif
                </div>
                @if($article->photo)
                    <img class="card-img-top" src="{{asset('images/articles/' . $article->photo)}}"/>
                @else
                    <img class="card-img-top" src="{{asset('images/article.jpg')}}"/>
                @endif 
                <div class="card-body"><p style="font-size: 18px">{{$article->body}}</p></div>
                <div class="card-footer d-flex justify-content-around">
                    @if($article->published == 0)
                        <form method="post" action="{{ route('publishArticle', $article->id) }}">
                            @csrf
                            <button class="btn btn-success" type="submit"> Publish </button>
                        </form>
                    @else
                        <form method="post" action="{{ route('unPublishArticle', $article->id) }}">
                            @csrf
                            <button class="btn btn-dark" type="submit"> Un Publish </button>
                        </form>
                    @endif
                    <form method="get" action="{{ route('updateArticle', $article->id) }}">
                        @csrf
                        <button class="btn btn-info" type="submit"> Update </button>
                    </form>
                    <form method="post" action="{{ route('deleteArticle', $article->id) }}">
                        @csrf
                        <button class="btn btn-danger" type="submit"> Delete </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class = "paginate">{{ $articles->links() }}</div>
</div>
@endsection