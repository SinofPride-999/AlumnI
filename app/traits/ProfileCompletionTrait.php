<?php

trait ProfileCompletionTrait {
    protected function calculateProfileCompletion($user) {
        $totalFields = 16;
        $completedFields = 0;

        // Required fields
        $requiredFields = [
          'first_name', 
          'last_name', 
          'email', 
          'graduation_year', 
          'degree_program'
        ];

        foreach ($requiredFields as $field) {
            if (!empty($user[$field])) $completedFields++;
        }

        // Optional fields
        $optionalFields = [
            'profile_picture', 'current_job_title', 'current_company', 'bio', 
            'linkedin_url', 'personal_website_url', 'twitter_url', 
            'instagram_url', 'whatsapp_url', 'phone_number', 'profile_picture'
        ];

        foreach ($optionalFields as $field) {
            if (!empty($user[$field])) $completedFields++;
        }

        return round(($completedFields / $totalFields) * 100);
    }
}