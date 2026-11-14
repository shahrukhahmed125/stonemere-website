<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Website Enquiry</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            background: #1f2937;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
        }
        .field {
            margin-bottom: 20px;
        }
        .field-label {
            font-weight: bold;
            color: #666;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .field-value {
            font-size: 16px;
            color: #333;
        }
        .footer {
            background: #f4f4f4;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .footer a {
            color: #1f2937;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Website Enquiry</h1>
        </div>
        <div class="content">
            <p style="margin-top: 0;">You have received a new enquiry from the Stonemere Life Management website.</p>

            <div class="field">
                <div class="field-label">Name</div>
                <div class="field-value">{{ $enquiry->name }}</div>
            </div>

            <div class="field">
                <div class="field-label">Phone</div>
                <div class="field-value">{{ $enquiry->phone }}</div>
            </div>

            @if($enquiry->organisation)
            <div class="field">
                <div class="field-label">Organisation</div>
                <div class="field-value">{{ $enquiry->organisation }}</div>
            </div>
            @endif

            @if($enquiry->role)
            <div class="field">
                <div class="field-label">Role</div>
                <div class="field-value">{{ $enquiry->role }}</div>
            </div>
            @endif

            <div class="field">
                <div class="field-label">Message</div>
                <div class="field-value">{{ nl2br(e($enquiry->message)) }}</div>
            </div>

            <div class="field">
                <div class="field-label">Submitted</div>
                <div class="field-value">{{ $enquiry->created_at->format('j F Y, g:i A') }}</div>
            </div>

            @if($enquiry->ip_address)
            <div class="field">
                <div class="field-label">IP Address</div>
                <div class="field-value">{{ $enquiry->ip_address }}</div>
            </div>
            @endif
        </div>
        <div class="footer">
            <p>This enquiry has been saved to your database. You can view and manage it in the <a href="{{ config('app.url') }}/admin/enquiries">admin panel</a>.</p>
        </div>
    </div>
</body>
</html>
