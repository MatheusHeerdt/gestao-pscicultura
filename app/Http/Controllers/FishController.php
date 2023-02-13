<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Requests\FishRequest;
use App\Models\FishTypes;
use App\Repositories\FishRepository;
use App\Repositories\TankRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('fish.create')->with( [
                'types' => FishTypes::getLabels()
            ]);
    }

    public function store(FishRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        $this->fishRepository->create($input);
        return redirect()->route('fish.index');
    }

    public function edit($id)
    {
        $fish = $this->fishRepository->find($id);
        return view('fish.edit')->with( [
            'fish' => $fish,
            'types' => FishTypes::getLabels()
        ]);
    }

    public function update(FishRequest $request,$id)
    {
        $input = $request->all();
        $this->fishRepository->update($input, $id);

        return redirect()->route('fish.index');
    }

    public function delete($id)
    {
        $this->fishRepository->delete($id);

        return redirect()->route('fish.index');
    }

}
