<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="py-3 px-4 text-left">No</th>
                <th class="py-3 px-4 text-left">NISN</th>
                <th class="py-3 px-4 text-left">Nama</th>
                <th class="py-3 px-4 text-left">Total Poin</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach ($students as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-4">1</td>
                    <td class="py-3 px-4">{{$item->nisn}}</td>
                    <td class="py-3 px-4">{{$item->name}}</td>
                    <td class="py-3 px-4">{{$item->total_point}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
