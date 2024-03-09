<h2>User Information Form</h2>

<form action="{{ route('form.submitted') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br>
    <button type="submit">Submit</button>
</form>