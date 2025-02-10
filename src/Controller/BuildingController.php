namespace App\Controller;

use App\Entity\Building;
use App\Repository\BuildingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuildingController extends AbstractController
{
    #[Route('/building', name: 'app_building')]
    public function index(BuildingRepository $buildingRepository): Response
    {
        $buildings = $buildingRepository->findAll();

        return $this->render('building/index.html.twig', [
            'buildings' => $buildings,
        ]);
    }
}
