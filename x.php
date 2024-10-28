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
        
        // Apply the clearing rule to the bottom layer
        $this->clearFullRows();
    }

    private function clearFullRows(): void
    {
        for ($i = 0; $i < $this->length; $i++) {
            // Check if the entire row $i is filled
            $isFullRow = true;
            for ($j = 0; $j < $this->width; $j++) {
                if ($this->heights[$i][$j] == 0) {
                    $isFullRow = false;
                    break;
                }
            }
            // Clear the row and move everything above it down if it’s full
            if ($isFullRow) {
                // Shift rows above down by one
                for ($k = $i; $k > 0; $k--) {
                    $this->heights[$k] = $this->heights[$k - 1];
                }
                // Clear the top row
                $this->heights[0] = array_fill(0, $this->width, 0);
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
echo $game->getHeight() . "\n"; // Expected output might vary based on the clearing rule

$game->addCubes([
    [false, false],
    [true, true]
]);
echo $game->getHeight() . "\n"; // Expected output might vary based on the clearing rule
