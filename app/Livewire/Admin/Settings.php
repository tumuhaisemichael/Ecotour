<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Settings extends Component
{
    // Settings data, these could be stored in the database or another source
    public array $generalSettings = [
        'language' => 'English',
        'currency' => 'USD',
        'timeZone' => 'UTC',
    ];

    public array $profilePreferences = [
        'recommendations' => true,
        'savedLocations' => [],
        'notifications' => true,
    ];

    public array $accessibilityOptions = [
        'textSize' => 'medium',
        'screenReader' => false,
        'colorContrast' => false,
    ];

    public array $mapNavigationSettings = [
        'mapType' => 'standard',
        'locationTracking' => true,
        'defaultTravelMode' => 'walking',
    ];

    public array $contentFilters = [
        'ageRestrictions' => 'all',
        'categories' => ['dining', 'hiking', 'museums'],
    ];

    public array $bookingSettings = [
        'preferredPaymentMethod' => 'credit_card',
        'bookingHistoryVisibility' => true,
        'cancellationPolicyView' => true,
    ];

    public array $privacyAndSecurity = [
        'dataSharing' => false,
        'trackingCookies' => true,
        'twoFactorAuth' => false,
    ];

    public array $socialAndSharingOptions = [
        'socialMediaConnections' => ['facebook', 'twitter'],
        'allowReviewPosting' => true,
        'itinerarySharing' => false,
    ];

    // Layout
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.settings', [
            'generalSettings' => $this->generalSettings,
            'profilePreferences' => $this->profilePreferences,
            'accessibilityOptions' => $this->accessibilityOptions,
            'mapNavigationSettings' => $this->mapNavigationSettings,
            'contentFilters' => $this->contentFilters,
            'bookingSettings' => $this->bookingSettings,
            'privacyAndSecurity' => $this->privacyAndSecurity,
            'socialAndSharingOptions' => $this->socialAndSharingOptions,
        ]);
    }
}
