namespace App\Command;

use App\Entity\Building;
use App\Entity\Person;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:generate-test-data')]
class GenerateTestDataCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $faker = Factory::create('fr_FR');
        
        for ($i = 0; $i < 5; $i++) {
            $building = new Building();
            $building->setName($faker->company);
            $building->setAddress($faker->streetAddress);
            $building->setCity($faker->city);

            $this->entityManager->persist($building);
        }

        $this->entityManager->flush();

        $buildings = $this->entityManager->getRepository(Building::class)->findAll();

        for ($i = 0; $i < 20; $i++) {
            $person = new Person();
            $person->setFirstName($faker->firstName);
            $person->setLastName($faker->lastName);
            $person->setEmail($faker->email);
            $person->setDateOfBirth($faker->dateTimeBetween('-50 years', '-18 years'));

            $person->setBuilding($faker->randomElement($buildings));

            $this->entityManager->persist($person);
        }

        $this->entityManager->flush();

        $output->writeln('<info>OK</info>');
        return Command::SUCCESS;
    }
}
