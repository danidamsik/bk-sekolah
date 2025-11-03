<div class="relative w-full md:w-1/2 max-w-md mt-10"
    x-data="{
        open: false,
        query: '',
        results: [],
        allData: [
            { id: 1, siswa: { id: 101, name: 'Rizky Aditya' }, pelanggaran: { id: 201, name: 'Seragam tidak rapi' } },
            { id: 2, siswa: { id: 102, name: 'Salsa Nuraini' }, pelanggaran: { id: 202, name: 'Terlambat masuk kelas' } },
            { id: 3, siswa: { id: 103, name: 'Dian Saputra' }, pelanggaran: { id: 203, name: 'Tidak membawa buku pelajaran' } },
            { id: 4, siswa: { id: 104, name: 'Bima Prasetyo' }, pelanggaran: { id: 204, name: 'Berisik di kelas' } },
            { id: 5, siswa: { id: 105, name: 'Alya Ramadhani' }, pelanggaran: { id: 205, name: 'Tidak mengerjakan PR' } },
        ],
        search() {
            if (this.query.length > 0) {
                this.results = this.allData.filter(
                    item =>
                        item.siswa.name.toLowerCase().includes(this.query.toLowerCase()) ||
                        item.pelanggaran.name.toLowerCase().includes(this.query.toLowerCase())
                );
                this.open = true;
            } else {
                this.results = [];
                this.open = false;
            }
        },
        select(item) {
            this.query = `${item.siswa.name} - ${item.pelanggaran.name}`;
            this.open = false;
            console.log('Dipilih:', item); // nanti bisa diganti dispatch Livewire
        }
    }"
    @click.outside="open = false"
>

    <!-- Input -->
    <input
        type="text"
        placeholder="Cari Laporan Pelanggaran..."
        x-model="query"
        @input.debounce.300ms="search()"
        class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
    >

    <!-- Dropdown hasil pencarian -->
    <template x-if="open && results.length > 0">
        <div
            class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto animate-fade-in"
        >
            <template x-for="(item, index) in results" :key="index">
                <div
                    @click="select(item)"
                    class="px-4 py-2 cursor-pointer hover:bg-blue-50 transition text-gray-700 text-sm"
                >
                    <span class="font-semibold" x-text="item.siswa.name"></span>
                    <span class="text-gray-500"> - </span>
                    <span x-text="item.pelanggaran.name"></span>
                </div>
            </template>
        </div>
    </template>

    <!-- Jika tidak ada hasil -->
    <template x-if="open && results.length === 0 && query.length > 0">
        <div
            class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow text-gray-500 px-4 py-2 text-sm animate-fade-in"
        >
            Tidak ada hasil untuk "<span x-text="query"></span>"
        </div>
    </template>

</div>
