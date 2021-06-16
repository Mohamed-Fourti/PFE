<?php

namespace App\Http\Controllers\Admin\Publication;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{

    public function index()
    {
        $datas = Publication::all();
        return view('AdminPanel.Publications.publications', compact('datas'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = '';
        $categories = Category::all();
        return view('AdminPanel.Publications.newpublication', compact('categories', 'active'));
    }

    /**
     * Save categories and tags.
     *
     * @param  \App\Models\Publication  $Publication
     * @return void
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'              => 'required|string|max:255',
            'date_début'         => 'required|date',
            'date_finale'        => 'required|date',
            'excerpt'            => 'required|string|max:255',
            'seo_title'          => 'required|string|max:255',
            'meta_keywords'      => 'required|string|max:255',
            'meta_description'   => 'required|string|max:255',
            'body'               => 'required|string|max:255',
            'slug'               => 'required|string|max:255',
        ]);
        $request->merge([
            'active' => $request->has('active'),
            'image' => basename($request->image),
        ]);
        $Publication = $request->all();
        $Publication = Arr::add($Publication, 'user_id', Auth::user()->id);
        Publication::create($Publication);

        return back()->with('ok', __('The post has been successfully created'));
    }


    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active = '1';
        $categories = '';
        $datas = Publication::all()->where('id', $id)->first();
        return view('AdminPanel.Publications.newpublication', compact('datas', 'categories', 'active'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \App\Http\Requests\Back\PostRequest  $request
     * @param  \App\Repositories\PostRepository $repository
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->merge([
            'active' => $request->has('active'),
            'image' => basename($request->image),
        ]);

        DB::table('publications')->where('id', $request->id)->update($request->except(['_token', '_method']));
        $datas = Publication::all();
        return view('AdminPanel.Publications.publications', compact('datas'))->with('ok', __('The post has been successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $Publication = Publication::findOrFail($request->id);
        $Publication->delete();
        return back();
    }
}
