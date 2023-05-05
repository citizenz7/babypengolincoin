<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-admin',
    description: 'Add an admin account',
)]

// php bin/console app:create-admin email password nickname

class CreateAdminCommand extends Command
{
    private EntityManagerInterface $entityManagerInterface;
    private UserPasswordHasherInterface $encoder;

    /**
     * @param EntityManagerInterface $entityManagerInterface
     * @param UserPasswordHasherInterface $encoder
     */
    public function __construct(
        EntityManagerInterface $entityManagerInterface,
        UserPasswordHasherInterface $encoder
    ) {
        $this->entityManagerInterface = $entityManagerInterface;
        $this->encoder = $encoder;
        parent::__construct();
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->addArgument('email', InputArgument::REQUIRED, 'Email')
            ->addArgument('password', InputArgument::REQUIRED, 'Password')
            ->addArgument('nickname', InputArgument::REQUIRED, 'Nickname');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $user = new User();

        $user->setEmail($input->getArgument('email'));

        $password = $this->encoder->hashPassword($user, $input->getArgument('password'));

        $user->setPassword($password);

        $user->setNickname($input->getArgument('nickname'));

        $user->setRoles(['ROLE_ADMIN']);

        // $user->setCreatedAt(new \DateTime('now'));

        // $user->setIsActive(true);

        //dump($user);

        $this->entityManagerInterface->persist($user);
        $this->entityManagerInterface->flush();

        $io->success('New admin account created!');
        return Command::SUCCESS;
    }
}
