<!DOCTYPE html>
<html>
<head>
    <title>Import Large Excel Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>

<div class="container">
    <div class="card mt-4">
        <div class="card-body">
            <h2> Import Excel Sheet Task</h2> <br/>
            @if ( session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ url('import') }}" method="POST" name="importform"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('file') ? 'has-error': '' }}">
                    <label for="file" class="control-label"> import File: </label>
                    <input id= "file" type="file" name="file" class="form-control">
                    <br>
                    @if ( $errors->has('file'))
                        <span class="help-block">
                            <Strong>{{ $errors->first('file') }}</Strong>
                        </span>
                    @endif
                    <button class="btn btn-success">Import File</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>