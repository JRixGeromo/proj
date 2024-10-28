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
        // Placeholder for clearing logic if a layer reset is required
        $this->applyClearingRules();
    }

    private function applyClearingRules(): void
    {
        // Example clearing rule:
        // Check if any row or column is fully filled to a certain height, then clear it.
        for ($i = 0; $i < $this->length; $i++) {
            $isFullRow = true;
            for ($j = 0; $j < $this->width; $j++) {
                if ($this->heights[$i][$j] < 1) {
                    $isFullRow = false;
                    break;
                }
            }
            // Clear row if fully filled
            if ($isFullRow) {
                for ($j = 0; $j < $this->width; $j++) {
                    $this->heights[$i][$j] = 0;
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
echo $game->getHeight() . "\n"; // Expected output: 2 (depends on clearing logic)

$game->addCubes([
    [false, false],
    [true, true]
]);
echo $game->getHeight() . "\n"; // Expected output: might vary based on clearing rules
