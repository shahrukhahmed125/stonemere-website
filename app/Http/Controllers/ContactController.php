<?php

namespace App\Http\Controllers;

use App\Mail\NewEnquiryNotification;
use App\Models\Enquiry;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'organisation' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $enquiry = Enquiry::create($validated + [
            'ip_address' => $request->ip(),
        ]);

        // Send email notification
        try {
            $siteSettings = SiteSettings::getSettings();
            $recipientEmail = $siteSettings->email ?: config('mail.from.address');
            Mail::to($recipientEmail)->send(new NewEnquiryNotification($enquiry));
        } catch (\Exception $e) {
            // Log error but don't fail the submission
            Log::error('Failed to send enquiry email: ' . $e->getMessage());
        }

        return response()->json(['success' => true], 200);
    }
}
