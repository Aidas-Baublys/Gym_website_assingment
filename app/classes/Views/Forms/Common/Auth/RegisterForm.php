<?php

namespace App\Views\Forms\Common\Auth;

use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct([
                'fields' => [
                    'name' => [
                        'label' => 'Vardas',
                        'type' => 'text',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_not_numeric',
                            'validate_length' => [
                                'max' => 40,
                            ],
                        ],
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Kaip vadini savo lašinius?',
                            ]
                        ]
                    ],
                    'surname' => [
                        'label' => 'Pavardė',
                        'type' => 'text',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_not_numeric',
                            'validate_length' => [
                                'max' => 40,
                            ],
                        ],
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Kas šių lašinių tėvas?',
                            ]
                        ]
                    ],
                    'email' => [
                        'label' => 'El. paštas',
                        'type' => 'text',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_email',
                            'validate_user_unique',
                        ],
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Kur lašiniai priima laiškus?',
                            ]
                        ]
                    ],
                    'password' => [
                        'label' => 'Slaptažodis',
                        'type' => 'password',
                        'validators' => [
                            'validate_field_not_empty',
                        ],
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'lašinys123 netinka.',
                            ]
                        ]
                    ],
                    'password_repeat' => [
                        'label' => 'Pakartok Slaptažodį',
                        'type' => 'password',
                        'validators' => [
                            'validate_field_not_empty',
                        ],
                        'extra' => [
                            'attr' => [
                                'placeholder' => '(Dar vienas kalambūras lašinių tema)',
                            ]
                        ]
                    ],
                    'phone' => [
                        'label' => 'Telefono Numeris (nebūtina)',
                        'type' => 'text',
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Įjunk vibraciją, įkišk tarp lašinių, lauk žinutės ar skambučio.',
                            ]
                        ]
                    ],
                    'address' => [
                        'label' => 'Adresas (nebūtina)',
                        'type' => 'text',
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Kur rast šiuos lašinius?',
                            ]
                        ]
                    ],
                ],
                'buttons' => [
                    'register' => [
                        'title' => 'REGISTRUOK!',
                    ]
                ],
                'validators' => [
                    'validate_fields_match' => [
                        'password',
                        'password_repeat'
                    ]
                ]
            ]
        );
    }
}