@if(session()->has('success') || session()->has('error') || session()->has('info'))
    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
@elseif(session()->has('error'))
    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
@elseif(session()->has('info'))
    <div class="alert alert-danger" role="alert">{{ session('info') }}</div>
@endif
