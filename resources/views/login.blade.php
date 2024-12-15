<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>

<body class="bg-gray-100 flex flex-col justify-center items-center h-screen">
    <section class="container max-w-md bg-white p-8 rounded-lg shadow-lg">
        <!-- Form login -->
        <form action="{{ route('login') }}" method="post" enctype="multipart/form-data" class="login">
            @csrf <!-- Menambahkan token CSRF untuk keamanan -->
            <h1 class="text-3xl mb-4">Masuk Akun</h1>

            <!-- Input username atau email -->
            <input type="text" name="username_or_email" placeholder="Username atau Email" maxlength="50" required
                class="w-full mb-2 p-3 rounded-lg border border-gray-300">
            @error('username_or_email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <!-- Input password -->
            <input type="password" name="pass" placeholder="Password" maxlength="20" required
                class="w-full mb-2 p-3 rounded-lg border border-gray-300">
            @error('pass')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <!-- Tombol submit -->
            <button type="submit"
                class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition">Login</button>

            <!-- Error umum -->
            @if ($errors->has('error'))
                <p class="text-red-500 text-sm mt-4">{{ $errors->first('error') }}</p>
            @endif
        </form>

    </section>
</body>

</html>
