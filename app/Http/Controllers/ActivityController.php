<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\User;
use Spatie\Activitylog\Models\Activity;


class ActivityController extends Controller
{
    public function index()
    {
        $activitys = Activity::latest()->paginate(10);
        return view('activitylog.index', compact('activitys'));
    }
    /**
     * Display the specified activity.
     *
     * @param \Spatie\Activitylog\Models\Activity $activity
     * @return \Illuminate\View\View
     */
    public function show(Activity $activity)
    {
        return view('activitys.show', compact('activity'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    /**
     * @OA\Post(
     *     path="/activities",
     *     summary="Store a newly created resource in storage",
     *     tags={"Activity"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="log_name",
     *                 type="string",
     *                 maxLength=255,
     *                 example="Mon log",
     *             ),
     *             @OA\Property(
     *                 property="description",
     *                 type="string",
     *                 maxLength=500,
     *                 example="Ceci est une description",
     *             ),
     *             @OA\Property(
     *                 property="custom_property",
     *                 type="string",
     *                 example="Valeur de ma propriété custom",
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *     ),
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'log_name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);

        

        return redirect()->route('activity.index')->with('success', 'Activité enregistrée avec succès.');
    }
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activity.index')->with('success', 'Activité supprimée avec succès.');
    }
}
