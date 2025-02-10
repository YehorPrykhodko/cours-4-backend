namespace App\Tests\Entity;

use App\Entity\Building;
use App\Entity\Person;
use PHPUnit\Framework\TestCase;

class BuildingTest extends TestCase
{
    public function testBuildingProperties(): void
    {
        $building = new Building();
        $building->setName('Tour Eiffel');
        $building->setAddress('Champ de Mars');
        $building->setCity('Paris');

        $this->assertEquals('Tour Eiffel', $building->getName());
        $this->assertEquals('Champ de Mars', $building->getAddress());
        $this->assertEquals('Paris', $building->getCity());
    }

    public function testResidentsManagement(): void
    {
        $building = new Building();
        $person = new Person();
        $person->setFirstName('Jean');
        $person->setLastName('Dupont');


        $building->addResident($person);

        $this->assertCount(1, $building->getResidents());
        $this->assertSame($building, $person->getBuilding());

        $building->removeResident($person);

        $this->assertCount(0, $building->getResidents());
        $this->assertNull($person->getBuilding());
    }
}
