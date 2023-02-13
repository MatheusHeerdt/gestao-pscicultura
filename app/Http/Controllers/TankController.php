<?php

namespace App\Http\Controllers;

use App\Repositories\FishRepository;
use App\Repositories\TankRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TankController extends Controller
{

    /** @var TankRepository $tankRepository @
     */
    private $tankRepository;

    /** @var FishRepository $fishRepository @ */
    private $fishRepository;
    public function __construct()
    {
        $this->tankRepository = app(TankRepository::class);
        $this->fishRepository = app(FishRepository::class);
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
        $pisces = $this->fishRepository->pluck('name','id');
        return view('tanks.create')->with([
            'pisces' => $pisces
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        $this->tankRepository->create($input);

        return redirect()->route('tanks.index');
    }
}
