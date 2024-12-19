<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Assuming $items contains rows fetched from the database
    $items = [
        ['name' => 'T-shirt', 'category' => 'Clothing', 'size' => 'S'],
        ['name' => 'T-shirt', 'category' => 'Clothing', 'size' => 'M'],
        ['name' => 'T-shirt', 'category' => 'Clothing', 'size' => 'L'],
        ['name' => 'Jeans', 'category' => 'Clothing', 'size' => '30'],
        ['name' => 'Jeans', 'category' => 'Clothing', 'size' => '32'],
        ['name' => 'Shoes', 'category' => 'Footwear', 'size' => '8'],
        ['name' => 'Shoes', 'category' => 'Footwear', 'size' => '9'],
    ];
    
    // Grouping logic
    $groupedItems = [];
    
    foreach ($items as $item) {
        $key = $item['name'] . '|' . $item['category']; // Create a unique key for grouping
        if (!isset($groupedItems[$key])) {
            $groupedItems[$key] = [
                'name' => $item['name'],
                'category' => $item['category'],
                'sizes' => [],
            ];
        }
        $groupedItems[$key]['sizes'][] = $item['size'];
    }
    
    // Reindex the array to get a clean output
    $groupedItems = array_values($groupedItems);
    
    // Output the grouped array
    print_r($groupedItems);
    ?>
</body>
</html>