<?php

namespace App\Contracts;

// Интерфейс с константными сообщениями
interface APIMessageEntity
{
    /**
     * @var string
     */
    public const DEFAULT_ERROR_MESSAGE = 'Что-то пошло не так!';

    /**
     * @var string
     */
    public const READY = 'Готово';

    /**
     * @var string
     */
    public const CREATED = 'Создано';
}
