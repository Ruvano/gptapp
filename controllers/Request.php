<?php

namespace controllers;

class Request
{
    public function getRequestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? '';
    }

    public function getRequestUri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getQueryParam(string $name, $default = null)
    {
        return $_GET[$name] ?? $default;
    }

    public function getPostParam(string $name, $default = null)
    {
        return $_POST[$name] ?? $default;
    }
}
