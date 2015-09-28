<?php

namespace App\Http\Controllers;
use App\Models\PassoFluxos;
use App\Models\Passo;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PassoFluxosController extends Controller
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
       //$passos = PassoFluxos::where('passo_id', $id)
               //->get();
        //return response()->json($passos);

       $passos = Passo::find($id)->fluxos;
        return response()->json($passos);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        //$passo = new PassoFluxos();
        //$passo->passo_id = $request->input('passo_id');
        //$passo->fluxo_id = $request->input('fluxo_id');

        //$passo->save();

        $passo = new PassoFluxos();

        $passoFluxos = PassoFluxos::where('passo_id', $request->input('passo_id'))
                ->delete();

        if ($request->input('fluxo_id')) {
            foreach($request->input('fluxo_id') as $id){
                $insert[] = ['fluxo_id'=>$id, 'passo_id' => $request->input('passo_id') ];
            }

            $passo->insert($insert);
        }

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

    public function destroy(Request $request, $fluxo_id, $passo_id)
    {
        //$passo = Passo::find($id);
        $passoFluxo = PassoFluxos::where('fluxo_id', $fluxo_id)
            ->where('passo_id', $passo_id)
            ->delete();
    }
}
