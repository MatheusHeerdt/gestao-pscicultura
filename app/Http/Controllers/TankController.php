<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Requests\TankRequest;
use App\Repositories\FishRepository;
use App\Repositories\TankRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Exceptions\ValidatorException;

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

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('tanks.index')->with([
            'tanks' => $this->tankRepository
                ->where('user_id', Auth::user()->id)
                ->paginate(15)
            ,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $pisces = $this->fishRepository->pluck('name','id');
        return view('tanks.create')->with([
            'pisces' => $pisces
        ]);
    }

    /**
     * @param TankRequest $request
     * @return RedirectResponse
     * @throws ValidatorException
     */
    public function store(TankRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        $this->tankRepository->create($input);

        return redirect()->route('tanks.index');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $pisces = $this->fishRepository->pluck('name','id');
        $tank = $this->tankRepository->find($id);
        return view('tanks.edit')->with([
            'tank' => $tank,
            'pisces' => $pisces
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidatorException
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->tankRepository->update($input, $id);
        return redirect()->route('tanks.index');
    }

    public function delete($id)
    {
        $this->tankRepository->delete($id);

        return redirect()->route('tanks.index');
    }
}
