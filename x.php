function transformDateFormat(array $dates): array {
    $result = [];
    
    foreach ($dates as $date) {
        // Check for format YYYY/MM/DD
        if (preg_match('/^(\d{4})\/(\d{2})\/(\d{2})$/', $date, $matches)) {
            if (checkdate((int)$matches[2], (int)$matches[3], (int)$matches[1])) {
                $formattedDate = $matches[1] . $matches[2] . $matches[3];
                $result[] = $formattedDate;
            }
        }
        // Check for format MM-DD-YYYY
        elseif (preg_match('/^(\d{2})-(\d{2})-(\d{4})$/', $date, $matches)) {
            if (checkdate((int)$matches[1], (int)$matches[2], (int)$matches[3])) {
                $formattedDate = $matches[3] . $matches[1] . $matches[2];
                $result[] = $formattedDate;
            }
        }
        // Check for format YYYYMMDD without delimiters
        elseif (preg_match('/^(\d{4})(\d{2})(\d{2})$/', $date, $matches)) {
            if (checkdate((int)$matches[2], (int)$matches[3], (int)$matches[1])) {
                $result[] = $date;
            }
        }
    }
    
    return $result;
}

// Test case
$dates = transformDateFormat([
    "2010/02/20", "2 016p 19p 12", "11-18-2012", "2018 12 24", "20130720"
]);
print_r($dates);
