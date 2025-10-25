@extends('app')

@section('content')
    <div class="p-6 space-y-8 animate-fade-in">

        {{-- ======================================================
        COMPONENT 1 : FILTER + TABEL DATA LAPORAN PELANGGARAN
        Berisi filter (kelas, status, tanggal) dan tabel laporan
    ====================================================== --}}
        @livewire('management-pelanggaran.laporan-pelanggaran.table-laporan-pelanggaran')
        {{-- ======================================================
        COMPONENT 2 : FORM INPUT LAPORAN PELANGGARAN
        Berisi form tambah laporan baru + tombol submit
    ====================================================== --}}
        @livewire('management-pelanggaran.laporan-pelanggaran.form-laporan-pelanggaran')
    </div>

    {{-- Animasi sederhana --}}
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.4s ease-out;
        }
    </style>

    <script>
        const rowsPerPage = 3;
        let currentPage = 1;

        function renderTable() {
            const rows = document.querySelectorAll("#laporanTable tr");
            const totalRows = rows.length;
            const totalPages = Math.ceil(totalRows / rowsPerPage);

            rows.forEach((row, index) => {
                row.style.display = (index >= (currentPage - 1) * rowsPerPage && index < currentPage *
                    rowsPerPage) ?
                    "" :
                    "none";
            });

            const pagination = document.getElementById("pagination");
            pagination.innerHTML = "";

            // Tombol Previous
            const prev = document.createElement("button");
            prev.innerHTML = `<i class="fa-solid fa-chevron-left"></i>`;
            prev.className =
                "px-3 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-green-500 hover:text-white transition";
            prev.disabled = currentPage === 1;
            prev.onclick = () => {
                currentPage--;
                renderTable();
            };
            pagination.appendChild(prev);

            // Tombol halaman
            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement("button");
                btn.textContent = i;
                btn.className = `px-3 py-2 rounded-lg border transition ${i === currentPage
                ? "bg-green-600 text-white border-green-600"
                : "text-gray-600 border-gray-300 hover:bg-green-500 hover:text-white"
                }`;
                btn.onclick = () => {
                    currentPage = i;
                    renderTable();
                };
                pagination.appendChild(btn);
            }

            // Tombol Next
            const next = document.createElement("button");
            next.innerHTML = `<i class="fa-solid fa-chevron-right"></i>`;
            next.className =
                "px-3 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-green-500 hover:text-white transition";
            next.disabled = currentPage === totalPages;
            next.onclick = () => {
                currentPage++;
                renderTable();
            };
            pagination.appendChild(next);
        }

        function hapusBaris(btn) {
            btn.closest("tr").remove();
            renderTable();
        }

        function filterTable() {
            const searchInput = document.getElementById("searchInput").value.toLowerCase();
            const rows = document.querySelectorAll("#laporanTable tr");

            rows.forEach(row => {
                const nama = row.cells[1].textContent.toLowerCase();
                const pelanggaran = row.cells[3].textContent.toLowerCase();
                const match = nama.includes(searchInput) || pelanggaran.includes(searchInput);
                row.style.display = match ? "" : "none";
            });
        }

        // Render awal
        renderTable();
    </script>
@endsection
