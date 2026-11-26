<x-layouts.app title="Login">
    <h1>Login</h1>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div>
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
            >

            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                required
            >

            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn">Login</button>
    </form>

    <p>
        Do not have an account?
        <a href="{{ route('register') }}">Register</a>
    </p>
</x-layouts.app>