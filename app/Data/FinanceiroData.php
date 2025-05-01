<?php

namespace App\Data\Financeiro;

class FinanceiroData
{
    public readonly string $titulo;
    public readonly ?string $descricao;
    public readonly ?string $cor;
    public readonly ?string $pagamento_data;
    public readonly ?string $pagamento_hora;
    public readonly ?string $notification_data;
    public readonly ?string $notification_hora;
    public readonly ?string $status;
    public readonly ?string $recorrencia;


    public function __construct(array $data)
    {
        $this->titulo = $data['titulo'];
        $this->descricao = $data['descricao'] ?? null;
        $this->cor = $data['cor'] ?? null;
        $this->pagamento_data = $data['pagamento_data'] ?? null;
        $this->pagamento_hora = $data['pagamento_hora'] ?? null;
        $this->notification_data = $data['notification_data'] ?? null;
        $this->notification_hora = $data['notification_hora'] ?? null;
        $this->status = $data['status'] == 'on' ? 1 : null;
        $this->recorrencia = $data['recorrencia'] == 'on' ? 1 : null;
    }
}
