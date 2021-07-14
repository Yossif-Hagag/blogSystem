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
                border: 2px solid #209bca;
                border-radius: 5px;
                background-color: #FFF;
            }
        .buttonn{
             height: 49px;
              font-style: bold;
                text-align: left;
                font-size: 20px;
                text-align: center;
                margin-bottom: 15px;
                border-color: #209bca;
                border-radius: 5px;
                background-color: #209bca;
        }
        .btn-link {
    font-size: 18px;
}
        .comments{
            min-height: 30px;
            width: 500px;
            padding: 20px;
            background-color: #209bca;
            color: #fff;
            font-size: 16px;
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
        <div class="col-md-1"></div>
        <div class="col-md-10">
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
                <div class="card-footer d-flex flex-column justify-content-around">
                        @foreach($comments as $comment)
                          @if($comment->article_id == $article->id)
                            <center><div class="card comments m-4"><span style="font-size:18px;color: #000;margin-right: auto;">{{$comment->user->name}}</span>
                                <hr style="color:#fff;border:1px solid #fff;">{{$comment->comment}}</div></center>
                          @endif
                       @endforeach
                      <div class="d-flex justify-content-around">
                        <div class="col-md-2"></div>
                         <form method="POST" style="width: 100%" action="{{route('storeComment', $article->id)}}">
                            @csrf
                            <input type="text" class="inputBlue" style="width:70%;" name="comment">
                            <button class="btn btn-primary buttonn mt-2">Send</button>
                         </form>
                      </div>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection