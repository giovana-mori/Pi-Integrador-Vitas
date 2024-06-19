<?php

abstract class LayoutLoginController
{
    public function render($nameView, $data = array())
    {
        $clinica = new ClinicaDAO();
        $clinicaInfos = $clinica->buscar();
        $data['clinica'] = $clinicaInfos;
        extract($data);
        include_once 'views/layoutLogin/header.php';
        include_once $nameView . '.php';
        include_once 'views/layoutLogin/footer.php';
    }
}
