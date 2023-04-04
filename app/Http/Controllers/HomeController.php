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
        $user = auth('web')->user();
        $tanksTotal = $this->homeService->getUserTanksTotal($user);
        $piscesTotal = $this->homeService->getUserPiscesTotal($user->id);
        $growth = $this->homeService->getUserPiscesGrowth($user->id);
        $piscesGrowth = $growth['pisces_growth'];
        $creations = $growth['created_date'];
        $creationMonths = $growth['created_month'];
        $piscesAgeAverage = $this->homeService->getUserPiscesAgeAverage($user->id);
        $piscesGrowthAverage = $this->homeService->getUserPiscesGrowthAverage($user->id);

        return view('home')->with([
            'user' => $user,
            'tanksTotal' => $tanksTotal,
            'piscesTotal' => $piscesTotal,
            'piscesGrowth' => $piscesGrowth,
            'creations' => $creations,
            'creationMonths' => $creationMonths,
            'piscesAgeAverage' => $piscesAgeAverage,
            'piscesGrowthAverage' => $piscesGrowthAverage,
        ]);
    }
}
