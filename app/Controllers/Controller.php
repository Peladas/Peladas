<?php

namespace App\Controllers;
use App\Dao\JogadorDAO;
use App\Dao\LocadorDAO;
use App\Dao\QuadraDAO;
use App\Dao\UserDAO;
use App\Exceptions\NotFoundException;
use App\Exceptions\UnauthenticatedException;
use App\Models\Jogador;
use App\Models\Locador;
use App\Models\Quadra;

class Controller {
    protected bool $is_logged;

    protected ?string $userType = null;

    public function __construct() {
        $this->setIsLogged();
        if ($this->is_logged) {
            $this->getUserType();
        }
    }

    protected function getSearchParam(string $param): ?string {
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
        $locador->setId($record->getId());
        $locador->setUsuarioId($record->getUsuarioId());
        $locador->setRazaoSocial($record->getRazaoSocial());
        $locador->setCnpj($record->getCnpj());
        $locador->setNomeFantasia($record->getNomeFantasia());

        return $locador;
    }

    protected function getJogador(): Jogador {
        $usuarioId = $_SESSION['usuario_id'] ?? null;

        if (!$this->isJogador($usuarioId)) throw new \App\Exceptions\UnauthorizedException();

        $jogadorDAO = new JogadorDAO();
        $record = $jogadorDAO->getByUsuarioId($usuarioId);

        $jogador = new Jogador();
        $jogador->setId($record->getId());
        $jogador->setUsuarioId($record->getUsuarioId());
        $jogador->setNomeJogador($record->getNomeJogador());
        $jogador->setCpf($record->getCpf());
        $jogador->setDataNascimento($record->getDataNascimento());
        $jogador->setApelido($record->getApelido());

        return $jogador;
    }

    protected function getQuadra(): Quadra {
        $locadorId = $_SESSION['locador_id'];

        $quadraDAO = new QuadraDAO();
        $record = $quadraDAO->getByLocadorId($locadorId);

        $quadra = new Quadra();
        $quadra->setId($record->id);
        $quadra->setLocadorId($record->locador_id);
        $quadra->setValorAluguel($record->valor_aluguel);
        $quadra->setQuantMaxJogadores($record->quant_max_jogadores);
        $quadra->setTamanhoQuadra($record->tamanho_quadra);
        $quadra->setIdentificador($record->identificador);
        $quadra->setModalidade($record->modalidade);
        $quadra->setDescricao($record->descricao);
        $quadra->setStatus($record->status);

        return $quadra;
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

    protected function getLoggedUser() {
        $usuarioId = $_SESSION['usuario_id'] ?? null;

        if (!$usuarioId) {
            throw new UnauthenticatedException();
        }

        $userDAO = new UserDAO();
        $user = $userDAO->find($usuarioId);

        if (!$user) {
            throw new NotFoundException('Usuário não encontrado');
        }

        return $user;
    }

}
