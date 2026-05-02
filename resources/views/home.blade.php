<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
{{ csrf_field() }}
</form>

<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid float-right-from-bracket"></i>Logout</a>