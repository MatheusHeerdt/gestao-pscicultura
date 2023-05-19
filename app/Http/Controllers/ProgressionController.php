<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgressionRequest;
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

    /** @var ProgressionService $progressionService */
    private ProgressionService $progressionService;

    /** @var FishRepository $fishRepository */
    private FishRepository $fishRepository;

    /** @var TankRepository $tankRepository */
    private TankRepository $tankRepository;
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
        $tanks = $this->tankRepository->getUserTanks( Auth::user());
        return view('progression.create')->with([
            'tanks' => $tanks
        ]);
    }

    public function store(ProgressionRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        $input = $this->progressionService->handleProgression($input);
        $this->progressionRepository->create($input);
        return redirect()->route('progression.index');
    }

    public function edit($id, Request $request)
    {
        $progression = $this->progressionRepository->find($id);
        $tanks = $this->tankRepository
            ->where('user_id',  $request->user()->id)
            ->pluck('name','id');
        return view('progression.edit')->with( [
            'progression' => $progression,
            'tanks' => $tanks
        ]);
    }

    public function update(Request $request,$id)
    {
        $input = $request->all();
        $input = $this->progressionService->handleProgression($input);
        $this->progressionRepository->update($input, $id);

        return redirect()->route('progression.index');
    }

    public function delete($id)
    {
        $this->progressionRepository->delete($id);

        return redirect()->route('progression.index');
    }

}
