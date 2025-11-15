@extends('layouts.content')

@push('page')
'{{ $pageName ?? 'dashboard' }}'
@endpush

@section('path', 'Dashboard')

@section('title', 'Dashboard')

@push('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl shadow-lg p-8 text-white mb-8">
      <div class="flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="max-w-lg">
          <h2 class="text-3xl md:text-4xl font-bold mb-3">
            Halo, <span class="text-yellow-300">{{ session('user.name') }}!</span> 👋
          </h2>
          <p class="text-lg opacity-90 leading-relaxed">
            Selamat datang kembali di dashboard. Semoga hari ini penuh dengan produktivitas dan pencapaian baru. 
            Pantau performa, kelola data, dan wujudkan visi Anda bersama tim!
          </p>
          <div class="mt-6 flex gap-3">
            <button class="bg-white text-indigo-600 px-5 py-2.5 rounded-lg font-semibold shadow hover:bg-gray-100 transition">
              Mulai Sekarang
            </button>
            <button class="border border-white text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-white/10 transition">
              Lihat Tutorial
            </button>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="bg-white/20 backdrop-blur-sm rounded-full p-6 w-48 h-48 flex items-center justify-center">
            <i class="fas fa-chart-line text-6xl text-white"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100  dark:border-gray-800 dark:bg-white/[0.03] hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500  dark:text-gray-100 font-medium">Total Pengguna</p>
            <p class="text-2xl font-bold text-gray-800  dark:text-gray-100 mt-1">1,248</p>
            <p class="text-xs text-green-600 mt-2">↑ 12% dari bulan lalu</p>
          </div>
          <i class="fas fa-users text-3xl text-indigo-500 opacity-80"></i>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition  dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500 font-medium  dark:text-gray-100">Pendapatan</p>
            <p class="text-2xl font-bold text-gray-800  dark:text-gray-100 mt-1">Rp 48.5 Jt</p>
            <p class="text-xs text-green-600 mt-2">↑ 8% dari bulan lalu</p>
          </div>
          <i class="fas fa-wallet text-3xl text-green-500 opacity-80"></i>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500 font-medium">Proyek Aktif</p>
            <p class="text-2xl font-bold text-gray-800 mt-1">24</p>
            <p class="text-xs text-orange-600 mt-2">2 menunggu review</p>
          </div>
          <i class="fas fa-tasks text-3xl text-orange-500 opacity-80"></i>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500 font-medium">Tiket Baru</p>
            <p class="text-2xl font-bold text-gray-800 mt-1">7</p>
            <p class="text-xs text-red-600 mt-2">Perlu tindak lanjut</p>
          </div>
          <i class="fas fa-bell text-3xl text-red-500 opacity-80"></i>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Aksi Cepat</h3>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="#" class="flex flex-col items-center p-4 rounded-lg hover:bg-indigo-50 transition group">
          <i class="fas fa-user-plus text-2xl text-indigo-600 mb-2 group-hover:scale-110 transition"></i>
          <span class="text-sm font-medium text-gray-700">Tambah User</span>
        </a>
        <a href="#" class="flex flex-col items-center p-4 rounded-lg hover:bg-green-50 transition group">
          <i class="fas fa-file-alt text-2xl text-green-600 mb-2 group-hover:scale-110 transition"></i>
          <span class="text-sm font-medium text-gray-700">Buat Laporan</span>
        </a>
        <a href="#" class="flex flex-col items-center p-4 rounded-lg hover:bg-purple-50 transition group">
          <i class="fas fa-cog text-2xl text-purple-600 mb-2 group-hover:scale-110 transition"></i>
          <span class="text-sm font-medium text-gray-700">Pengaturan</span>
        </a>
        <a href="#" class="flex flex-col items-center p-4 rounded-lg hover:bg-orange-50 transition group">
          <i class="fas fa-headset text-2xl text-orange-600 mb-2 group-hover:scale-110 transition"></i>
          <span class="text-sm font-medium text-gray-700">Bantuan</span>
        </a>
      </div>
    </div>
@endsection
