<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiaristaRequest;
use App\Models\Diarista;
use App\Services\ViaCep;
use Illuminate\Http\Request;

class DiaristaController extends Controller
{
    protected ViaCep $viaCep;

    public function __construct(ViaCep $viaCep)
    {
        $this->viaCep = $viaCep;
    }
    /**
     * Lista as diaristas
     *
     * @return void
     */
    public function index()
    {
        $diaristas = Diarista::get();
        return view('index', [
            'diaristas' => $diaristas,
        ]);
    }

    /**
     * Mostra o formulário de criação
     *
     * @return void
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Cria uma diarista no banco de dados
     */

    public function store(DiaristaRequest $request)
    {
        $dados = $request->except('_token');
        $dados['foto_usuario'] = $request->foto_usuario->store('public');

        $dados = $this->cleanData($dados, 'cpf', 'cep', 'telefone');
        $dados['codigo_ibge'] = $this->viaCep->buscar($dados['cep'])['ibge'];

        Diarista::create($dados);

        return redirect()->route('diaristas.index');
    }

    /**
     * Limpa os dados com mascaras
     */

    public function cleanData(array $dados, string $cpf, string $cep, string $telefone): array
    {
        $dados[$cpf] = str_replace(['.', '-'], '', $dados[$cpf]);
        $dados[$cep] = str_replace('-', '', $dados[$cep]);
        $dados[$telefone] = str_replace(['(', ')', ' ', '-'], '', $dados[$telefone]);

        return $dados;
    }

    /**
     * Mostra o formulário de edição populado
     */

    public function edit(int $id)
    {
        $diarista = Diarista::findOrFail($id);

        return view('edit', [
            'diarista' => $diarista
        ]);
    }

    /**
     * Atualiza uma diarista no banco de dados
     */

    public function update($id, DiaristaRequest $request)
    {
        $diarista = Diarista::findOrFail($id);

        $dados = $request->except('_token', '_method');

        if ($request->hasFile('foto_usuario')) {
            $dados['foto_usuario'] = $request->foto_usuario->store('public');
        }

        $dados = $this->cleanData($dados, 'cpf', 'cep', 'telefone');
        $dados['codigo_ibge'] = $this->viaCep->buscar($dados['cep'])['ibge'];

        $diarista->update($dados);

        return redirect()->route('diaristas.index');
    }

    /**
     * Apaga uma diarista no banco de dados
     */

    public function destroy(int $id)
    {
        $diarista = Diarista::findOrFail($id);
        $diarista->delete();

        return redirect()->route('diaristas.index');
    }
}
