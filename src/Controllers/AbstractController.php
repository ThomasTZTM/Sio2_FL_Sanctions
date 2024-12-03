<?php

namespace App\Controllers;

abstract class AbstractController
{
    protected function render(string $template, array $params = []): void
    {
        extract($params);
        ob_start();
        require_once __DIR__ . "/../../templates/{$template}.php";
        $content = ob_get_clean();
        require_once __DIR__ . "/../../templates/base.php";
    }

    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit();
    }

    protected function getUser(): ?array
    {
        return $_SESSION['utilisateur'] ?? null;
    }

    protected function isAuthenticated(): bool
    {
        return isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']);
    }

    protected function requireAuth(): void
    {
        if (!$this->isAuthenticated()) {
            $this->redirect('/sanctions/login');
        }
    }

    protected function renderError(int $code = 404, string $message = null): void
    {
        http_response_code($code);
        $this->render('error/' . $code, ['message' => $message]);
        exit();
    }
}