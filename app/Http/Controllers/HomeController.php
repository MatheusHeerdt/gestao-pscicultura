<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Illuminate\Contracts\Support\Renderable as RenderableAlias;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{

    /** @var HomeService $homeService */
    private HomeService $homeService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->homeService = app(HomeService::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $tanksTotal = $this->homeService->getUserTanksTotal();
        $piscesTotal = $this->homeService->getUserPiscesTotal();
        $piscesGrowth = $this->homeService->getUserPiscesGrowth();
        $piscesGrowthAverage = $this->homeService->getUserPiscesGrowthAverage();
        $piscesAgeAverage = $this->homeService->getUserPiscesAgeAverage();
        return view('home')->with([
            'user' => $user,
            'tanksTotal' => $tanksTotal,
            'piscesTotal' => $piscesTotal,
            'piscesGrowth' => $piscesGrowth,
            'piscesGrowthAverage' => $piscesGrowthAverage,
            'piscesAgeAverage' => $piscesAgeAverage
        ]);
    }
}
