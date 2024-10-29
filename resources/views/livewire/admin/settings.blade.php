<style>
    .dropdown-section {
        margin-bottom: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .dropdown-header {
        padding: 0.75rem 1rem;
        cursor: pointer;
        background-color: #f5f5f5;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: background-color 0.3s ease;
    }
    .dropdown-header.active {
        background-color: #007bff;
        color: #fff;
    }
    .dropdown-content {
        padding: 1rem;
        display: none;
    }
    .arrow {
        transition: transform 0.3s ease;
    }
    .arrow.rotate {
        transform: rotate(90deg);
    }
</style>

<div>
    <h1>Admin Settings</h1>
    <hr />

    <!-- General Settings Dropdown -->
    <div class="dropdown-section">
        <div class="dropdown-header" onclick="toggleDropdown('generalSettings')">
            General Settings
            <span class="arrow">&#9654;</span>
        </div>
        <div id="generalSettings" class="dropdown-content">
            <p>Language: {{ $generalSettings['language'] }}</p>
            <p>Currency: {{ $generalSettings['currency'] }}</p>
            <p>Time Zone: {{ $generalSettings['timeZone'] }}</p>
        </div>
    </div>

    <!-- Profile Preferences Dropdown -->
    <div class="dropdown-section">
        <div class="dropdown-header" onclick="toggleDropdown('profilePreferences')">
            Profile Preferences
            <span class="arrow">&#9654;</span>
        </div>
        <div id="profilePreferences" class="dropdown-content">
            <p>Recommendations: {{ $profilePreferences['recommendations'] ? 'Enabled' : 'Disabled' }}</p>
            <p>Saved Locations: {{ implode(', ', $profilePreferences['savedLocations']) }}</p>
            <p>Notifications: {{ $profilePreferences['notifications'] ? 'Enabled' : 'Disabled' }}</p>
        </div>
    </div>

    <!-- Accessibility Options Dropdown -->
    <div class="dropdown-section">
        <div class="dropdown-header" onclick="toggleDropdown('accessibilityOptions')">
            Accessibility Options
            <span class="arrow">&#9654;</span>
        </div>
        <div id="accessibilityOptions" class="dropdown-content">
            <p>Text Size: {{ $accessibilityOptions['textSize'] }}</p>
            <p>Screen Reader: {{ $accessibilityOptions['screenReader'] ? 'Enabled' : 'Disabled' }}</p>
            <p>Color Contrast: {{ $accessibilityOptions['colorContrast'] ? 'High Contrast' : 'Default' }}</p>
        </div>
    </div>

    <!-- Map and Navigation Settings Dropdown -->
    <div class="dropdown-section">
        <div class="dropdown-header" onclick="toggleDropdown('mapNavigationSettings')">
            Map and Navigation Settings
            <span class="arrow">&#9654;</span>
        </div>
        <div id="mapNavigationSettings" class="dropdown-content">
            <p>Map Type: {{ $mapNavigationSettings['mapType'] }}</p>
            <p>Location Tracking: {{ $mapNavigationSettings['locationTracking'] ? 'Enabled' : 'Disabled' }}</p>
            <p>Default Travel Mode: {{ ucfirst($mapNavigationSettings['defaultTravelMode']) }}</p>
        </div>
    </div>

    <!-- Content Filters Dropdown -->
    <div class="dropdown-section">
        <div class="dropdown-header" onclick="toggleDropdown('contentFilters')">
            Content Filters
            <span class="arrow">&#9654;</span>
        </div>
        <div id="contentFilters" class="dropdown-content">
            <p>Age Restrictions: {{ ucfirst($contentFilters['ageRestrictions']) }}</p>
            <p>Categories of Interest: {{ implode(', ', $contentFilters['categories']) }}</p>
        </div>
    </div>

    <!-- Booking Settings Dropdown -->
    <div class="dropdown-section">
        <div class="dropdown-header" onclick="toggleDropdown('bookingSettings')">
            Booking and Reservation Settings
            <span class="arrow">&#9654;</span>
        </div>
        <div id="bookingSettings" class="dropdown-content">
            <p>Preferred Payment Method: {{ ucfirst($bookingSettings['preferredPaymentMethod']) }}</p>
            <p>Booking History Visibility: {{ $bookingSettings['bookingHistoryVisibility'] ? 'Enabled' : 'Disabled' }}</p>
            <p>Cancellation Policy View: {{ $bookingSettings['cancellationPolicyView'] ? 'Enabled' : 'Disabled' }}</p>
        </div>
    </div>

    <!-- Privacy and Security Dropdown -->
    <div class="dropdown-section">
        <div class="dropdown-header" onclick="toggleDropdown('privacyAndSecurity')">
            Privacy and Security
            <span class="arrow">&#9654;</span>
        </div>
        <div id="privacyAndSecurity" class="dropdown-content">
            <p>Data Sharing: {{ $privacyAndSecurity['dataSharing'] ? 'Enabled' : 'Disabled' }}</p>
            <p>Tracking Cookies: {{ $privacyAndSecurity['trackingCookies'] ? 'Enabled' : 'Disabled' }}</p>
            <p>Two-Factor Authentication: {{ $privacyAndSecurity['twoFactorAuth'] ? 'Enabled' : 'Disabled' }}</p>
        </div>
    </div>

    <!-- Social and Sharing Options Dropdown -->
    <div class="dropdown-section">
        <div class="dropdown-header" onclick="toggleDropdown('socialAndSharingOptions')">
            Social and Sharing Options
            <span class="arrow">&#9654;</span>
        </div>
        <div id="socialAndSharingOptions" class="dropdown-content">
            <p>Social Media Connections: {{ implode(', ', $socialAndSharingOptions['socialMediaConnections']) }}</p>
            <p>Review Posting: {{ $socialAndSharingOptions['allowReviewPosting'] ? 'Enabled' : 'Disabled' }}</p>
            <p>Itinerary Sharing: {{ $socialAndSharingOptions['itinerarySharing'] ? 'Enabled' : 'Disabled' }}</p>
        </div>
    </div>
</div>

<script>
    function toggleDropdown(id) {
        const content = document.getElementById(id);
        const header = content.previousElementSibling;
        const arrow = header.querySelector('.arrow');

        // Toggle display of the dropdown content
        content.style.display = content.style.display === 'none' || content.style.display === '' ? 'block' : 'none';

        // Toggle active class for highlighting the header
        header.classList.toggle('active');

        // Rotate the arrow
        arrow.classList.toggle('rotate');
    }
</script>
