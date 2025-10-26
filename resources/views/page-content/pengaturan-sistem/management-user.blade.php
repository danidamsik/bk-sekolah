@extends('app')

@section('content')
    <div class="p-6 space-y-8 animate-fade-in bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        {{-- ========================= Start Component 1 : Table User ========================= --}}
        @livewire('pengaturan-sistem.management-user.table-management-user')
        {{-- ========================= End Component 1 : Table User ========================= --}}

        {{-- ========================= Start Component 2 : Form Tambah/Edit User ========================= --}}
        @livewire('pengaturan-sistem.management-user.form-management-user')
        {{-- ========================= End Component 2 : Form Tambah/Edit User ========================= --}}

    </div>

    {{-- Animation style --}}
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const itemsPerPage = 3; // tampilkan 3 baris per halaman

            function setupPagination(tableId, paginationId) {
                const tableBody = document.querySelector(`#${tableId} tbody`);
                const rows = tableBody.querySelectorAll("tr");
                const paginationContainer = document.getElementById(paginationId);
                const totalPages = Math.ceil(rows.length / itemsPerPage);
                let currentPage = 1;

                function showPage(page) {
                    const start = (page - 1) * itemsPerPage;
                    const end = start + itemsPerPage;

                    rows.forEach((row, i) => {
                        row.style.display = i >= start && i < end ? "" : "none";
                    });

                    paginationContainer.querySelectorAll("button").forEach((btn) => {
                        btn.classList.remove("bg-indigo-600", "text-white");
                        btn.classList.add("bg-gray-200", "text-gray-700");
                    });

                    const activeBtn = paginationContainer.querySelector(`[data-page='${page}']`);
                    if (activeBtn) {
                        activeBtn.classList.add("bg-indigo-600", "text-white");
                        activeBtn.classList.remove("bg-gray-200", "text-gray-700");
                    }
                }

                function renderPagination() {
                    paginationContainer.innerHTML = "";
                    for (let i = 1; i <= totalPages; i++) {
                        const btn = document.createElement("button");
                        btn.textContent = i;
                        btn.dataset.page = i;
                        btn.className =
                            "px-4 py-2 rounded-lg border border-gray-300 bg-gray-200 text-gray-700 hover:bg-indigo-500 hover:text-white transition-all duration-300";
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

            // Jalankan pagination untuk tabel User
            setupPagination("userTable", "paginationUser");
        });
    </script>
@endsection
