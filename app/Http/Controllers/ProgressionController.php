<?php

namespace App\Http\Controllers;

use App\Repositories\FishRepository;
use App\Repositories\ProgressionRepository;
use App\Repositories\TankRepository;
use App\Services\ProgressionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressionController extends Controller
{

    /** @var ProgressionRepository $progressionCotroller @
     */
    private $progressionRepository;

    /** @var ProgressionService $progressionService @
     */
    private $progressionService;

    /** @var FishRepository $fishRepository @
     */
    private $fishRepository;

    /** @var TankRepository $tankRepository @
     */
    private $tankRepository;
    public function __construct()
    {
        $this->progressionRepository = app(ProgressionRepository::class);
        $this->fishRepository = app(FishRepository::class);
        $this->tankRepository = app(TankRepository::class);
        $this->progressionService = app(ProgressionService::class);
    }

    public function index()
    {
        return view('progression.index')->with([
            'calculations' => $this->progressionRepository
                ->where('user_id', Auth::user()->id)
                ->paginate(15),
        ]);
    }

    public function create()
    {
        $tanks = $this->tankRepository->pluck('name','id');
        return view('progression.create')->with([
            'tanks' => $tanks
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        $input = $this->progressionService->calculateProgression($input);
        $this->progressionRepository->create($input);
        return redirect()->route('progression.index');
    }

    public function edit($id)
    {
        $calculation = $this->progressionRepository->find($id);
        return view('progression.edit')->with( [
            'calculation' => $calculation
        ]);
    }

    public function update(Request $request,$id)
    {
        $input = $request->all();
        $this->progressionRepository->update($input, $id);

        return redirect()->route('progression.index');
    }

    public function delete($id)
    {
        $this->progressionRepository->delete($id);

        return redirect()->route('progression.index');
    }

}
