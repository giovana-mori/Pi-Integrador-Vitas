<?php
class Rotas
{
    private array $rotas = [];

    public function get(string $caminho, array $dados)
    {
        $this->rotas["GET"][$caminho] = $dados;
    }

    public function post(string $caminho, array $dados_rota)
    {
        $this->rotas["POST"][$caminho] = $dados_rota;
    }

    private function extrairParametros($caminhoConfigurado, $caminhoRequisitado)
    {
        // Transforma {id} em (?P<id>[a-zA-Z0-9_-]+)
        $regex = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<\1>[a-zA-Z0-9_-]+)', $caminhoConfigurado);
        $regex = str_replace('/', '\/', $regex);
        $regex = '/^' . $regex . '$/';

        if (preg_match($regex, $caminhoRequisitado, $matches)) {
            return array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
        }

        return false;
    }

    public function instancia_rota(string $metodo, string $url)
    {
        foreach ($this->rotas[$metodo] as $caminhoConfigurado => $dados_rota) {
            $parametros = $this->extrairParametros($caminhoConfigurado, $url);
            if ($parametros !== false) {
                $classe = new $dados_rota[0];
                $metodo = $dados_rota[1];
                return $classe->$metodo(...array_values($parametros)); // Passa os parâmetros como argumentos
            }
        }
        exit("Rota Invalida");
    }
} //fim da classe

$router = new Rotas();
//rota inicio
$router->get("/", [indexController::class, "index"]);

$router->get("/login", [LoginController::class, "index"]);
$router->post("/auth", [LoginController::class, "auth"]);
$router->get("/logout", [LoginController::class, "logout"]);

$router->get("/registro", [RegisterController::class, "index"]);
$router->post("/registro", [RegisterController::class, "registrar"]);

$router->get("/clinica", [ClinicaController::class, "index"]);
$router->post("/clinica", [ClinicaController::class, "update"]);

$router->get("/agendamentos", [AgendamentosController::class, "index"]);
$router->get("/contato", [ContatoController::class, "index"]);
$router->get("/perfil", [PerfilController::class, "index"]);
$router->post("/perfil", [PerfilController::class, "update"]);
$router->get("/clientes", [PessoasController::class, "index"]);
$router->get("/novocadastro", [PessoasController::class, "cadastro"]);
$router->post("/novocadastro", [PessoasController::class, "inserir"]);
$router->get("/editarcadastro/{id}", [PessoasController::class, "editar"]);
$router->post("/editarcadastro/{id}", [PerfilController::class, "update"]);

$router->get("/profissionais", [ProfissionaisController::class, "index"]);
$router->get("/novoprofissional", [ProfissionaisController::class, "cadastro"]);
$router->get("/editarprofissional/{id}", [ProfissionaisController::class, "editar"]);

//API Rotas
$router->get("/api/pessoas", [APIController::class, "Pessoas"]);
$router->get("/api/pessoas/{nome}", [APIController::class, "Pessoas"]);
$router->get("/api/cidades/{uf}", [APIController::class, "cidades"]);
$router->post("/api/alterarpessoa", [APIController::class, "alterarPessoa"]);
$router->post("/api/upload", [APIController::class, "uploadAvatar"]);
$router->post("/api/uploadlogo", [APIController::class, "uploadLogo"]);