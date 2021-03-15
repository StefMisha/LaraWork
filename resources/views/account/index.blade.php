<h3>Привет,  {{ Auth::user()->name }}  </h3>
<br>
<p>
    <strong>
        <a href="{{ route('admin.admin') }}">Переход в админку</a>
    </strong>
</p>
<br>
<form method="post" action="{{ route('logout') }}">
    @csrf
    <button type="submit"> Выход </button>
</form>
