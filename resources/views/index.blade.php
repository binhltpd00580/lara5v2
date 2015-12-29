<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LTb | Blog</title>
    <link rel="stylesheet" href="{{ asset('css/ltb.css') }}">
</head>
<body>

    <header class="ltb__header">

        <a href="{{ URL('/home') }}" class="ltb_logo">
            <img src="{{ asset('images/logo.png') }}">
        </a>
        <h2>Design and Passion</h2>

    </header>

    <div class="container-fluid">

        <div class="grid">

            @foreach($articles as $article)
            
            <div class="grid__item">

                <a href="{{ URL('/'.$article->slug) }}">
                    <div class="article__card">
                        
                        <img src="{{ asset('upload/'.$article->image) }}">
                        <div class="description">
                            <h3>{{ $article->title }}</h3>
                            <em>{{ $article->created_at->format('H:i') }}</em>
                        </div>

                    </div>              
                                
                </a>    
                
            </div>

            @endforeach

        </div>
        
    </div>
    

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
    <script>
        $('.grid').masonry({
          // options
          itemSelector: '.grid__item',
          columnWidth: 270,
          isFitWidth: true,
          // percentPosition: true
        });

    </script>

</body>
</html>