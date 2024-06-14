<h1>TEst</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload File') }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="file">Choose File</label>
                            <input id="file" type="file" class="form-control" name="file" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('content')
    
@endsection