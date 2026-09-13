<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function list()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();

        return view('admin.faqs', compact('faqs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        Faq::create($data);

        return redirect()->back()->with('success', 'سوال جدید با موفقیت افزوده شد.');
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faq->update($data);

        return redirect()->route('admin.faq.list')->with('success', 'سوال با موفقیت بروزرسانی شد.');
    }

    public function delete(Faq $faq)
    {
        $faq->delete();

        return redirect()->back()->with('success', 'سوال با موفقیت حذف شد.');
    }
}
