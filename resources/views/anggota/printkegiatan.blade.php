<!-- resources/views/printkegiatan.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kegiatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto my-10 p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-center text-indigo-600 mb-6">Cetak Daftar Kegiatan</h1>
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-indigo-600 text-white">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Nama Kegiatan</th>
                    <th class="border border-gray-300 px-4 py-2">Tim Kerja</th>
                    <th class="border border-gray-300 px-4 py-2">Mulai</th>
                    <th class="border border-gray-300 px-4 py-2">Berakhir</th>
                    <th class="border border-gray-300 px-4 py-2">Target</th>
                    <th class="border border-gray-300 px-4 py-2">Realisasi</th>
                    <th class="border border-gray-300 px-4 py-2">Satuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatan as $index => $item)
                    <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }} hover:bg-indigo-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->nama_kegiatan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->tim->nama_tim }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->tanggal_mulai }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->tanggal_berakhir }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">{{ $item->target }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">{{ $item->realisasi }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->satuan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right mt-4">
            <button onclick="window.print()"
                class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Print</button>
        </div>
    </div>
</body>

</html>
