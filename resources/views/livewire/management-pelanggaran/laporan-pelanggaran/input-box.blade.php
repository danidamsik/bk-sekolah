    <!-- ⭐ Start: Search Box Component (autocomplete siswa - dummy data) -->
    <div class="relative max-w-md" x-data="{
        open: false,
        query: '',
        results: [],
        allData: [
            { id: 1, nama_siswa: 'Andi Pratama', class_name: 'X IPA 1' },
            { id: 2, nama_siswa: 'Budi Santoso', class_name: 'X IPA 2' },
            { id: 3, nama_siswa: 'Citra Lestari', class_name: 'XI IPS 1' },
            { id: 4, nama_siswa: 'Dewi Anggraini', class_name: 'XI IPA 1' },
            { id: 5, nama_siswa: 'Eko Nugroho', class_name: 'XII IPA 1' },
            { id: 6, nama_siswa: 'Farhan Hakim', class_name: 'XII IPA 1' },
            { id: 7, nama_siswa: 'Gita Sari', class_name: 'XI IPA 2' },
            { id: 8, nama_siswa: 'Hadi Wijaya', class_name: 'X IPA 1' },
            { id: 9, nama_siswa: 'Indah Permata', class_name: 'XI IPS 2' },
            { id: 10, nama_siswa: 'Joko Susilo', class_name: 'XII IPS 1' }
        ],
        search() {
            if (this.query.length > 0) {
                this.results = this.allData.filter(
                    s => s.nama_siswa.toLowerCase().includes(this.query.toLowerCase())
                );
                this.open = true;
            } else {
                this.results = [];
                this.open = false;
            }
        },
        select(item) {
            this.query = item.nama_siswa;
            this.open = false;
            console.log('Siswa dipilih:', item);
        }
    }" @click.outside="open = false">

        <!-- Input -->
        <input type="text" placeholder="Cari data siswa..." x-model="query" @input.debounce.300ms="search()"
            class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-green-400 focus:outline-none">

        <!-- Dropdown hasil pencarian -->
        <template x-if="open && results.length > 0">
            <div
                class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto">
                <template x-for="(item, index) in results" :key="index">
                    <div @click="select(item)"
                        class="px-4 py-2 cursor-pointer hover:bg-green-50 transition text-gray-700 text-sm"
                        x-text="item.nama_siswa + ' - ' + item.class_name"></div>
                </template>
            </div>
        </template>

        <!-- Jika tidak ada hasil -->
        <template x-if="open && results.length === 0 && query.length > 0">
            <div
                class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow text-gray-500 px-4 py-2 text-sm">
                Tidak ada hasil untuk "<span x-text="query"></span>"
            </div>
        </template>
    </div>
    <!-- ⭐ End: Search Box Component -->