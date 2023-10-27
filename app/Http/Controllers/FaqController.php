<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-faqs|create-faqs|edit-faqs|delete-faqs', ['only' => ['index','show']]);
        $this->middleware('permission:create-faqs', ['only' => ['create','store']]);
        $this->middleware('permission:edit-faqs', ['only' => ['edit']]);
        $this->middleware('permission:delete-faqs', ['only' => ['destroy']]);

    }
    public function index()
    {

        $faqs = Faq::paginate(10);
        return view('faqs.index', compact('faqs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {

        Faq::create([
            'az'=>[
                'title'=>$request->az_title,
                'content'=>$request->az_content
            ],
            'en'=>[
                'title'=>$request->en_title,
                'content'=>$request->en_content
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'content'=>$request->ru_content
            ]
        ]);

        return redirect()->route('faqs.index')->with('message','Faq added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {

        return view('faqs.edit', compact('faq'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {


        $faq->update( [

            'is_active'=> $request->is_active,

            'az'=>[
                'title'=>$request->az_title,
                'content'=>$request->az_content
            ],
            'en'=>[
                'title'=>$request->en_title,
                'content'=>$request->en_content
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'content'=>$request->ru_content
            ]

        ]);

        return redirect()->back()->with('message','Faq updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {

        $faq->delete();

        return redirect()->route('faqs.index')->with('message', 'Faq deleted successfully');

    }
}
