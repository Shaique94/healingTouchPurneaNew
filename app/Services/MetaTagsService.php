<?php

namespace App\Services;

use App\Models\Doctor;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class MetaTagsService
{
    public static function getTags($route, $params = [])
    {
        try {
            $hospitalName = Cache::remember('hospital_name', 86400, function () {
                return Setting::where('key', 'hospital_name')->value('value') ?? 'Healing Touch Hospital';
            });

            if (!$route) {
                return self::getDefaultTags($hospitalName);
            }

            // For doctor details page
            if ($route === 'doctors.detail' && isset($params['doctor'])) {
                return self::getDoctorTags($params['doctor'], $hospitalName);
            }

            // Define all route specific tags
            $routeTags = [
                'userlandingpage' => [
                    'keywords' => "$hospitalName, best hospital in Purnea, emergency hospital Purnea, emergency hospital near me, 24 hour hospital near me, er rooms near me, hospital near me, 24 hrs hospital near me, 24 7 hospital near me, emergency hospital, 24 hours clinic near me, emergency hospital near me 24 hours",
                    'description' => "Welcome to $hospitalName, leading hospital in Purnea."
                ],
                'book.appointment' => [
                    'keywords' => "book doctor appointment online Purnea, online healthcare booking",
                    'description' => "Book your appointment at $hospitalName, Purnea"
                ],
                'our.doctors' => [
                    'keywords' => "best doctors Purnea, specialist doctors Bihar, top consultants $hospitalName, find doctor online, gyno doctors in Purnea, women health specialists Purnea, gynecology clinics in Purnea, General surgeons Purnea Bihar",
                    'description' => "Meet our team of highly qualified doctors at $hospitalName, Purnea. book an online appointment with a specialist today."
                ],
                'careers.page' => [
                    'keywords' => "hospital jobs Purnea, medical careers Bihar, healthcare job openings, work at $hospitalName",
                    'description' => "Explore exciting career opportunities at $hospitalName, Purnea. Join our team of healthcare professionals and grow your career."
                ],
                'services.page' => [
                    'keywords' => "hospital services Purnea, medical services Bihar, healthcare treatments, best hospital facilities Purnea",
                    'description' => "Discover a wide range of healthcare services at $hospitalName, Purnea. Expert medical treatments and specialist consultations under one roof."
                ],
                'contact.page' => [
                    'keywords' => "$hospitalName contact, hospital address Purnea, contact $hospitalName, call hospital Purnea, hospital phone number",
                    'description' => "Get in touch with $hospitalName, Purnea. Find our contact details, location map, and reach out for appointments or inquiries."
                ],
                'about.page' => [
                    'keywords' => "$hospitalName, about hospital Purnea, best healthcare team, hospital mission Purnea, trusted medical care",
                    'description' => "Learn about $hospitalName - our journey, our vision, and our commitment to providing exceptional healthcare services in Purnea."
                ],
                'gallery.page' => [
                    'keywords' => "$hospitalName gallery, hospital facilities Purnea, healthcare infrastructure, modern hospital photos",
                    'description' => "Explore the advanced facilities and infrastructure of $hospitalName, Purnea, through our gallery showcasing our commitment to quality care."
                ],
                'terms.conditions' => [
                    'keywords' => "$hospitalName terms, hospital service terms, $hospitalName hospital conditions, hospital policies, service usage rules",
                    'description' => "Read the terms and conditions for using services at $hospitalName, Purnea. Understand your rights and responsibilities clearly."
                ],
                'privacy.policy' => [
                    'keywords' => "$hospitalName privacy policy, hospital data protection, personal information security, patient confidentiality $hospitalName",
                    'description' => "Learn how $hospitalName, Purnea, protects your personal information and maintains complete confidentiality of patient records."
                ],
                'career.detail' => [
                    'keywords' => "healthcare careers Purnea, medical jobs $hospitalName, hospital employment opportunities, healthcare positions Bihar",
                    'description' => "Find detailed information about career opportunities at $hospitalName, Purnea. Join our team of healthcare professionals."
                ],
            ];

            // Return route specific tags or default
            return $routeTags[$route] ?? self::getDefaultTags($hospitalName);

        } catch (\Exception $e) {
            return self::getDefaultTags('Healing Touch Hospital');
        }
    }

    private static function getDoctorTags($doctorId, $hospitalName)
    {
        try {
            $doctor = Doctor::with(['user', 'department'])->find($doctorId);
            
            if (!$doctor || !$doctor->user) {
                return self::getDefaultTags($hospitalName);
            }

            return [
                'keywords' => "Dr. {$doctor->user->name}, {$doctor->qualification}, doctor in Purnea",
                'description' => "Consult with Dr. {$doctor->user->name} at {$hospitalName}, Purnea - a leading {$doctor->qualification} specialist."
            ];

        } catch (\Exception $e) {
            return self::getDefaultTags($hospitalName);
        }
    }

    private static function getDefaultTags($hospitalName)
    {
        return [
            'keywords' => "$hospitalName Purnea, best hospital Bihar, doctor appointment",
            'description' => "$hospitalName - Quality Healthcare in Purnea, Bihar"
        ];
    }
}
