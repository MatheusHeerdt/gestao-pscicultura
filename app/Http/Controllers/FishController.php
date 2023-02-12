<?php

namespace App\Http\Controllers;

use App\Repositories\FishRepository;
use App\Repositories\TankRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class FishController extends Controller
{

    /** @var TankRepository $tankRepository @ */
    private $tankRepository;

    /** @var  FishRepository $fishRepository */
    private $fishRepository;

    public function __construct()
    {
        $this->tankRepository = app(TankRepository::class);
        $this->fishRepository = app(FishRepository::class);
        $this->middleware('auth');
    }

    public function index()
    {
        return view('fish.index')->with([
            'pisces' => $this->fishRepository
                ->where('user_id', Auth::user()->id)
                ->paginate(15)
            ,
        ]);
    }

    public function create()
    {
        return view('fish.create');
    }

    public function store(Request $request)
    {

    }
}
