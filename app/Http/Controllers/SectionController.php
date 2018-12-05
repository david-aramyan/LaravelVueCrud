<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\SectionStoreRequest;

class SectionController extends Controller
{
    /**
     * Get the sections from the database.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSections()
    {
        $sections = Section::with('users')->paginate(5);
        return response()->json($sections, Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sections.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SectionStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('sections.edit')->with($section);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        try {
            $section->delete();
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return response()->json(['message' => 'OK'], Response::HTTP_OK);
    }
}
