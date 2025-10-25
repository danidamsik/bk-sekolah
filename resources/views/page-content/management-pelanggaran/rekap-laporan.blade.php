@extends('app')

@section('content')
    <div class="p-6 space-y-8">

        <!-- ========================================================= -->
        <!-- Component 1 : Button Aksi Ekspor & Cetak -->
        <!-- ========================================================= -->
        @livewire('management-pelanggaran.rekap-laporan.button-rekap-laporan')
        <!-- End Component 1 -->

        <!-- ========================================================= -->
        <!-- Component 2 : Rekap Pelanggaran Per Siswa -->
        <!-- ========================================================= -->
        @livewire('management-pelanggaran.rekap-laporan.table-siswa-rekap-laporan')
        <!-- End Component 2 -->

        <!-- ========================================================= -->
        <!-- Component 3 : Rekap Pelanggaran Per Kelas -->
        <!-- ========================================================= -->
        @livewire('management-pelanggaran.rekap-laporan.table-kelas-rekap-laporan')
        <!-- End Component 3 -->

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const options = {
                valueNames: ["no", "kelas", "siswa", "pelanggaran", "poin"],
                page: 10,
                pagination: true
            };

            const rekapList = new List("rekapKelas", options);

            const stylePagination = () => {
                document.querySelectorAll(".pagination li").forEach(li => {
                    li.className = "";
                    li.classList.add(
                        "px-3", "py-1", "rounded-lg", "border",
                        "text-sm", "font-medium", "transition-all", "duration-200"
                    );

                    if (li.classList.contains("active")) {
                        li.classList.add("bg-indigo-500", "text-white", "border-indigo-500",
                            "shadow-md");
                    } else {
                        li.classList.add("bg-white", "text-gray-700", "hover:bg-indigo-50",
                            "border-gray-200");
                    }
                });
            };

            stylePagination();
            new MutationObserver(stylePagination)
                .observe(document.querySelector(".pagination"), {
                    childList: true,
                    subtree: true
                });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const itemsPerPage = 3;

            function setupPagination(tableId, paginationId) {
                const tableBody = document.getElementById(tableId);
                const paginationContainer = document.getElementById(paginationId);
                const rows = tableBody.querySelectorAll("tr");
                const totalPages = Math.ceil(rows.length / itemsPerPage);
                let currentPage = 1;

                function showPage(page) {
                    const start = (page - 1) * itemsPerPage;
                    const end = start + itemsPerPage;
                    rows.forEach((row, index) => {
                        row.style.display = index >= start && index < end ? "" : "none";
                    });

                    // Update active button
                    paginationContainer.querySelectorAll("button").forEach((btn) => {
                        btn.classList.remove("bg-blue-600", "text-white");
                        btn.classList.add("bg-gray-200", "text-gray-700");
                    });
                    const activeBtn = paginationContainer.querySelector(`[data-page='${page}']`);
                    if (activeBtn) {
                        activeBtn.classList.add("bg-blue-600", "text-white");
                        activeBtn.classList.remove("bg-gray-200", "text-gray-700");
                    }
                }

                function renderPagination() {
                    paginationContainer.innerHTML = "";

                    for (let i = 1; i <= totalPages; i++) {
                        const btn = document.createElement("button");
                        btn.textContent = i;
                        btn.className =
                            "px-4 py-2 rounded-lg border border-gray-300 bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white transition";
                        btn.dataset.page = i;
                        btn.addEventListener("click", () => {
                            currentPage = i;
                            showPage(currentPage);
                        });
                        paginationContainer.appendChild(btn);
                    }

                    showPage(currentPage);
                }

                renderPagination();
            }

            // Jalankan pagination untuk dua tabel
            setupPagination("siswaTable", "paginationSiswa");
            setupPagination("kelasTable", "paginationKelas");
        });
    </script>
@endsection
