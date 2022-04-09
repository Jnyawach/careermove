<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Careermove:Job Listsings and Career Insights</title>
    <link rel = "icon" href =
        "images/careermove-icon.png"
          type = "image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/awesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    @yield('styles')
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid mt-2">
            <a class="navbar-brand me-5" href="index.html">
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

