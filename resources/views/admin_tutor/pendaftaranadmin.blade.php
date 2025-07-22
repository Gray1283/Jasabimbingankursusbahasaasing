@extends('layouts.dashboardadmin')

@section('content')
<div class="flex-1 flex flex-col text-center">
    <header class="bg-white p-4 shadow">
        <div class="container mx-auto">
            <h1 class="text-xl font-semibold text-gray-800">Manajemen Pendaftaran Pelajar</h1>
        </div>
    </header>

    <div class="overflow-x-auto m-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-gray-700 text-white">
                    <tr>
                        <th class="border px-6 py-3 text-sm uppercase">No</th>
                        <th class="border px-6 py-3 text-sm uppercase">Nama</th>
                        <th class="border px-6 py-3 text-sm uppercase">No Telepon</th>
                        <th class="border px-6 py-3 text-sm uppercase">Alamat</th>
                        <th class="border px-6 py-3 text-sm uppercase">Program</th>
                        <th class="border px-6 py-3 text-sm uppercase">Durasi</th>
                        <th class="border px-6 py-3 text-sm uppercase">Harga</th>
                        <th class="border px-6 py-3 text-sm uppercase">Bukti</th>
                        <th class="border px-6 py-3 text-sm uppercase">Status</th>
                        <th class="border px-6 py-3 text-sm uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($pendaftaranList as $i => $data)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-6 py-4">{{ $i + 1 }}</td>
                        <td class="border px-6 py-4">{{ $data->pelajar->user->name ?? '-' }}</td>
                        <td class="border px-6 py-4">{{ $data->pelajar->user->phone_number ?? '-' }}</td>
                        <td class="border px-6 py-4">{{ $data->pelajar->user->address ?? '-' }}</td>

                        <td class="border px-6 py-4">{{ $data->kursus->kode_bahasa ?? '-' }}</td>
                        <td class="border px-6 py-4">{{ $data->durasi }} bulan</td>
                        <td class="border px-6 py-4">Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                       <td class="border px-6 py-4">
    @if ($data->pembayaran && $data->pembayaran->bukti)
        <a href="{{ asset('storage/' . $data->pembayaran->bukti) }}" target="_blank" class="text-blue-600 underline">

            Lihat Bukti
        </a>
    @else
        <span class="text-gray-500">Belum ada</span>
    @endif
</td>



                        <td class="border px-6 py-4">
                            <span class="px-2 py-1 rounded text-white text-sm 
                                {{ $data->status == 'pending' ? 'bg-yellow-500' : ($data->status == 'disetujui' ? 'bg-green-600' : 'bg-red-600') }}">
                                {{ ucfirst($data->status) }}
                            </span>
                        </td>
                        <td class="border px-6 py-4 space-x-1">
                            @if($data->status == 'pending')
                            <form action="{{ route('admin.pendaftaran.konfirmasi', $data->id_pendaftaran) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">
                                    Konfirmasi
                                </button>
                            </form>
                            @else
                            <span class="text-gray-500 text-sm">Sudah dikonfirmasi</span>
                            @endif
                             <form action="{{ route('admin.pendaftaran.destroy', $data->id_pendaftaran) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus pendaftaran ini?')">
        @csrf
        @method('DELETE')
        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
            Hapus
        </button>
    </form>
                        </td>
                    </tr>
                    @endforeach
                    @if ($pendaftaranList->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center py-4 text-gray-500">Belum ada pendaftaran.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
