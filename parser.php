<?php
class Product {
    public $make;
    public $model;
    public $colour;
    public $capacity;
    public $network;
    public $grade;
    public $condition;

    public function __construct($data) {
        $this->make = $data['make'] ?? '';
        $this->model = $data['model'] ?? '';
        $this->colour = $data['colour'] ?? '';
        $this->capacity = $data['capacity'] ?? '';
        $this->network = $data['network'] ?? '';
        $this->grade = $data['grade'] ?? '';
        $this->condition = $data['condition'] ?? '';
    }
}


function parseCSV($filename, $requiredFields) {
    $products = [];
    if (($handle = fopen($filename, "r")) !== FALSE) {
        $header = fgetcsv($handle);
        foreach ($requiredFields as $requiredField) {
            if (!in_array($requiredField, $header)) {
                throw new Exception("Required field '$requiredField' not found in CSV header");
            }
        }
        
        while (($data = fgetcsv($handle)) !== FALSE) {
            $productData = array_combine($header, $data);
            foreach ($requiredFields as $requiredField) {
                if (!array_key_exists($requiredField, $productData)) {
                    throw new Exception("Required field '$requiredField' not found in product data");
                }
            }
            
            $products[] = new Product($productData);
        }
        fclose($handle);
    }
    return $products;
}

try {
    $inputFile = 'example_1.csv';
    $outputFile = 'combination_count.csv';

    $products = parseCSV($inputFile);
    foreach ($products as $product) {
        var_dump($product);
    }

    $uniqueCombinations = countUniqueCombinations($products);
    saveUniqueCombinationsToFile($uniqueCombinations, $outputFile);
    echo "Unique combinations count saved to $outputFile\n";
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage() . "\n";
}


?>
