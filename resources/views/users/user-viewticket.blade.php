<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    <div class="container">

                <div class="text-center mb-4">
                    <a href="{{ config('app.url') }}" class="navbar-brand navbar-brand-autodark">
                        <h2>EventZA</h2>
                    </a>
                </div>


        <div class="card">
            <div class="card-header">
                <h2>Simple QR Code</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(300)->generate('RemoteStack') !!}
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>Color QR Code</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(300)->backgroundColor(255,90,0)->generate('RemoteStack') !!}
            </div>
        </div>



    </div>
    @vite('resources/js/app.js')
</body>
</html>
