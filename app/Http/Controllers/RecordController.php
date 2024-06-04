<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\member;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        public function index(Request $request)
    {
        // Check if a search query is provided
        if ($request->has('query')) {
            $query = $request->input('query');

            // Search for borrowing record by book ID or borrower's IC number
            $records = Record::where('book_Id', $query)
                ->orWhereHas('member', function ($q) use ($query) {
                    $q->where('Ic_No', $query);
                })
                ->get();

            // Update returning date if a matching record is found
            if ($records->count() > 0 && $request->has('returning_date')) {
                $returningDate = $request->input('returning_date');
                foreach ($records as $record) {
                    $record->update(['returning_date' => $returningDate]);
                }
                return redirect()->back()->with('success', 'Returning date updated successfully.');
            }
        } else {
            $records = Record::all();
        }

        // List available books
        $availableBooks = Book::where('BookStatus', 'Available')->get();

        // List members with borrowing history
        $membersWithRecords = Member::with('records')->get();

        return view('record.index', compact('records', 'availableBooks', 'membersWithRecords'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $members = Member::all();
        return view('record.create', compact('books', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'book_Id' => 'required|exists:books,id',
            'memberId' => 'required|exists:members,id',
            'borrowing_date' => 'required|date',
            'returning_date' => 'nullable|date',

        ]);

// Get the currently logged-in volunteer's ID
        Record::create([
            'book_Id' => $request->book_Id,
            'memberId' => $request->memberId,
            'volunteerId' => Auth::user()->volunteer->id, // Assuming the currently logged-in user is the volunteer
            'borrowing_date' => $request->borrowing_date,
        ]);

        $book = Book::find($request->book_Id);
        $book->BookStatus = 'Borrowed';
        $book->save();

        return redirect()->route('record.index')->with('success', 'Record added successfully.');

    }
    /**
     * Display the specified resource.
     */

        public function show(Record $record)
    {
        return view('record.show', compact('record'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        // Fetch all members from the database
        $members = Member::all();

        // Fetch all books from the database
        $books = Book::all();

        // Pass the $record, $books, and $members variables to the view
        return view('record.edit', compact('record', 'books', 'members'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $request->validate([
            'borrowing_date' => 'required|date',
            'returning_date' => 'nullable|date|after_or_equal:borrowing_date',
            'memberId' => 'required', // Validation for memberId
            'book_Id' => 'required', // Validation for book_Id
        ]);

        $record->update([
            'borrowing_date' => $request->borrowing_date,
            'returning_date' => $request->returning_date,
            'memberId' => $request->memberId, // Update memberId
            'book_Id' => $request->book_Id, // Update book_Id
        ]);

        return redirect()->route('record.show', $record->id)->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        $record->delete();

        return redirect()->route('record.index')->with('success', 'Record deleted successfully.');
    }

}
