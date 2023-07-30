<?php

namespace App\Http\Controllers;

use App\Models\MyExpense;
use Illuminate\Http\Request;

class MyExpenseController extends Controller
{
    private $user_data = [
        'name' => ['required'],
        'transection_date' => [ 'date'],
        'price' => ['required'],
    ];
    private $title = 'Expense';
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        $data['data'] = MyExpense::where('transection_date','>=',$date)->get();
        $data['title'] = 'Dashboard';
        return view('admin.home', $data);
    }

    public function index(Request $request)
    {
        if($request->days) {
            $date = \Carbon\Carbon::today()->subDays($request->days);
            $data['data'] = MyExpense::where('transection_date','>=',$date)->get();
        } else {
            $data['data']  = MyExpense::where('user_id', auth()->id())->get();
        }
        $data['title'] = $this->title;
        return view('admin.expense.home', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['data']  = new MyExpense;
        $data['title'] = 'Create New '.$this->title;
        return view('admin.expense.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->user_data);
        $data['user_id'] = auth()->id();
        MyExpense::create($data);
        session()->flash('message-success', "New {$this->title} created successfully");
        return redirect()->route('my_expense.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MyExpense $myExpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyExpense $myExpense)
    {
        $data['title'] = $this->title.' edit';
        $data['data'] = $myExpense;
        return view('admin.expense.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MyExpense $myExpense)
    {
        $data = $request->validate($this->user_data);
        $myExpense->update($data);
        session()->flash('message-success', "{$this->title} update successfully");
        return redirect()->route('my_expense.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyExpense $myExpense)
    {
        if($myExpense->user_id == auth()->id()) {
            $myExpense->delete();
            session()->flash('message-success', "{$this->title} delete successfully");
            return redirect()->route('my_expense.index');            
        }
        abort(403, 'Unauthorized action.');
        return redirect()->route('my_expense.index'); 
    }
}
