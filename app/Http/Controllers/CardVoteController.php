<?php

namespace App\Http\Controllers;

use App\Imports\CardVotesImport;
use App\Models\CardVote;
use App\Models\Organization;
use App\Models\Period;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CardVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $query = CardVote::with([
            'user',
            'period',
            'organization',
            'organization.program',
            'organization.program.faculty',
        ]);

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $cardvotes = $query->paginate($entries);

        return view('cardvotes.index')->with([
            'cardvotes' => $cardvotes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periods = Period::all();
        $organizations = Organization::all();
        $users = User::all();
        return view('cardvotes.create')->with([
            'periods' => $periods,
            'organizations' => $organizations,
            'users' => $users,
        ]);
    }

    public function import()
    {
        $periods = Period::all();
        $organizations = Organization::all();
        $users = User::all();
        return view('cardvotes.import')->with([
            'periods' => $periods,
            'organizations' => $organizations,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'period_id' => 'required|exists:periods,id',
            'user_id' => 'required|exists:users,id',
            'organization_id' => 'required|exists:organizations,id',
        ]);

        CardVote::create([
            'period_id' => $request->period_id,
            'user_id' => $request->user_id,
            'organization_id' => $request->organization_id,
        ]);

        return redirect()->route('cardvotes.index')->with('success', 'Card vote created successfully.');
    }

    public function import_store(Request $request)
    {
        $request->validate([
            'period_id' => 'required|exists:periods,id',
            'users' => 'required|file|mimes:xlsx,csv',
            'organization_id' => 'required|exists:organizations,id',
        ]);

        Excel::import(new CardVotesImport($request->period_id, $request->organization_id), $request->file('users'));

        return redirect()->route('cardvotes.index')->with('success', 'Card vote imported successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cardvote = CardVote::with([
            'user',
            'period',
            'organization',
            'organization.program',
            'organization.program.faculty',
        ])->findOrFail($id);
        return view('cardvotes.show')->with([
            'cardvote' => $cardvote,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $periods = Period::all();
        $organizations = Organization::all();
        $users = User::all();
        $cardvote = CardVote::with([
            'user',
            'period',
            'organization',
            'organization.program',
            'organization.program.faculty',
        ])->findOrFail($id);
        return view('cardvotes.edit')->with([
            'cardvote' => $cardvote,
            'periods' => $periods,
            'organizations' => $organizations,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'period_id' => 'required|exists:periods,id',
            'user_id' => 'required|exists:users,id',
            'organization_id' => 'required|exists:organizations,id',
        ]);

        $cardvote = CardVote::findOrFail($id);

        $cardvote->update([
            'period_id' => $request->period_id,
            'user_id' => $request->user_id,
            'organization_id' => $request->organization_id,
        ]);

        return redirect()->route('cardvotes.index')->with('success', 'Card vote updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cardvote = CardVote::findOrFail($id);
        $cardvote->delete();

        return redirect()->route('cardvotes.index')->with('success', 'Card vote deleted successfully.');
    }
}
