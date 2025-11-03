<div class="relative w-full md:w-1/2 max-w-md" x-data="{
    open: false,
    query: '',
    results: [],
    allData: [
        { id: 1, siswa_name: 'Rizky Aditya', pelanggaran_name: 'Seragam tidak rapi', tanggal: '2025-11-03' },
        { id: 2, siswa_name: 'Salsa Nuraini', pelanggaran_name: 'Terlambat masuk kelas', tanggal: '2025-11-03' },
        { id: 3, siswa_name: 'Dian Saputra', pelanggaran_name: 'Tidak membawa buku pelajaran', tanggal: '2025-11-03' },
        { id: 4, siswa_name: 'Bima Prasetyo', pelanggaran_name: 'Berisik di kelas', tanggal: '2025-11-03' },
        { id: 5, siswa_name: 'Alya Ramadhani', pelanggaran_name: 'Tidak mengerjakan PR', tanggal: '2025-11-03' },
    ],

    search() {
        if (this.query.length > 0) {
            this.results = this.allData.filter(item =>
                item.siswa_name.toLowerCase().includes(this.query.toLowerCase()) ||
                item.pelanggaran_name.toLowerCase().includes(this.query.toLowerCase())
            );
            this.open = true;
        } else {
            this.results = [];
            this.open = false;
        }
    },

    select(item) {
        this.query = `${item.siswa_name} - ${item.pelanggaran_name}`;
        this.open = false;
        console.log('Dipilih:', item);
    }
}" @click.outside="open = false">
    <!-- Input -->
    <input type="text" placeholder="Cari Laporan Pelanggaran..." x-model="query" @input.debounce.300ms="search()"
        class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-400 focus:outline-none">

    <!-- Dropdown hasil -->
    <template x-if="open && results.length > 0">
        <div
            class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto">
            <template x-for="(item, index) in results" :key="index">
                <div @click="select(item)"
                    class="px-4 py-2 cursor-pointer hover:bg-blue-50 transition text-gray-700 text-sm">
                    <span class="font-semibold" x-text="item.siswa_name"></span>
                    <span class="text-gray-500"> - </span>
                    <span x-text="item.pelanggaran_name"></span>
                </div>
            </template>
        </div>
    </template>

    <!-- Tidak ada hasil -->
    <template x-if="open && results.length === 0 && query.length > 0">
        <div
            class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow text-gray-500 px-4 py-2 text-sm">
            Tidak ada hasil untuk "<span x-text="query"></span>"
        </div>
    </template>
</div>
