<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Kegiatan</title>
    
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.css" rel="stylesheet" />
    
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    
    <!-- Moment.js -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>

    <!-- Optional: Alpine.js for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f3f4f6;
      }
      .search-container {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
      }
      .search-container input {
        padding: 5px;
        margin-top: 10px;
        font-size: 14px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      .search-container button {
        background-color: #b3b1b1;
        color: black;
        padding: 4px 7px;
        font-size: 14px;
        margin-left: 10px;
        margin-top: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      .search-container button:hover {
      background-color: #007bff; 
      color: white; 
}
      
    </style>
</head>
<body>
  <body class="flex flex-row h-screen">
    <!-- Sidebar -->
    <aside class="bg-white border-2 text-orange-500 flex flex-col items-center py-12 px-5 w-64 h-full">
        <div class="flex flex-col items-center justify-center mb-10">
            <img src="{{ asset('images/bps.png') }}" alt="BPS Sumbawa" class="w-16 sm:w-24 mb-5 lg:mb-10">
            <h2 class="text-center text-lg sm:text-xl text-black font-bold">
                Badan Pusat Statistik <br> Kabupaten Sumbawa
            </h2>
        </div>

        <nav class="w-full">
            <ul class="text-center space-y-2">
                <li class="py-2 lg:py-4 cursor-pointer hover:bg-orange-300 transition rounded-lg"><a
                        href="{{ route('pimpinan.dashboard') }}" class="block">Dashboard</a></li>
                <li class="py-2 lg:py-4 cursor-pointer hover:bg-orange-300 transition rounded-lg">
                    <a href="{{ route('pimpinandaftarkegiatan.daftarKegiatan') }}" class="block">Daftar Kegiatan</a>
                </li>
                <li class="py-2 lg:py-4 cursor-pointer bg-orange-500 text-white rounded-lg ">
                    <a href="{{ route('pimpinan.jadwalkegiatan') }}" class="block">Jadwal Kegiatan</a></li>
                <a href="{{ route('pimpinan.evaluasikegiatan') }}">
                    <li class="py-2 lg:py-4 cursor-pointer hover:bg-orange-300 transition rounded-lg">
                        Evaluasi Kegiatan
                    </li>
                </a>
            </ul>
        </nav>
        <a href="{{ route('logout') }}" class="mt-auto py-2 px-14 bg-red-600 text-white rounded-lg">Log Out</a>
    </aside>

    <!-- Konten Utama -->
    <div class="flex flex-col flex-grow h-full">
        <header
            class="flex justify-between items-center bg-gradient-to-r from-yellow-400 to-orange-400 px-5 py-2 h-16 text-white">
            <h1 class="text-2xl font-bold">Jadwal Kegiatan</h1>
            <div class="flex items-center gap-3">
                <span>Pimpinan</span>
                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                <div class="relative">
                    <i class="fa fa-bell"></i>
                    <span class="absolute top-0 right-0 bg-red-600 text-xs text-white rounded-full px-2">3</span>
                </div>
            </div>
        </header>

              <!-- Pencarian Event -->
        <div class="search-container">
          <input type="text" id="eventSearch" placeholder="Search events...">
          <button id="searchBtn">Search</button>
        </div>

        <!-- FullCalendar container -->
        <div id="calendar"></div>
        </main>

        <footer class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white px-6 py-4">
            <div class="text-sm sm:text-lg font-medium">
                © 2024 <span class="text-green-500">Tim Pengolahan dan TI</span> Badan Pusat Statistik
            </div>
        </footer>
    </div>
  
  

  <script>
    $(document).ready(function () {
      // Initialize FullCalendar
      console.log(@json($events));

      $('#calendar').fullCalendar({
            events: @json($events), // Data events dikirim dari controller
            defaultView: 'month',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek,month,listYear'
            },

            views: {
                listYear: {
                    buttonText: 'Year' 
                }
            },

            eventLimit: true, // Enable "+more" link
            eventLimitClick: 'popover', 
            
            eventRender: function (event, element, view) {
          
                if (view.name === 'listYear') {
                    element.find('.fc-list-item-time').remove(); 
                }
            },
           
      });

      // Fungsi pencarian untuk kalender
              function handleSearch() {
                  const query = document.getElementById('eventSearch').value.trim().toLowerCase(); // Ambil input pencarian
                  const calendar = $('#calendar'); // Asumsikan kalender diinisialisasi dengan FullCalendar

                 
                  $('.fc-day, .fc-day-grid-event').removeClass('fc-highlight'); // Menambah selector .fc-day-grid-event untuk menargetkan event di year view

                  // Ambil semua event dari kalender
                  const events = calendar.fullCalendar('clientEvents');

                  // Cari event yang cocok dengan query
                  const matchedEvents = events.filter(event => 
                      event.title.toLowerCase().includes(query)
                  );

                  if (matchedEvents.length > 0) {
                     
                      const firstEvent = matchedEvents[0];
                      
                      // Arahkan kalender ke tanggal event
                      calendar.fullCalendar('gotoDate', firstEvent.start);

                      // Highlight hari event
                      const eventDate = firstEvent.start.format('YYYY-MM-DD'); // Format tanggal
                     
                  } else {
                      alert('No events found for the given search term.');
                  }
              }

              
              document.getElementById('searchBtn').addEventListener('click', handleSearch);

              
              document.getElementById('eventSearch').addEventListener('keyup', function(event) {
                  if (event.key === 'Enter') { // Jika tekan Enter
                      handleSearch();
                  }
              });

              // CSS untuk highlight
              const style = document.createElement('style');
              style.innerHTML = `
                  .fc-highlight {
                      background-color: #ADD8E6 !important; 
                      border: 2px solid #1E90FF !important; 
                     
                  }
              `;
              document.head.appendChild(style);


    });
  </script>
</body>
</html>
