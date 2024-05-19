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

    public function instancia_rota(string $metodo, string $url)
    {
        if (isset($this->rotas[$metodo][$url])) {
            $dados_rota = $this->rotas[$metodo][$url];

            $classe = new $dados_rota[0];
            $metodo = $dados_rota[1];
            return $classe->$metodo();
        }
        exit("Rota Invalida");
    }
}//fim da classe

$router = new Rotas();
//rota inicio
$router->get("/", [indexController::class, "index"]);
$router->get("/login", [LoginController::class, "index"]);
$router->get("/contato", [ContatoController::class, "index"]);
$router->get("/registro", [RegisterController::class, "index"]);
$router->get("/agendamentos", [AgendamentosController::class, "index"]);
//rotas categorias
// $router->post("/inserir_categoria", [categoriaController::class, "inserir"]);

?>