<?php

namespace App\Controllers;
use App\Dao\JogadorDAO;
use App\Dao\LocadorDAO;

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

    protected function render(string $view, array $data = []): void {
        $is_logged = $this->is_logged;
        extract(array: $data);
        // var_dump('logged: ' . json_encode(['logged' => $is_logged]));
        // var_dump($_SESSION);
        include __DIR__ .'/../Views/main.php';
    }

    protected function setIsLogged(): void {
        $this->is_logged = isset($_SESSION['usuario_id']);
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
