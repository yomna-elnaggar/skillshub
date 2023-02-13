@if(session('mesg'))
<div class="alert alert-success">
    {{session('mesg')}}
</div>

@endif