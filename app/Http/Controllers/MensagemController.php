<?php

namespace App\Http\Controllers;
use App\Models\Mensagem;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class MensagemController extends Controller
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
        return view('mensagem.index');
    }

    public function all()
    {
        $mensagems = Mensagem::all();
        return response()->json($mensagems);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $mensagem = new Mensagem();
        $mensagem->descricao = $request->input('descricao');
        $mensagem->tag = $request->input('tag');

        $mensagem->save();

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
        $mensagem    = mensagem::find($id);

        $mensagem->descricao = $request->input('descricao');
        $mensagem->tag = $request->input('tag');

        $mensagem->save();
    }

    public function delete()
    {
        return 'delete';
    }

    public function destroy(Request $request, $id)
    {
        $mensagem = mensagem::find($id);
        $mensagem->delete();
    }
}
