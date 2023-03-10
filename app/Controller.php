<?php

abstract class Controller
{
    public function loadModel(string $model)
    {
        require_once(ROOT . 'models/' . $model . '.php');
        $this->$model = new $model();
    }
    public function render(string $vue, array $data = [])
    {
        extract($data);
        // On démarre le buffer de sortie
        ob_start();
        // On génère la vue
        require_once(ROOT . 'views/' . strtolower(get_class($this)) . '/' . $vue . '.php');
        // On stocke le contenu dans $content
        $content = ob_get_clean();

        // On fabrique le "template"
        require_once(ROOT . 'views/layout/default.php');
    }
}

