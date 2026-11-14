<?php

namespace App\View\Composers;

use App\Models\SiteSettings;
use Illuminate\View\View;

class SiteSettingsComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        try {
            $settings = SiteSettings::first() ?? SiteSettings::getSettings();
        } catch (\Exception $e) {
            // Handle database errors gracefully (e.g., during testing without migrations)
            $settings = null;
        }
        
        if (!$settings) {
            // Provide fallback values when settings are not available
            $view->with('settings', null);
            $view->with('settings_logos', [
                'light' => null,
                'dark' => null,
                'stacked_reverse' => null,
                'favicon' => null,
            ]);
            $view->with('settings_phone', '01225 338436');
            $view->with('settings_phone_tel', '+441225338436');
            $view->with('settings_whatsapp', '07891 341414');
            $view->with('settings_whatsapp_tel', '447891341414');
            $view->with('settings_email', '');
            $view->with('settings_address', 'Bath, Somerset');
            $view->with('settings_company_name', 'Stonemere Life Management');
            $view->with('settings_tagline', '');
            $view->with('settings_social_media', [
                'linkedin' => '',
                'twitter' => '',
                'facebook' => '',
            ]);
            $view->with('settings_meta_title', 'Stonemere Life Management | Practical coordination for care providers, solicitors & health professionals in Bath');
            $view->with('settings_meta_description', 'One named contact who coordinates the practical side of a client’s life in Bath: family liaison, care liaison, property and urgent cases, alongside care providers, solicitors and health teams.');
            $view->with('settings_og_image', '');
            $view->with('settings_twitter_image', '');
            return;
        }
        
        // Provide formatted values for common use cases
        $phone = $settings->phone ?? '01225 338436';
        $whatsapp = $settings->whatsapp ?? '07891 341414';
        
        // Format phone for tel: links (remove spaces, ensure +44 prefix for UK numbers)
        $phoneClean = preg_replace('/\s+/', '', $phone);
        if (str_starts_with($phoneClean, '0')) {
            $phoneTel = '+44' . substr($phoneClean, 1);
        } else {
            $phoneTel = $phoneClean;
        }
        
        // Format WhatsApp for wa.me links (remove spaces, ensure country code)
        $whatsappClean = preg_replace('/\s+/', '', $whatsapp);
        if (str_starts_with($whatsappClean, '0')) {
            $whatsappTel = '44' . substr($whatsappClean, 1);
        } else {
            $whatsappTel = $whatsappClean;
        }
        
        $view->with('settings_phone', $phone);
        $view->with('settings_phone_tel', $phoneTel);
        $view->with('settings_whatsapp', $whatsapp);
        $view->with('settings_whatsapp_tel', $whatsappTel);
        $view->with('settings_email', $settings->email ?? '');
        $view->with('settings_address', $settings->address ?? 'Bath, Somerset');
        $view->with('settings_company_name', $settings->company_name ?? 'Stonemere Life Management');
        $view->with('settings_tagline', $settings->tagline ?? '');
        
        // Social media with fallbacks
        $socialMedia = $settings->social_media ?? [];
        $view->with('settings_social_media', [
            'linkedin' => $socialMedia['linkedin'] ?? '',
            'twitter' => $socialMedia['twitter'] ?? '',
            'facebook' => $socialMedia['facebook'] ?? '',
        ]);
        
        // SEO defaults
        $view->with('settings_meta_title', $settings->default_meta_title ?? 'Stonemere Life Management | Practical coordination for care providers, solicitors & health professionals in Bath');
        $view->with('settings_meta_description', $settings->default_meta_description ?? 'One named contact who coordinates the practical side of a client’s life in Bath: family liaison, care liaison, property and urgent cases, alongside care providers, solicitors and health teams.');
        $view->with('settings_og_image', $settings->default_og_image ?? '');
        $view->with('settings_twitter_image', $settings->default_twitter_image ?? '');

        // Logo images (uploaded files or legacy asset paths), resolved to URLs
        $view->with('settings_logos', [
            'light' => !empty($settings->logo_light) ? \App\Helpers\ImageUrlHelper::resolve($settings->logo_light) : null,
            'dark' => !empty($settings->logo_dark) ? \App\Helpers\ImageUrlHelper::resolve($settings->logo_dark) : null,
            'stacked_reverse' => !empty($settings->logo_stacked_reverse) ? \App\Helpers\ImageUrlHelper::resolve($settings->logo_stacked_reverse) : null,
            'favicon' => !empty($settings->favicon) ? \App\Helpers\ImageUrlHelper::resolve($settings->favicon) : null,
        ]);
    }
}
