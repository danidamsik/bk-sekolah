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

@endsection
