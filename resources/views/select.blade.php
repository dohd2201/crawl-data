<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset("frontend/plugins/bootstrap/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("frontend/plugins/animate/animate.min.css")}}">
    <link rel="stylesheet" href="{{asset("frontend/plugins/fontawesome/all.css")}}">
    <link rel="stylesheet" href="{{asset("frontend/plugins/webfonts/font.css")}}">
    <link rel="stylesheet" href="{{asset("frontend/css/owl.carousel.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("frontend/css/owl.theme.default.min.css")}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset("frontend/css/style.css")}}">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{asset("frontend/plugins/uikit/uikit.min.css")}}" />
    <link rel="stylesheet" href="{{asset("frontend/css/sign.css")}}">
    <link rel="stylesheet" href="{{asset("css/sign.css")}}" >
    <title>News</title>
</head>
<body>
<div>
    <h1 class="text-center p-3">Nhóm 4</h1>
    <div class="wrapper">
        <div class="current-news">
            <div class="current-news__title">
                <h2>***{{$post->title}}***</h2>
            </div>
            <div class="current-news__description">
                <h3>- {{$post->description}}</h3>
            </div>
            <div class="current-news__image">
                <img src="{{$post->image}}" />
            </div>
            <div class="current-news__content">
                <p>{{$post->content}}</p>
            </div>
        </div>
        <div class="list-category">
            @foreach($categories as $category)
                <div class="category-item p-1 mb-2">
                    <div class="category-item_img">
                        <img src="{{$category->image}}" />
                    </div>
                    <p>{{$category->title}}</p>
                </div>
            @endforeach
            <div>
                <ul class="pagination">
                    {{ $categories->links('pagination::bootstrap-4') }}
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script async defer crossorigin="anonymous" src="{{asset("frontend/plugins/sdk.js")}}"></script>
<script src="{{asset("frontend/plugins/jquery-3.4.1/jquery-3.4.1.min.js")}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset("frontend/plugins/bootstrap/popper.min.js")}}"></script>
<script src="{{asset("frontend/plugins/bootstrap/bootstrap.min.js")}}"></script>
<script src="{{asset("frontend/plugins/owl.carousel/owl.carousel.min.js")}}"></script>
<script src="{{asset("frontend/js/home.js")}}"></script>
<script src="{{asset("frontend/js/script.js")}}"></script>
<script src="{{asset("frontend/plugins/uikit/uikit.min.js")}}"></script>
<script src="{{asset("frontend/plugins/uikit/uikit-icons.min.js")}}"></script>
