<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Associado extends Model
{
    protected $fillable = ['nome', 'email', 'cpf', 'data_filiacao'];

    public function anuidadesPagas()
    {
        return $this->belongsToMany(Anuidade::class, 'pagamentos_anuidades')
            ->withPivot('pago');
    }

    public function anuidadesDevidas()
    {
        return Anuidade::where('ano', '>=', $this->data_filiacao->year)
            ->orderBy('ano', 'asc')
            ->get();
    }

    public function isPagamentoEmDia()
    {
        return $this->anuidadesDevidas()
            ->pluck('id')
            ->diff($this->anuidadesPagas->pluck('id'))
            ->isEmpty();
    }
}
