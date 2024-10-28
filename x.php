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
        // Add cubes to the grid
        for ($i = 0; $i < $this->length; $i++) {
            for ($j = 0; $j < $this->width; $j++) {
                if ($cubes[$i][$j] === true) {
                    $this->heights[$i][$j]++;
                }
            }
        }
        
        // Immediately clear the bottom layer if fully filled
        $this->clearBottomLayer();
    }

    private function clearBottomLayer(): void
    {
        while (true) {
            $isFullRow = true;
            // Check the bottom row
            for ($j = 0; $j < $this->width; $j++) {
                if ($this->heights[0][$j] == 0) {
                    $isFullRow = false;
                    break;
                }
            }
            // Clear if the bottom row is full, and move everything above down
            if ($isFullRow) {
                // Shift all rows above the bottom down by one
                for ($i = 0; $i < $this->length - 1; $i++) {
                    $this->heights[$i] = $this->heights[$i + 1];
                }
                // Reset the top row
                $this->heights[$this->length - 1] = array_fill(0, $this->width, 0);
            } else {
                // Exit if the bottom row is not full
                break;
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

// Test the implementation with the provided example
$game = new ConstructionGame(2, 2);

$game->addCubes([
    [true, true],
    [false, false]
]);
$game->addCubes([
    [true, true],
    [false, true]
]);
echo $game->getHeight() . "\n"; // Expected output should reflect immediate clearing of the bottom row if full

$game->addCubes([
    [false, false],
    [true, true]
]);
echo $game->getHeight() . "\n"; // Expected output should reflect consecutive clearing behavior
