        <div @sesi-konseling.window=
                    "$wire.id = $event.detail.id;
                     $wire.student_id = $event.detail.student_id;
                     $wire.teacher_id = $event.detail.teacher_id;
                     $wire.session_date = $event.detail.session_date;
                     $wire.status = $event.detail.status;
                     $wire.notes = $event.detail.notes;
                     $wire.recommendation = $event.detail.recommendation;
                     $wire.follow_up_plan = $event.detail.follow_up_plan;"
            class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-300">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-700 flex items-center gap-2">
                    <i class="fas fa-user-edit text-blue-600"></i>
                    Tambah Catatan Konseling
                </h2>
            </div>

            <form wire:submit.prevent="createOrUpdate" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Siswa</label>
                        <select wire:model="student_id"
                            class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200">
                            <option value="">Pilih Siswa</option>
                            @foreach ($student as $item)
                                <option disabled value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">Pilih Guru BK</label>
                        <select wire:model="teacher_id"
                            class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200">
                            <option value="">Pilih Guru BK</option>
                            @foreach ($guru as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('teacher_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">Tanggal Sesi</label>
                        <input wire:model="session_date" type="date" name="tanggal"
                            class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200">
                        @error('session_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">Status</label>
                        <select name="status" wire:model="status"
                            class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200">
                            <option value="Baru">Baru</option>
                            <option value="Proses">Proses</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Konseling">Konseling</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Catatan</label>
                    <textarea wire:model="notes" name="rekomendasi" rows="3"
                        class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200"
                        placeholder="Masukkan Catatan..."></textarea>
                    @error('notes')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Rekomendasi</label>
                    <textarea wire:model="recommendation" name="rekomendasi" rows="3"
                        class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200"
                        placeholder="Masukkan rekomendasi hasil konseling..."></textarea>
                    @error('recommendation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Rencana Tindak Lanjut</label>
                    <textarea wire:model="follow_up_plan" name="tindak_lanjut" rows="3"
                        class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-400 outline-none transition-all duration-200"
                        placeholder="Masukkan rencana tindak lanjut..."></textarea>
                    @error('follow_up_plan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end md:col-span-2">
                    <button type="submit"
                        class="flex items-center justify-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-xl shadow hover:bg-blue-700 transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed min-w-[110px]"
                        wire:loading.attr="disabled" wire:target="createOrUpdate">
                        {{-- Icon dan text default --}}
                        <span wire:loading.remove wire:target="createOrUpdate">
                            Simpan
                        </span>
                        {{-- Loading state --}}
                        <span wire:loading wire:target="createOrUpdate" class="flex items-center gap-2">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
        </div>
