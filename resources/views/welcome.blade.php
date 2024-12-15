<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>

<body class="bg-gray-100 flex flex-col justify-center items-center h-screen">

    <section class="container max-w-md bg-white p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-3xl mb-4">Selamat Datang</h1>
        <p class="mb-6">Silakan pilih salah satu opsi di bawah ini:</p>
        <a href="{{ url('login') }}"
            class="w-full bg-blue-500 text-white py-3 rounded-lg mb-4 hover:bg-blue-600 transition">Masuk</a>
    </section>

</body>

</html>
