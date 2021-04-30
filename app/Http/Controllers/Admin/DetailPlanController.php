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

    public function create($urlPlan){
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create',['plan' => $plan]);
    }
    public function store(Request $request,$urlPlan){
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
        {
            return redirect()->back();
        }
      
        $plan->details()->create($request->all());
        return redirect()->route('details.plan.index',$plan->url);
    }  
    public function edit($urlPlan,$idDetail){
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detailPlan = $this->repository->find($idDetail);

        if(!$plan || !$detailPlan)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.edit',['plan' => $plan, 'detail' => $detailPlan]);
    }

    public function update(Request $request,$urlPlan,$idDetail){
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detailPlan = $this->repository->find($idDetail);

        if(!$plan || !$detailPlan)
        {
            return redirect()->back();
        }

        $detailPlan->update($request->all());
        
        return redirect()->route('details.plan.index',$plan->url);
    }
}
