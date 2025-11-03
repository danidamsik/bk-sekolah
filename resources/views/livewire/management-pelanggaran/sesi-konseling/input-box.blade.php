<div class="relative w-full md:w-1/2 max-w-md" x-data="{
    open: false,
    query: '',
    results: [],
    allData: @js($violation_reports),

    search() {
        if (this.query.length > 0) {
            this.results = this.allData.filter(item =>
                item.student_name.toLowerCase().includes(this.query.toLowerCase()) ||
                item.name.toLowerCase().includes(this.query.toLowerCase())
            );
            this.open = true;
        } else {
            this.results = [];
            this.open = false;
        }
    },

    select(item) {
        this.query = `${item.student_name} - ${item.name}`;
        this.open = false;
        $dispatch('search-siswa', {
            violation_report_id: item.id,
            student_id: item.student_id
        })
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
                    <span class="font-semibold" x-text="item.student_name"></span>
                    <span class="text-gray-500"> - </span>
                    <span x-text="item.name"></span>
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
