<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class TextFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        $output = "Founder: " . $profile->getFullName() . PHP_EOL . PHP_EOL;
        $output .= $profile->getLifeEvents() . PHP_EOL . PHP_EOL; // Updated from getBirthLife()
        
        $academics = $profile->getAcademics(); // Updated from getEducation()
        $output .= "Education: " . (is_array($academics) ? implode(", ", $academics) : $academics) . PHP_EOL . PHP_EOL;
        
        $output .= $profile->getInstitutionVision() . PHP_EOL . PHP_EOL; // Updated from getSchoolVision()
        $output .= $profile->getCampusDetails() . PHP_EOL . PHP_EOL; // Updated from getSchoolBuilding()
        $output .= $profile->getTeamAndManagement() . PHP_EOL . PHP_EOL; // Updated from getStaffAndOperations()
        $output .= $profile->getRebirthDetails() . PHP_EOL . PHP_EOL; // Updated from getReestablishment()
        
        $this->response = $output;
    }

    public function render()
    {
        header('Content-Type: text/plain'); // Changed to text/plain for better text formatting
        return $this->response;
    }
}
