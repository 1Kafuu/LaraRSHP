@extends('layouts.content')

@push('page')
'{{ $pageName ?? 'datauser' }}'
@endpush

@section('path', 'Data User')

@section('title', 'Data User')

@section('content')
<div class="container-fluid py-4">
    <livewire:user-modal />

    <h1 class="mb-4 text-xl font-bold text-gray-800">Welcome to Data User</h1>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Header -->
        <div class="flex justify-between items-center p-5 border-b border-gray-100">
            <h5 class="text-lg font-semibold text-gray-800 mb-0">User List</h5>

            @include('livewire.user-modal')

            <button command="show-modal" commandfor="dialog"
                class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-full shadow-sm transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Employee
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gray-50 text-indigo-700 font-semibold text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3 text-left">SL.</th>
                        <th class="px-6 py-3 text-left">Nama</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-right pr-6">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @foreach ($result as $row)
                    <tr class="hover:bg-indigo-50/30 transition-colors">
                        <td class="px-6 py-4 text-gray-500 font-medium">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $row->nama }}
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $row->email }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-1">
                                <button wire:click="openModal ('edit', {{ $row->iduser }})"
                                    class="w-8 h-8 rounded-full border border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-colors flex items-center justify-center"
                                    title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button
                                    class="w-8 h-8 rounded-full border border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-colors flex items-center justify-center"
                                    title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection