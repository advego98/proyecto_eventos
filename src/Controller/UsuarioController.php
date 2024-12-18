<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Form\UsuarioType;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class UsuarioController extends AbstractController
{
    #[Route('/usuario', name: 'app_usuario')]
    public function index(): Response
    {
        return $this->render('usuario/index.html.twig', [
            'controller_name' => 'UsuarioController',
        ]);
    }


    #[Route('/usuario/nuevo', name: 'app_usuario_nuevo')]
    public function nuevoUsuario(UserPasswordHasherInterface $passwordHasher): Response
    {
        $usuario = new Usuario();
        $usuario->setNombre('adri');
        $usuario->setEmail('adri@gmail.com');

        $plaintextPassword = 'apr';

        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $passwordHasher->hashPassword(
            $usuario,
            $plaintextPassword
        );
        $usuario->setPassword($hashedPassword);

        // ...


        return $this->render('usuario/index.html.twig', [
            'controller_name' => 'UsuarioController',
        ]);
    }
}
