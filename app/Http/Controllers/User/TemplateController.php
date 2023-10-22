<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TemplateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->q == "abstract") {
            $template = public_path('dist/docs/ICOMESH_2023_Template.docx');
            return Response::download($template);
        } elseif ($request->q == "full_paper") {
            $template = public_path('dist/docs/ICOMESH_2023_Full_Paper.pdf');
            return Response::download($template);
        } elseif ($request->q == "ppt") {
            $template = public_path('template/ppt.pptx');
            return Response::download($template);
        } else {
            $template = public_path('template/vidcon.jpg');
            return Response::download($template);
        }
    }
}
