<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function new()
    {
        return view('dashboard.invoices.new');
    }
}
