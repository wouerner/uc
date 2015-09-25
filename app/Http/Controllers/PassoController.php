<?php

namespace App\Http\Controllers;
use App\Models\Passo;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PassoController extends Controller
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
        $produtos = Passo::all();
        return view('documento.index');
    }

    public function all($id)
    {
        //$passo = Passo::all();
        //return response()->json($passo);
       $passos = Passo::where('fluxo_id', $id)
               ->get();
        return response()->json($passos);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $passo = new Passo();
        $passo->descricao = $request->input('descricao');
        $passo->fluxo_id = $request->input('fluxo_id');

        $passo->save();

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
        $passo = Passo::find($id);

        $passo->descricao = $request->input('descricao');

        $passo->save();
    }

    public function delete()
    {
        return 'delete';
    }

    public function destroy(Request $request, $id)
    {
        $passo = Passo::find($id);
        $passo->delete();
    }
}
