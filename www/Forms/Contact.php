<?php

namespace App\Forms;

class Contact
{

    public function __construct()
    {
    }

    public function getConfig(): array
    {
        return [
            "config" => [
                "method" => "POST",
                "action" => "",
                "class" => "formContact",
                "id" => "form-contact",
                "submit" => "Envoyer",
                "error" => "Erreur lors de l'envoi du message"
            ],
            "inputs" => [
                "name" => [
                    "type" => "text",
                    "id" => "form-contact-name",
                    "label" => "Nom",
                    "required" => true,
                    "placeholder" => "Votre Nom",
                    "class" => "form-input",
                ],
                "email" => [
                    "type" => "email",
                    "id" => "form-contact-email",
                    "label" => "Email",
                    "required" => true,
                    "placeholder" => "Votre email",
                    "class" => "form-input",
                ],
                "message" => [
                    "type" => "text",
                    "id" => "form-contact-message",
                    "label" => "Message",
                    "required" => true,
                    "placeholder" => "Votre message",
                    "class" => "form-input",
                ],
            ]
        ];
    }
}