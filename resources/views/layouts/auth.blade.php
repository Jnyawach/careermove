<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PZXDP9D');</script>
    <!-- End Google Tag Manager -->

    <title>@yield('title') | Careermove</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "icon" href =
        "{{asset('images/careermove-icon.png')}}"
          type = "image/x-icon">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css/awesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    @yield('styles')
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZXDP9D"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header>
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid mt-2">
            <a class="navbar-brand me-5" href="/">
                <!--<img src="images/excel-logo.png" class="img-fluid" alt="careermove-logo"
                style="width: 200px">-->
                <h2>Careermove</h2>
            </a>
        </div>
    </nav>
</header>
<main>
    @yield('content')
</main>
<div class="copy">
    <p class="p-3">&copy; 2022 Careermove is a Cerve Ltd Company. All rights reserved.</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>

