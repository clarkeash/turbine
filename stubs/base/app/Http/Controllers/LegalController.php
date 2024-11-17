<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class LegalController extends Controller
{
    public function terms()
    {
        return view('legal', [
            'content' => Str::markdown(file_get_contents(resource_path('markdown/terms.md')))
        ]);
    }

    public function privacy()
    {
        return view('legal', [
            'content' => Str::markdown(file_get_contents(resource_path('markdown/privacy.md')))
        ]);
    }
}
