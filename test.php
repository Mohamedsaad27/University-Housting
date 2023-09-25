<?php 
function myFunction($requiredParam, $optionalParam = "default_value") {
    // Function code here
    echo "Required Param: $requiredParam<br>";
    echo "Optional Param: $optionalParam<br>";
}

// Call the function with both required and optional parameters
myFunction("Hello", "World");

// Call the function with only the required parameter
myFunction("Hello");

?>