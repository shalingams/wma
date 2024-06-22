<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $events =
        Event::latest()->get();
        return view('events.index', [
            'user' => $request->user(),
            'events' => $events
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        if($request->user()->role !== 'Admin'){
            return abort(404);
        }

        $events = Event::all();
        return view('events.list', [
            'user' => $request->user(),
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->role !== 'Admin') {
            return abort(404);
        }
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->role !== 'Admin') {
            return abort(404);
        }
        $user = $request->user();
        $data = $request->all();
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required',
            'image_1' => 'required'
        ]);

        $file1  = $request->file('image_1');
        $file1Path = $file1->store('uploads', 'public');
        $data['image_1'] = $file1Path;

        $data['user_id'] = $user->id;

        $item = Event::create($data);

        return redirect('/admin/events');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', [
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        if ($request->user()->role !== 'Admin') {
            return abort(404);
        }
        $event = Event::findOrFail($id);
        return view('events.edit', [
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->user()->role !== 'Admin') {
            return abort(404);
        }
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required'
        ]);

        $event = Event::findOrFail($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->event_date = $request->event_date;

        $file  = $request->file('image_1');
        if ($file) {
            $filePath = $file->store('uploads', 'public');
            $event->image_1 = $filePath;
        }

        $event->save();
        return redirect('/admin/events');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->user()->role !== 'Admin') {
            return abort(404);
        }
        $event = Event::find($id);
        $event->delete();
        return redirect('/admin/events');
    }
}
