<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-700">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md border-2 border-blue-400">
        <h2 class="text-center text-2xl font-bold text-gray-800">Selamat Datang</h2>
        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan email">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan password">
            </div>
            <div class="flex justify-between text-sm">
                <a href="#" class="text-blue-500 hover:underline">Forgot password?</a>
            </div>
            <button type="submit" class="w-full py-2 text-white bg-black rounded-md hover:bg-gray-800">Sign In</button>
            <div class="text-center text-sm">
                <a href="register" class="text-blue-500 hover:underline">Don't have an account? Register</a>
            </div>
        </form>
    </div>

    </div>
</body>
</html>