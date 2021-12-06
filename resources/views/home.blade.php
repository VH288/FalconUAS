@extends('navbar.navbar')
@section('content')
<div class="upload-side mt-5 mb-5" style="display:flex; flex-direction:column; justify-content:left; align-items:center; width: 50%;">
    @if (count($posts))
    @foreach ($posts as $post)
        <div class="row card shadow-sm p-3 mb-3" style="width:80%; border-radius:20px;">
            <div class="col">
                <p class="text-capitalize" style="font-size:25px; margin-bottom:-3px; font-weight: bold; color: rgb(23, 17, 75);">{{ $post->username }}</p>
                <p style="font-size:14px; margin-bottom: 10px; color: rgb(161, 161, 161);">{{ $post->post_time }}</p>  
            </div> 
            <div style="word-wrap: break-word;">
                {{ $post->content }}
            </div>
            <br>
            <hr>
            <div style=" margin: 1px;">
                <form action="{{ url('like',$post->id) }}" method="post">
                    @csrf
                    <div class="col" style="float: left;">
                        <button name="likebtn" class="btn btn-link p-0 m-0">
                            <i class="fa fa-heart" style="color: red;" ><p style="color: black; float: right; margin-left: 7px;">{{ $post->likes }}</p></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    @else
        <p>Tidak ada post</p>
    @endif
</div>
<div style="display:flex; flex-direction:column; align-items:center; width: 50%; border-left:2px solid rgb(207, 207, 207);">
    <div class="row card shadow-sm p-3 mb-5 mt-5" style="width:80%; border-radius: 20px;">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="col" style="border-radius: 50px; margin :5px;">
                <textarea class="form-control" name="content" placeholder="Apa yang sedang kamu pikirkan?" required></textarea>
            </div>
            <div class="col d-flex flex-row-reverse" style="margin-top :20px;">
                <button type="submit" class="btn btn-primary" name="upload" style="border-radius: 25px;">Upload</button>
            </div>
        </form>
    </div>
    
        @if (count($userposts))
            @foreach ($userposts as $userpost)
            <div class="row card shadow-sm p-3 mb-3" style="width:80%; border-radius: 20px;">
            <div class="col">
                <a href="{{ route('posts.edit',$userpost->id) }}">
                    <i class="fa fa-edit" style="float: right;"></i>
                </a>
                
                <p class="text-capitalize" style="font-size:25px; margin-bottom:-3px; font-weight: bold; color: rgb(23, 17, 75);">{{ $userpost->username }}</p>
                <p style="font-size:14px; margin-bottom: 10px; color: rgb(161, 161, 161);">{{ $userpost->post_time }}</p>  
            </div>
            <div style="word-wrap: break-word;">
                <p>{{ $userpost->content }}</p>
            </div>
            <br>
            <hr>
            <div class="col" style=" margin: 1px">
                <form action="{{ url('like',$userpost->id) }}" method="post">
                    @csrf
                    <div class="col" style="float: left;">
                        <button name="likebtn" class="btn btn-link p-0 m-0">
                            <i class="fa fa-heart" style="color: red;"><p style="color: black; float: right; margin-left: 7px;">{{ $userpost->likes }}</p></i>
                        </button>
                    </div>
                    <a href="{{ url('delpost',$userpost->id) }}">
                        <i class="fa fa-trash" style="color: red; float: right; padding-top:5px"></i>
                    </a>
                </form>
            </div>
        </div>
            @endforeach
        @else
            <p>Tidak ada post</p>
        @endif
                        
    
</div> 
@endsection