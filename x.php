class ConstructionGame 
{
    private $heights;
    private $length;
    private $width;

    public function __construct(int $length, int $width) 
    {
        $this->length = $length;
        $this->width = $width;
        $this->heights = array_fill(0, $length, array_fill(0, $width, 0));
    }

    public function addCubes(array $cubes) : void
    {
        for ($i = 0; $i < $this->length; $i++) {
            for ($j = 0; $j < $this->width; $j++) {
                if ($cubes[$i][$j] === true) {
                    $this->heights[$i][$j]++;
                }
            }
        }
    }

    public function getHeight() : int  
    {
        $maxHeight = 0;
        foreach ($this->heights as $row) {
            foreach ($row as $height) {
                $maxHeight = max($maxHeight, $height);
            }
        }
        return $maxHeight;
    }
}

// Test the implementation
$game = new ConstructionGame(2, 2);

$game->addCubes([
    [true, true],
    [false, false]
]);
$game->addCubes([
    [true, true],
    [false, true]
]);
echo $game->getHeight() . "\n"; // Expected output: 2

$game->addCubes([
    [false, false],
    [true, true]
]);
echo $game->getHeight() . "\n"; // Expected output: 2
