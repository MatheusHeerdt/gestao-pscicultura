<?php

namespace App\Http\Controllers;

use App\Repositories\TankRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class TankController extends Controller
{

    /** @var TankRepository $tankRepository @ */
    private $tankRepository;

    public function __construct()
    {
        $this->tankRepository = app(TankRepository::class);
        $this->middleware('auth');
    }

    public function index()
    {
        return view('tanks.index')->with([
            'tanks' => $this->tankRepository
                ->where('user_id', Auth::user()->id)
                ->paginate(15)
            ,
        ]);
    }

    public function create()
    {
        return view('tanks.create');
    }

    public function store(Request $request)
    {

    }
}
