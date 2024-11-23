<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">
<div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
    <h1 class="text-2xl font-bold text-center text-gray-700">Welcome Back!</h1>
    <p class="text-sm text-gray-500 text-center mb-6">Please login to your account</p>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" required
                   class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                   placeholder="Enter your email" />
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" id="password" name="password" required
                   class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                   placeholder="Enter your password" />
        </div>
        <div class="flex justify-between items-center mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="form-checkbox text-blue-600" />
                <span class="ml-2 text-gray-600">Remember me</span>
            </label>
            <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
        </div>
        <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Login
        </button>
    </form>
</div>
</body>
</html>
