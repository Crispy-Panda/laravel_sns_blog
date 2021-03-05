@if ($errors->any())
<div class="card-text text-left alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif