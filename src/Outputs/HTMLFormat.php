<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private string $response = '';

    private const DEFAULT_IMAGE_URL = 'https://www.auf.edu.ph/home/images/articles/bya.jpg';

    public function setData($profile): void
    {
        $styles = "
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0;
        }
        h1 {
            font-size: 2em;
            text-align: center;
            margin-bottom: 15px;
            color: #333;
        }
        img {
            width: 150px;
            height: 150px;
            display: block;
            margin: 0 auto;
        }
        p {
            font-size: 1em;
            line-height: 1.5;
            margin: 10px 0;
        }
        .section-title {
            font-size: 1.3em;
            color: #333;
            margin-top: 20px;
        }
        .profile-info {
            margin-top: 15px;
        }
        
    </style>
    ";

        $output = $styles; 
        $output .= "<div class='container'>";

        $output .= "<h1>The Founder: " . $profile->getFullName() . "</h1>";

        $imagePath = $profile->getImageUrl() ?: self::DEFAULT_IMAGE_URL;
        $output .= "<img src='" . $imagePath . "' alt='Profile Image'>";

        $output .= "<div class='bio'><p>" . $profile->getLifeEvents() . "</p></div>";

        $output .= "<div class='profile-info'>";
        $academics = $profile->getAcademics();
        $output .= "<p>" . (is_array($academics) ? implode(", ", $academics) : $academics) . "</p>";
        $output .= "</div>";

        $output .= "<div class='section-title'></div>";
        $output .= "<p>" . $profile->getInstitutionVision() . "</p>";

        $output .= "<div class='section-title'></div>";
        $output .= "<p>" . $profile->getCampusDetails() . "</p>";

        $output .= "<div class='section-title'></div>";
        $output .= "<p>" . $profile->getTeamAndManagement() . "</p>";

        $output .= "<div class='section-title'></div>";
        $output .= "<p>" . $profile->getRebirthDetails() . "</p>";

        $output .= "</div>"; 

        $this->response = $output;
    }

    public function render(): string
    {
        return $this->response;
    }
}
