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
                return $classe->$metodo($parametros);
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

$router->get("/agendamentos", [AgendamentosController::class, "index"]);
$router->get("/contato", [ContatoController::class, "index"]);


//API Rotas
$router->get("/api/pessoas", [APIController::class, "Pessoas"]);
// $router->get("/api/categorias/:id", [CategoriaController::class, "show"]);
