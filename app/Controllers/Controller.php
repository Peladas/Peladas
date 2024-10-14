<?php

namespace App\Controllers;
use App\Dao\JogadorDAO;
use App\Dao\LocadorDAO;
use App\Models\Jogador;
use App\Models\Locador;

class Controller {
    protected bool $is_logged;

    protected ?string $userType = null;

    public function __construct() {
        $this->setIsLogged();
        if ($this->is_logged) {
            $this->getUserType();
        }
    }

    protected function getSearchParam(string $param): mixed {
        $param = $_REQUEST[$param] ?? null;
        return $param;
    }

    protected function getBody(): array {
        $body = $_POST;
        return $body;
    }

    protected function getMethod(): string {
        $method = $_SERVER['REQUEST_METHOD'];
        return strtolower(string: $method);
    }

    public function render(string $view, array $data = []): void {
        $is_logged = $this->is_logged;
        $user_type = $this->userType;
        extract(array: $data);
        // var_dump('logged: ' . json_encode(['logged' => $is_logged]));
        // var_dump($_SESSION);
        include __DIR__ .'/../Views/main.php';
    }

    protected function setIsLogged(): void {
        $this->is_logged = isset($_SESSION['usuario_id']);
    }

    protected function getLocador(): Locador {
        $usuarioId = $_SESSION['usuario_id'] ?? null;

        if (!$this->isLocador($usuarioId)) throw new \App\Exceptions\UnauthorizedException();

        $locadorDAO = new LocadorDAO();
        $record = $locadorDAO->getByUsuarioId($usuarioId);

        $locador = new Locador();
        $locador->setId($record->id);
        $locador->setUsuarioId($record->usuario_id);
        $locador->setRazaoSocial($record->razao_social);
        $locador->setCnpj($record->cnpj);
        $locador->setNomeFantasia($record->nome_fantasia);;

        return $locador;
    }

    protected function getJogador(): Jogador {
        $usuarioId = $_SESSION['usuario_id'] ?? null;

        if (!$this->isJogador($usuarioId)) throw new \App\Exceptions\UnauthorizedException();

        $jogadorDAO = new JogadorDAO();
        $record = $jogadorDAO->getByUsuarioId($usuarioId);

        $jogador = new Jogador();
        $jogador->setId($record->id);
        $jogador->setUsuarioId($record->usuario_id);
        $jogador->setNomeJogador($record->nome_jogador);
        $jogador->setCpf($record->cpf);
        $jogador->setDataNascimento($record->data_nascimento);
        $jogador->setApelido($record->apelido);

        return $jogador;
    }

    protected function getUserType(): void {
        $usuarioId = $_SESSION['usuario_id'] ?? null;

        if ($this->isJogador($usuarioId)) {
            $this->userType = 'jogador';
            return;
        }

        if ($this->isLocador($usuarioId)) {
            $this->userType = 'locador';
            return;
        }

        $this->userType = null;
    }

    protected function isJogador(int $usuarioId): bool {
        // Procurar na tabela jogadores se existe um com esse usuarioId
        $jogadorDAO = new JogadorDAO();
        $jogador = $jogadorDAO->getByUsuarioId($usuarioId);
        return (bool)$jogador;
    }

    protected function isLocador(int $usuarioId): bool {
        // Procurar na tabela locadores se existe um com esse usuarioId
        $locadorDAO = new LocadorDAO();
        $locador = $locadorDAO->getByUsuarioId($usuarioId);

        return (bool)$locador;
    }
}
