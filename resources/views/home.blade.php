<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Waveform generator example</title>
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main role="main" class="container">
    <h1 class="mt-5">Waveform Generator Example</h1>
    <p>Example for how can use <a href="https://github.com/omerkamcili/waveform-genarator" target="_blank">https://github.com/omerkamcili/waveform-genarator</a>
    </p><br>
    <form class="container" method="post">
        <div class="row">
            <div class="col-2">
                <input class="form-control" placeholder="Channel Name" name="channel_name_1" value="{{ data_get($data,'channel_name_1') }}" required>
            </div>
            <div class="col-10">
                <textarea class="form-control" name="raw_input_1" placeholder="Raw input" required>{{ data_get($data,'raw_input_1') }}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-2">
                <input class="form-control" placeholder="Channel Name" name="channel_name_2" value="{{ data_get($data,'channel_name_2') }}" required>
            </div>
            <div class="col-10">
                <textarea class="form-control" name="raw_input_2" placeholder="Raw input" required>{{ data_get($data,'raw_input_2') }}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <input type="number" step="0.01" class="form-control" placeholder="Total session time" name="total_session_time"
                       value="{{ data_get($data,'total_session_time') }}" required>
            </div>
        </div>
        <hr>
        <div class="row">
            <button type="submit" class="form-control">Submit</button>
        </div>
        @if(isset($converter))
            <div class="row">
                <div class="col">{{ json_encode($converter->getTalkCollections()) }}</div>
            </div>
        @endif
    </form>
</main>

</body>
</html>
