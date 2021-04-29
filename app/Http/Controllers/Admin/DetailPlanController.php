<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{  
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
        {
            return redirect()->back();
        }

        $details = $plan->details()->paginate();
        // $details = $plan->details();

        return view('admin.pages.plans.details.index',[
                                                        'plan' => $plan, 
                                                        'details' => $details
                                                      ]);
    }
}
