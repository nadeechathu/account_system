@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show font-13  py-1 px-2" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <p><strong>Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>

    </div>
@endif

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <div class="alert-body">
        {{session('success')}}
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

@endif

@if(session('error'))
 
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-body">
            {{session('error')}}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

@endif

@if(session('warning'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-body">
            {{session('warning')}}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>



@endif
{{-- <div class="alert alert-primary alert-dismissible fade show" role="alert">
    <div class="alert-body">
        Chupa chups topping bonbon. Jelly-o toffee I love. Sweet I love wafer I love wafer.
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
 --}}
