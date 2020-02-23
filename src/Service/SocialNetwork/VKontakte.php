<?php


namespace Service\SocialNetwork;


use Model\Entity\User;
use Service\Communication\CommunicationInterface;

class VKontakte implements CommunicationInterface
{
    private $access_token;

    private function getAccessToken(User $user)
    {
        // метод получает access_token из БД
    }

    /**
     * @param User $user
     * @param string $templateName
     * @param array $params
     */
    public function process(
        User $user,
        string $templateName,
        array $params = []
    ): void
    {
        // Вызываем метод по формированию текста сообщения и последующей отправки
    }
}