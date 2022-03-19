@if($errors)
<div class="{{ $errors ? 'error' : '' }}">
    <ul>
        @foreach($errors as $error)
        <li>{{ is_array($error) ? implode(',',$error) : $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if($success)
<div class="{{ $success ? 'success' : '' }}">
    {{ $success }}
</div>
@endif
