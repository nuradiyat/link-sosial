<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\RedirectResponse;

class LinkRedirectController extends Controller
{
    /**
     * Redirect ke URL tujuan dan menambah statistik klik.
     */
    public function redirect(Link $link): RedirectResponse
    {
        // Menambah jumlah klik
        $link->increment('click_count');

        // Redirect ke URL tujuan
        return redirect()->away($link->url);
    }
}
