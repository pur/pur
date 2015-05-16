<div class="flash">
    <p>
    @if(Session::has('flash_notification.message'))
        {{ session('flash_notification.message') }}
    @endif
    </p>
</div>

