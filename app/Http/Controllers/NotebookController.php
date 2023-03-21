<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Notebook;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $notebooks = Notebook::paginate($perPage);
        return $notebooks;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $notebook = new Notebook();
        $notebook->full_name = $request->input('full_name') ?? '';
        $notebook->company = $request->input('company');
        $notebook->phone = $request->input('phone_number') ?? '';
        $notebook->email = $request->input('email');
        $notebook->birth_date = $request->input('birthdate');
        $notebook->photo = $request->input('photo');
        $notebook->save();
        return new JsonResponse($notebook, 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $notebook = Notebook::firstWhere('id', $id);
        $notebook = $notebook ? $notebook->toArray() : [];
        return new JsonResponse($notebook, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notebook = Notebook::findOrFail($id);
        $notebook->full_name = $request->input('full_name');
        $notebook->company = $request->input('company');
        $notebook->phone_number = $request->input('phone_number');
        $notebook->email = $request->input('email');
        $notebook->birthdate = $request->input('birthdate');
        $notebook->photo = $request->input('photo');
        $notebook->save();
        return new JsonResponse($notebook, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notebook = Notebook::findOrFail($id);
        $notebook->delete();
        return response(null, 204);
    }
}
