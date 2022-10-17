@if (session('success'))
<div class="alert alert-success mb-4" role="alert">
    <strong>Success!</strong> {{session('success')}}.
</div>
@endif

@if (session('change'))
<div class="alert alert-success mb-4" role="alert">
    <strong>Success!</strong> {{session('change')}}.
</div>
@endif

@if (session('info'))
<div class="alert alert-info mb-4" role="alert">
    <strong>Info!</strong> {{session('info')}}.
</div>
@endif

@if (session('danger'))
<div class="alert alert-danger mb-4" role="alert">
    <strong>Warning!</strong> {{session('danger')}}.
</div>
@endif

@if (session('errors'))
<div class="alert alert-danger mb-4" role="alert">
    <strong>Warning!</strong><br>
    @foreach ($errors->all() as $error)
    <strong> * </strong>{{ $error }}. <br>
    @endforeach
</div>
@endif