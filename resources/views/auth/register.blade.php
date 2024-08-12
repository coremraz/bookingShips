<form action="{{route('register')}}" method="POST">
    @csrf
    <input type="text" name="email">
    <input type="text" name="name">
    <input type="password" name="password">
    <button type="submit">register</button>
</form>
