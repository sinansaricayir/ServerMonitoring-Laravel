<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Server Monitoring Application</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


    <header class="header">
        <h1>Server Monitoring Application</h1>
    </header>


    <div class="container">
        <div class="row">


            @foreach ($cpu->data as $key => $data)
                <div class="col-md-4">
                    <h2>CPU - {{ $key + 1 }}</h2>

                    <div class="size {{ $key == 1 ? 'card btn btn-warning' : 'card btn btn-danger' }}">
                        <div class="card-body">
                            <ol>
                                <li>Model : {{ $text->fromMorse($data->model) }}</li>
                                <li>Speed : {{ $text->fromMorse($data->speed) }}</li>
                                <li>Times :</li>
                                <ul>
                                    <li>User :{{ $text->fromMorse($data->times->user) }}</li>
                                    <li>Nice :{{ $text->fromMorse($data->times->nice) }}</li>
                                    <li>Sys :{{ $text->fromMorse($data->times->sys) }}</li>
                                    <li>Idle :{{ $text->fromMorse($data->times->idle) }}</li>
                                    <li>Irq :{{ $text->fromMorse($data->times->irq) }}</li>
                                </ul>
                            </ol>
                        </div>
                    </div>
                </div>
            @endforeach




            <div class="col-md-4">
                <h2>ARCHITECTURE</h2>
                <div class="size card btn btn-success">
                    <div class="card-body">
                        <p>OPERATING SYSTEM CPU ARCHITECTURE</p>
                        <p>Arch : {{ $text->fromMorse($arch->data) }}</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <h2>FREE MEMORY</h2>
                <div class="size card btn btn-primary">
                    <div class="card-body">
                        <p>FREE SYSTEM MEMORY</p>
                        <p>Memory :
                            {{ App\Http\Controllers\HelperController::formatBytes($text->fromMorse($freeMem->data)) }}
                        </p>
                    </div>
                </div>
            </div>




            <div class="col-md-4">
                <h2>HOSTNAME</h2>
                <div class="size card btn btn-info">
                    <div class="card-body">
                        <p>HOST NAME OF THE OPERATING SYSTEM</p>
                        <p>Name : {{ $text->fromMorse($hostname->data) }}</p>
                    </div>
                </div>
            </div>



            <div class="col-md-4">
                <h2>PLATFORM</h2>
                <div class="size card btn btn-secondary">
                    <div class="card-body">
                        <p>THE OPERATING SYSTEM PLATFORM</p>
                        <p>Platform : {{ $text->fromMorse($platform->data) }}</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <h2>TOTAL MEMORY</h2>
                <div class="size card btn btn-warning">
                    <div class="card-body">
                        <p>TOTAL AMOUNT OF SYSTEM MEMORY</p>
                        <p>Memory :
                            {{ App\Http\Controllers\HelperController::formatBytes($text->fromMorse($totalMem->data)) }}
                        </p>
                    </div>
                </div>
            </div>



            <div class="col-md-4">
                <h2>TYPE</h2>
                <div class="size card btn btn-success">
                    <div class="card-body">
                        <p>OPERATING SYSTEM NAME</p>
                        <p>Type : {{ $text->fromMorse($type->data) }}</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <h2>UPTIME</h2>
                <div class="size card btn btn-danger">
                    <div class="card-body">
                        <p>SYSTEM UPTIME</p>
                        <p>{{ gmdate('H:i:s', $text->fromMorse($upTime->data)) }}</p>
                    </div>
                </div>
            </div>




        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>


<style>
    .size {
        width: 20rem;
        height: 20rem;
        color: black;
        border-radius: 25%;
        margin-bottom: 5rem;
    }

    .header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
</style>

</html>
