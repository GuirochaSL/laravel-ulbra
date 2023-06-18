<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertaOffline extends Mailable
{
    use Queueable, SerializesModels;

    public $titulo;
    public $mensagem;
    public $alias;

    public function __construct($alias, $titulo, $mensagem)
    {
        $this->titulo = $titulo;
        $this->mensagem = $mensagem;
        $this->alias = $alias;
    }

    public function build()
    {
        return $this->subject($this->titulo)->view('emails.alerta')->with([
            'mensagem' => $this->mensagem,
            'alias' => $this->alias,
        ]);
    }
}
