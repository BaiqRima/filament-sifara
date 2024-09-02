<x-filament::page>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    @php
        $sda2 = \App\Models\Fasilitas::paginate(10)->onEachSide(1);
    @endphp
    <br>

    <form wire:submit.prevent="submit">
        {{ $this->form }}
        <div class="m-5" style="margin-top:30px">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Pencarian Data
            </button>
        </div>
    </form>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="pb-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="pencarian"
                    class="ml-2 block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for items">
            </div>
        </div>
        <div id='tabel-jadwal'>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nama Sumber Daya
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Jenis
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Waktu
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sda2 as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nama_fasilitas }}
                            </th>
                            <td class="py-4 px-6">
                                {{ $item->jenis }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $tgl_mulai }} s/d {{ $tgl_selesai }}<br>
                                @if ($item->jenis == 'ruangan')
                                    {{ $jam_mulai }} s/d {{ $jam_selesai }}
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @if ($item->isAvailable($tgl_mulai, $tgl_selesai, $jam_mulai, $jam_selesai))
                                    Available
                                @else
                                    No Available
                                @endif
                                <a href="{{ route('filament.admin.resources.fasilitas.detail', $item->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Book</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $sda2->links() }}
        </div>
    </div>



</x-filament::page>
