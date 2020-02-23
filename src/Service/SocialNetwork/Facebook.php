<?php


namespace Service\SocialNetwork;


use Model\Entity\User;
use Service\Communication\CommunicationInterface;

class Facebook implements CommunicationInterface
{
    private $api_id;

    private function getApiId(User $user)
    {
        // метод получает api_id из БД
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