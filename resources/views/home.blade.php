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
        .file-input label,.inputBlue{
                width: 30%;
                height: 50px;
                color: #707070;
                font-style: bold;
                text-align: left;
                font-size: 20px;
                text-align: center;
                margin-bottom: 15px;
                border: 2px solid #000;
                border-radius: 5px;
                background-color: #FFF;
            }
        .buttonn{
             height: 48px;
              font-style: bold;
                text-align: left;
                font-size: 20px;
                text-align: center;
                margin-bottom: 15px;
                border-radius: 5px;
                background-color: #000;
        }
        .btn-link {
    font-size: 18px;
}
        </style>
@endsection

@section('links')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}"> Articles </a>
    </li>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form method ="get" style="width:100%;" action="{{route('filterArticle')}}">  
                <select class="inputBlue" aria-label="Default select example" name="category" required>
                      <option selected value="empty">&nbsp;&nbsp;Choose Category</option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">&nbsp;&nbsp;{{$category->name}}</option>
                      @endforeach
                </select>
                <button class="btn btn-dark ml-2 mt-2 buttonn" type="submit">Filter</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @foreach($articles as $article)
            <div class="card m-5">
                <div class="card-header d-flex justify-content-between">
                    <div><h3>{{$article->title}}</h3>Created at : {{$article->created_at}}</div>
                    <div><h4>Category</h4><center style="font-weight: bold;">{{$article->category->name}}</center></div>
                </div>
                @if($article->photo)
                    <img class="card-img-top" src="{{asset('images/articles/' . $article->photo)}}"/>
                @else
                    <img class="card-img-top" src="{{asset('images/article.jpg')}}"/>
                @endif 
                <div class="card-body"><p style="font-size: 18px">{{$article->body}}</p></div>
                <div class="card-footer d-flex justify-content-around">
                    <form method="get" action="{{ route('commentsForPost', $article->id) }}">
                        @csrf
                        <button class="btn btn-link" type="submit">Comment</button>
                    </form>                   
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class = "paginate">{{ $articles->links() }}</div>
</div>
@endsection