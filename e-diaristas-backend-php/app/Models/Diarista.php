<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diarista extends Model
{
    use HasFactory;

    /**
     * Define os campos que podem ser gravados
     * @var array
     */

    protected $fillable = [
        'nome_completo',
        'cpf',
        'email',
        'telefone',
        'logradouro',
        'numero',
        'complemento',
        'cep',
        'bairro',
        'cidade',
        'estado',
        'codigo_ibge',
        'foto_usuario',
    ];


    /**
     *  Define os campos que serão usados na serialização
     *
     * @var array
     */
    protected $visible = [
        'nome_completo',
        'cidade',
        'foto_usuario',
        'reputacao',
    ];

    /**
     * Adiciona campos na serialização
     *
     * @var array
     */
    protected $appends = ['reputacao'];
    /**
     * Monta a URL da imagem
     *
     * @param string $valor
     * @return void
     */
    public function getFotoUsuarioAttribute(string $valor)
    {
        return config('app.url') . '/' . $valor;
    }
    /**
     * retorna a reputação randômica
     *
     * @param [type] $valor
     * @return void
     */
    public function getReputacaoAttribute($valor)
    {
        return mt_rand(1, 5);
    }
    /**
     * Busca diarista por código ibge
     */

    static public function buscaPorCodigoIbge(int $codigoIbge)
    {
        return self::where('codigo_ibge', $codigoIbge)->limit(6)->get();
    }

    /**
     * Retorna a quantidade por código ibge
     */

    static public function quantidadeCodigoIbge(int $codigoIbge): int
    {
        $quantidade = self::where('codigo_ibge', $codigoIbge)->count();

        return $quantidade > 6 ? $quantidade - 6 : 0;
    }
}
