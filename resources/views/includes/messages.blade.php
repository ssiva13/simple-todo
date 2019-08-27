@if (count($errors) > 0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
        </button>
</div>
@endforeach
@endif

@if (session('success'))
<div class="alert alert-success">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif
@if (session('warning'))
<div class="alert alert-warning">
        {{ session('warning') }}
        <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif