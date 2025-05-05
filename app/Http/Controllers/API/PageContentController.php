<?php

namespace App\Http\Controllers\API;

use App\PageContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PageContentTranslation;

class PageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        app()->setLocale($request->lang);
        
        $page_content = PageContent::find($request->id);

        if ($request->lang == config('app.fallback_locale')) {
            $page_content->update(
                ['content' => $this->parseContent($request->content)]
            );
        } else {
            PageContentTranslation::updateOrCreate(
                ['lang_id' => $request->lang, 'page_content_id' => $page_content->id],
                ['content' => $this->parseContent($request->content)]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Helpers
     */

    private function parseContent($content) {
        $parsed = $content;

        $replacements = [
            '<div><br></div>' => '<br>',
            '<div>' => '<br>',
            '</div>' => '',
            '<br><br><br>' => '<br><br>',
            '<p>' => '',
            '</p>' => '',
            '&nbsp;' => ' '
        ];

        $parsed = str_replace(array_keys($replacements), $replacements, $parsed);
        $parsed = strip_tags($parsed, '<strong><b><em><i><a><p><br>');
        $parsed = trim($parsed);
        return $parsed;
    }
}
