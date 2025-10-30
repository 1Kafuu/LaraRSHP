<?php

namespace App\Http\Controllers;

use App\Models\JenisHewan;
use Illuminate\Http\Request;

class JenisHewanController extends Controller
{
    public function getJenisHewan() {
        $result = JenisHewan::all();
        return view('admin.jenis-hewan.datajenishewan', compact('result'));
    }
}
