<?php

namespace App\Http\Controllers;

use App\Models\Journal;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::latest()->get();

        return view(
            'journals.index',
            compact('journals')
        );
    }
}
