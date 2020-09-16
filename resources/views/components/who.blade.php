@if(Auth::guard('web')->check())
    <p class="text-success">
        You Are Logged In As USER
    </p>
@else
    <p class="text-danger">
        You Are Logged Out As USER
    </p>
@endif

@if(Auth::guard('admin')->check())
    <p class="text-success">
        You Are Logged In As ADMIN
    </p>
@else
    <p class="text-danger">
        You Are Logged Out As ADMIN
    </p>
@endif

@if(Auth::guard('pekerja')->check())
    <p class="text-success">
        You Are Logged In As PEKERJA
    </p>
@else
    <p class="text-danger">
        You Are Logged Out As PEKERJA
    </p>
@endif

