<?php
namespace models;
class MainModel
{
    public function getText(): string
    {
        return 'Hello, world!';
    }
    public function getData(): array
    {
        return [
            'title' => 'Какой-то заголовок',
            'text' => 'Какой-то текст',
            'date' => '2023-04-03',
        ];
    }
}
