@if(count($errors)>0)
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
                <button class="btn btn-default pull-right" id='x'>X</button>
        </div>
    </div>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger error">
            {{ $error }}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif