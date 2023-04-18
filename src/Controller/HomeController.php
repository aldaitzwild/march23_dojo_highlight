<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $data = array_map('trim', $_POST);

            if (!isset($data['search']) || empty($data['search'])) {
                $errors[] = "Il n'y a pas de recherche";
            }

            if (empty($errors)) {
                $search = $data['search'];
                $page = $this->twig->render('Home/article.html.twig');


                $page = str_replace($search, '<span style="background-color: yellow;">' . $search . '</span>', $page);

                return $page;
            }
        }

        return $this->twig->render('Home/article.html.twig');
    }
}
