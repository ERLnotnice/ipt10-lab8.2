<?php

namespace App;

class Profile
{
    private $identities;
    private $life_events;
    private $academics;
    private $institution_vision;
    private $campus_details;
    private $team_and_management;
    private $rebirth;
    private $pictures;

    public function __construct($data = null)
    {
        // Map the data to the class properties
        if (isset($data['personal_details'])) {
            $info = $data['personal_details'];

            $this->pictures = $info['pictures']['photo'] ?? null;

            $this->identities = $info['identities'];
            $this->life_events = $info['life_events'];
            $this->academics = $info['academics'];
            $this->institution_vision = $info['institution_vision'];
            $this->campus_details = $info['campus_details'];
            $this->team_and_management = $info['team_and_management'];
            $this->rebirth = $info['rebirth'];
        }
    }

    public function getFullName()
    {
        return $this->identities['title'] . ' ' . $this->identities['given_name'] . ' ' . $this->identities['middle_initial'] . ' ' . $this->identities['family_name'];
    }

    public function getAcademics()
    {
        return $this->academics;
    }

    public function getLifeEvents()
    {
        return $this->life_events['birth_story'] . ' ' . $this->life_events['youth'];
    }

    public function getCampusDetails()
    {
        return $this->campus_details['address'] . ' ' . $this->campus_details['land_donation_terms'] . ' ' . $this->campus_details['building_structure'];
    }

    public function getInstitutionVision()
    {
        return $this->institution_vision['goal'] . ' ' . $this->institution_vision['milestone'];
    }

    public function getTeamAndManagement()
    {
        return $this->team_and_management['early_team'] . ' ' . $this->team_and_management['downfall_and_closure'];
    }

    public function getRebirthDetails()
    {
        return $this->rebirth['new_institution'] . ' ' . $this->rebirth['market_fire'] . ' ' . $this->rebirth['lasting_impact'];
    }

    public function getImageUrl()
    {
        return $this->pictures;
    }
}
