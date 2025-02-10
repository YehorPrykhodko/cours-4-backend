namespace App\Tests\Entity;

use App\Entity\Person;
use App\Entity\Building;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testPersonProperties(): void
    {
        $person = new Person();
        $person->setFirstName('Alice');
        $person->setLastName('Lemoine');
        $person->setEmail('alice.lemoine@example.com');

        $this->assertEquals('Alice', $person->getFirstName());
        $this->assertEquals('Lemoine', $person->getLastName());
        $this->assertEquals('alice.lemoine@example.com', $person->getEmail());
    }


    public function testBuildingAssignment(): void
    {
        $person = new Person();
        $building = new Building();
        $building->setName('Louvre');

        $person->setBuilding($building);

        $this->assertSame($building, $person->getBuilding());
    }
}
