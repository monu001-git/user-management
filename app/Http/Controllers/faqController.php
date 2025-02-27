<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faq;
use Illuminate\Support\Facades\Validator;
use App\Models\content;

class faqController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:faq-list|faq-create|faq-edit|faq-delete');
        $this->middleware('permission:faq-list', ['only' => ['index']]);
        $this->middleware('permission:faq-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $faq = faq::orderBy('id', 'asc')->get();
            return view('admin.common-page.faqs.index', compact('faq'))->with('i', ($request->input('page', 1) - 1) * 5);

        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // try {

            $faq = faq::pluck('question', 'question')->all();
            $contentId = content::get();
            return view('admin.common-page.faqs.create', compact('faq','contentId'));

        // } catch (\Exception $e) {
        //     \Log::error('An exception occurred: ' . $e->getMessage());
        //     return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        // } catch (\PDOException $e) {
        //     \Log::error('A PDOException occurred: ' . $e->getMessage());
        //     return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        // } catch (\Throwable $e) {
        //     \Log::error('An unexpected exception occurred: ' . $e->getMessage());
        //     return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try {

      //  dd($request->all());
            $validator = Validator::make($request->all(), [
                'question' => 'required',
                'answer' => 'required',
                'order' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = new faq;
            $data->question = $request->question;
            $data->answer  = $request->answer;
            $data->order  = $request->order;
            $data->status  = $request->status;
            $data->content_id  = $request->content_id;
            $data->save();


            return redirect()->route('faqs.index')->with('success', 'faq created successfully');
        // } catch (\Exception $e) {
        //     \Log::error('An exception occurred: ' . $e->getMessage());
        //     return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        // } catch (\PDOException $e) {
        //     \Log::error('A PDOException occurred: ' . $e->getMessage());
        //     return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        // } catch (\Throwable $e) {
        //     \Log::error('An unexpected exception occurred: ' . $e->getMessage());
        //     return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $faq = faq::find(dDecrypt($id));
            return view('admin.common-page.faqs.show', compact('faq'));

        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $faq = faq::find(dDecrypt($id));
            $contentId = content::get();
            return view('admin.common-page.faqs.edit', compact('faq','contentId'));

        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // try {

            $validator = Validator::make($request->all(), [
                'question' => 'required',
                'answer' => 'required',
                'order' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = faq::find(dDecrypt($id));
            $data->question = $request->question;
            $data->answer  = $request->answer;
            $data->order  = $request->order;
            $data->status  = $request->status;
            $data->content_id  = $request->content_id;
            $data->save();

            return redirect()->route('faqs.index')->with('success', 'faq updated successfully');
        // } catch (\Exception $e) {
        //     \Log::error('An exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        // } catch (\PDOException $e) {
        //     \Log::error('A PDOException occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        // } catch (\Throwable $e) {
        //     \Log::error('An unexpected exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            faq::find(dDecrypt($id))->delete();
            return redirect()->route('faqs.index')->with('success', 'faq deleted successfully');

        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }
}
