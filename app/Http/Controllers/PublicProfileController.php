<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Contracts\View\View;

class PublicProfileController extends Controller
{
    /**
     * Menampilkan halaman Link Bio.
     */
    public function index(): View
    {
        // Mengambil data profile beserta seluruh link
        $profile = Profile::with('links')->first();

        // Mengirim data ke halaman public.profile
        return view('public.profile', compact('profile'));
    }
}
