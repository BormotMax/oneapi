<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\{JsonResponse, Request};
use App\Models\Court;
use App\Events\CourtCreatedEvent;

class CourtsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courts,name|max:50|min:2',
            'address' => 'required|max:255|min:5',
            'state' => 'required|max:30|min:2',
        ]);

        $court = Court::create($request->all());

        event(new CourtCreatedEvent($court));

        return response()->json([
            'data' => [
                'court' => $court
            ],
            'message' => 'Court successfuly created'
        ]);
    }
}
