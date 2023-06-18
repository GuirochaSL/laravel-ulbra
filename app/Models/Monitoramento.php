<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitoramento extends Model
{
    protected $primaryKey = 'idEntidade';
    public $incrementing = false;

  protected $fillable = ['idEntidade','ativo','alias','prioridade','cnpj','servico','Out','B2B','e1','e2','e3','e4','e5','e6','carteira','nomeInstancia'];
  protected $table = 'monitoramento';
  public $timestamps = false;

}
