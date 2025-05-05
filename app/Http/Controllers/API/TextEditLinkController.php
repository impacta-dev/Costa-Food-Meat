<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PageContent;

class TextEditLinkController extends Controller
{
    public function get(Request $request) {
        app()->setLocale($request->lang);
        $content = PageContent::find($request->contentId);
        $link = config('app.url') . '/backend/page_contents.php';

        // Edit text in default lang
        if (app()->getLocale() == config('app.fallback_locale')) {
            $link .= '?operation=edit&pk0=' . $content->id;
        } else {
            // Edit existing translation
            if ($content->translation) {
                $link .= '?hname=page_contents_page_content_translations_handler&fk0=' . $content->id . '&master_viewmode=0&operation=edit&pk0=' . $content->translation->id;
            // Create new translation
            } else {
                $link .= '?hname=page_contents_page_content_translations_handler&fk0=' . $content->id . '&master_viewmode=0&operation=insert';
            }
        }

        return $link;
    }
}
