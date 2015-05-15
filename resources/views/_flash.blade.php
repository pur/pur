@if(Session::has('flash_notification.message'))

<div class="flash">{{ session('flash_notification.message') }}</div>

@endif