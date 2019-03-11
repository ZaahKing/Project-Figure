<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function Test($id) { return 'Test'; }
    public function Revers($id) { return 'Revers'; }
    public function MassTest(Request $request) { return 'MassTest'; }
    public function MassRevers(Request $request) { return 'MassRevers'; }
}
