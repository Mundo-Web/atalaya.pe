<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\BasicController;
use Illuminate\Database\Eloquent\Builder;
use App\Models\PlanPayment;
use App\Models\ServicesByBusiness;
use Illuminate\Http\Request;

class PlanPaymentController extends BasicController
{
    public $model = PlanPayment::class;

    public function setPaginationSummary(Request $request, Builder $query)
    {
        $sbb = ServicesByBusiness::with(['service', 'business'])->find($request->match_id);

        return [
            'match_id' => $sbb->id,
            'business' => $sbb->business,
            'service' => $sbb->service,
            'exempt' => $sbb->exempt
        ];
    }
}
