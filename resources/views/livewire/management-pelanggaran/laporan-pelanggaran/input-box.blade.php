<div class="relative max-w-md" x-data="{
    open: false,
    query: '',
    results: [],
    allData: @js($students),
    search() {
        if (this.query.length > 0) {
            this.results = this.allData.filter(
                s => s.name.toLowerCase().includes(this.query.toLowerCase())
            );
            this.open = true;
        } else {
            this.results = [];
            this.open = false;
        }
    },
    select(item) {
        this.query = item.name;
        this.open = false;
        $dispatch('search-siswa', {
            id: item.id,
            class_id: item.class_id
        })
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
                    x-text="item.name + ' - ' + item.class_name"></div>
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
