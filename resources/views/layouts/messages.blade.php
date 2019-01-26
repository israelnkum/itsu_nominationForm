@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div style="color: #ffffff; background-color: darkred !important;" class="alert alert-danger bg-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> {{session('error')}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div style="color: #ffffff; background-color: darkgreen !important;" class="alert alert-success bg-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div style="color: #ffffff; background-color: darkred !important;" class="alert alert-danger bg-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> {{session('error')}}
    </div>
@endif