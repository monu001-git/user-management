<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles -->
    <style>
        article {
            --img-scale: 1.001;
            --title-color: black;
            --link-icon-translate: -20px;
            --link-icon-opacity: 0;
            position: relative;
            border-radius: 16px;
            box-shadow: none;
            background: #fff;
            transform-origin: center;
            transition: all 0.4s ease-in-out;
            overflow: hidden;
        }

        article a::after {
            position: absolute;
            inset-block: 0;
            inset-inline: 0;
            cursor: pointer;
            content: "";
        }

        /* basic article elements styling */
        article h2 {
            margin: 0 0 18px 0;
            font-family: "Bebas Neue", cursive;
            font-size: 1.9rem;
            letter-spacing: 0.06em;
            color: var(--title-color);
            transition: color 0.3s ease-out;
        }

        figure {
            margin: 0;
            padding: 0;
            aspect-ratio: 16 / 9;
            overflow: hidden;
        }

        article img {
            max-width: 100%;
            transform-origin: center;
            transform: scale(var(--img-scale));
            transition: transform 0.4s ease-in-out;
        }

        .article-body {
            padding: 24px;
        }

        article a {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            color: #28666e;
        }

        article a:focus {
            outline: 1px dotted #28666e;
        }

        article a .icon {
            min-width: 24px;
            width: 24px;
            height: 24px;
            margin-left: 5px;
            transform: translateX(var(--link-icon-translate));
            opacity: var(--link-icon-opacity);
            transition: all 0.3s;
        }

        /* using the has() relational pseudo selector to update our custom properties */
        article:has(:hover, :focus) {
            --img-scale: 1.1;
            --title-color: #28666e;
            --link-icon-translate: 0;
            --link-icon-opacity: 1;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }


        /************************
Generic layout (demo looks)
**************************/

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 48px 0;
            font-family: "Figtree", sans-serif;
            font-size: 1.2rem;
            line-height: 1.6rem;
            background-image: linear-gradient(45deg, #7c9885, #b5b682);
            min-height: 100vh;
        }

        .articles {
            display: grid;
            max-width: 1200px;
            margin-inline: auto;
            padding-inline: 24px;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        @media screen and (max-width: 960px) {
            article {
                container: card/inline-size;
            }

            .article-body p {
                display: none;
            }
        }

        @container card (min-width: 380px) {
            .article-wrapper {
                display: grid;
                grid-template-columns: 100px 1fr;
                gap: 16px;
            }

            .article-body {
                padding-left: 0;
            }

            figure {
                width: 100%;
                height: 100%;
                overflow: hidden;
            }

            figure img {
                height: 100%;
                aspect-ratio: 1;
                object-fit: cover;
            }
        }

        .sr-only:not(:focus):not(:active) {
            clip: rect(0 0 0 0);
            clip-path: inset(50%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }


        .hover-heading {
            text-align: center;
            margin-top: 20px;
            color: blue;
            transition: color 0.3s;
            border: 3px solid transparent;
            padding: 10px;
            border-radius: 5px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .hover-heading:hover {
            color: red;
            border-color: black;
        }


        @media (max-width: 768px) {
            .modal-dialog {
                max-width: 70%;
            }
        }

        .modal-dialog {
            max-width: 800px;
            width: 100%;
        }

        .modal-content {
            height: 500px;
            overflow-y: auto;
        }

    </style>
</head>

<body>


    <div style="text-align: right;">
        @if (Route::has('login'))
        @auth
        <a href="{{ url('/dashboard') }}">
            Dashboard
        </a>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary">
            Log in
        </a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="btn btn-success">
            Register
        </a>
        @endif
        @endauth
        @endif
    </div>



    @if(!empty($items))
    @foreach ($items as $key => $item)
    <hr>
    <h1 class="hover-heading">{{ $key ??""}}</h1>

  
    <section class="articles">
        @if(count($item) > 0)
        @foreach ($item as $value)
        <article>
            <div class="article-wrapper">
                <figure>
                    <img src="https://picsum.photos/id/1011/800/450" alt="" />
                </figure>
                <div class="article-body">
                    <h2>{{ optional($value)->title ?? 'No Title' }}</h2>
                    <p>
                        {{ substr_replace(optional($value)->detail ?? 'No details available', '...', 100) }}
                    </p>

                    <a href="#" class="read-more" id="readMoreBtn" data-toggle="modal" data-target="#myModal" data-url="{{ optional($value)->url ?? '#' }}" data-detail="{{ optional($value)->detail ?? '' }}" data-title="{{ optional($value)->title ?? 'No Title' }}">
                        Read more <span class="sr-only">about this is some title</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </article>
        @endforeach
        @else
        <p>No items available.</p>
        @endif
    </section>
    @endforeach
    @else
    <p>No categories available.</p>
    @endif



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <a href="" class="modal-url">
                    <div class="modal-body">

                    </div>
                </a>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> --}}
            </div>
        </div>
    </div>


</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myModal').on('show.bs.modal', function(event) {

            const button = $(event.relatedTarget);
            const title = button.data('title');
            const detail = button.data('detail');
            const url = button.data('url');


            const modal = $(this);
            modal.find('.modal-title').text(title);
            modal.find('.modal-body').text(detail);
            modal.find('.modal-url').attr('href', url);

        });
    });

</script>
</html>
