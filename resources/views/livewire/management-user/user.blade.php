<div>
    <div class="max-w-7xl mx-auto px-8 py-10">
        <!-- Manajemen Pengguna -->
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="material-icons text-blue-500">supervisor_account</span>
                        Manajemen Pengguna & Hak Akses
                    </h2>
                    <button id="addUserBtn"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow transition">
                        + Tambah Pengguna
                    </button>
                </div>

                <div class="overflow-x-auto rounded-xl border border-gray-100">
                    <table class="min-w-full text-sm text-left text-gray-600" id="userTable">
                        <thead class="bg-gradient-to-r from-blue-50 to-blue-100 text-gray-700 font-semibold border-b">
                            <tr>
                                <th class="py-4 px-6">Nama</th>
                                <th class="py-4 px-6">Email</th>
                                <th class="py-4 px-6">Peran</th>
                                <th class="py-4 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100" id="userTableBody">
                            <!-- Data akan diisi lewat script -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            // Data awal pengguna
            const users = [{
                    name: "Andi Pratama",
                    email: "andi.pratama@example.com",
                    role: "Operator"
                },
                {
                    name: "Budi Santoso",
                    email: "budi.santoso@example.com",
                    role: "Guru"
                },
                {
                    name: "Citra Dewi",
                    email: "citra.dewi@example.com",
                    role: "Wali Kelas"
                },
                {
                    name: "Dewi Lestari",
                    email: "dewi.lestari@example.com",
                    role: "Guru BK"
                },
            ];

            const roleOptions = ["Operator", "Guru", "Wali Kelas", "Guru BK"];
            const tableBody = document.getElementById("userTableBody");

            function renderTable() {
                tableBody.innerHTML = "";
                users.forEach((user, index) => {
                    const row = document.createElement("tr");
                    row.className = "hover:bg-gray-50 transition";

                    const options = roleOptions
                        .map(role => `<option value="${role}" ${user.role === role ? "selected" : ""}>${role}</option>`)
                        .join("");

                    row.innerHTML = `
        <td class="py-4 px-6 font-medium text-gray-800">${user.name}</td>
        <td class="py-4 px-6">${user.email}</td>
        <td class="py-4 px-6">
          <select class="border rounded-lg px-3 py-2 text-gray-700 focus:ring-2 focus:ring-blue-400 focus:outline-none" 
            onchange="updateRole(${index}, this.value)">
            ${options}
          </select>
        </td>
        <td class="py-4 px-6 text-center">
          <button onclick="deleteUser(${index})" 
            class="text-red-600 hover:text-red-800 font-medium flex items-center justify-center gap-1 mx-auto">
            <span class="material-icons text-sm">delete</span> Hapus
          </button>
        </td>
      `;
                    tableBody.appendChild(row);
                });
            }

            function updateRole(index, newRole) {
                users[index].role = newRole;
            }

            function deleteUser(index) {
                if (confirm("Yakin ingin menghapus pengguna ini?")) {
                    users.splice(index, 1);
                    renderTable();
                }
            }

            renderTable();
        </script>
    </div>
</div>
