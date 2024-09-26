<!-- resources/views/contact.blade.php -->

<form action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </div>
    <button type="submit">Submit</button>
</form>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
