@extends('app')

@section('content')
    <div class="p-8 bg-gray-50 min-h-screen space-y-8 animate-fadeIn">

        <!-- START COMPONENT DATA PELANGGARAN -->
        @livewire('master-data.data-pelanggaran.table-pelanggaran')
        <!-- END COMPONENT DATA PELANGGARAN -->

        <!-- START COMPONENT FORM INPUT -->
        @livewire('master-data.data-pelanggaran.form-pelanggaran')
        <!-- END COMPONENT FORM INPUT -->

    </div>

    <!-- SCRIPT -->
    <script>
        function filterTable() {
            const input = document.getElementById("searchInput").value.toLowerCase();
            const rows = document.querySelectorAll("#pelanggaranTable tr");
            rows.forEach(row => {
                const nama = row.cells[1].textContent.toLowerCase();
                row.style.display = nama.includes(input) ? "" : "none";
            });
        }

        function hapusBaris(btn) {
            const row = btn.closest("tr");
            row.classList.add("opacity-50", "translate-x-2", "transition", "duration-300");
            setTimeout(() => row.remove(), 300);
        }

        function tambahDataPelanggaran() {
            alert("Data pelanggaran berhasil ditambahkan (simulasi).");
        }
    </script>

    <!-- ANIMASI -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-in-out;
        }

        .animate-slideUp {
            animation: slideUp 0.5s ease-in-out;
        }
    </style>

    <script>
        const rowsPerPage = 3;
        let currentPage = 1;

        function renderTable() {
            const rows = document.querySelectorAll("#pelanggaranTable tr");
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
                "px-3 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-blue-500 hover:text-white transition";
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
                ? "bg-blue-600 text-white border-blue-600"
                : "text-gray-600 border-gray-300 hover:bg-blue-500 hover:text-white"
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
                "px-3 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-blue-500 hover:text-white transition";
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
            const rows = document.querySelectorAll("#pelanggaranTable tr");

            rows.forEach(row => {
                const nama = row.cells[1].textContent.toLowerCase();
                const deskripsi = row.cells[3].textContent.toLowerCase();
                const match = nama.includes(searchInput) || deskripsi.includes(searchInput);
                row.style.display = match ? "" : "none";
            });
        }

        // Render awal
        renderTable();
    </script>
@endsection
