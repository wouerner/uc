<?php

namespace App\Http\Controllers;
use App\Models\Documento;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        return 'show';
    }

    /**
     * index
     *
     * @access public
     * @return void
     */
    public function index()
    {
        return view('documento.index');
    }

    public function all()
    {
        $documentos = Documento::all();
        return response()->json($documentos);
    }

    public function allById($id)
    {
        $documentos = Documento::where('projeto_id',$id)->get();
        return response()->json($documentos);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $documento = new Documento();
        $documento->titulo = $request->input('titulo');
        $documento->tag = $request->input('tag');
        $documento->projeto_id = $request->input('projeto_id');

        $documento->save();

        return response()->json(array(
                'error' => false,
                'urls' => ['teste'=>1000],
                200
            ));
    }
    public function edit()
    {
        return 'edit';
    }

    public function update(Request $request, $id)
    {
        $documento    = documento::find($id);

        $documento->titulo = $request->input('titulo');
        $documento->tag = $request->input('tag');

        $documento->save();
    }

    public function delete()
    {
        return 'delete';
    }

    public function destroy(Request $request, $id)
    {
        $documento = documento::find($id);
        $documento->delete();
    }
}
