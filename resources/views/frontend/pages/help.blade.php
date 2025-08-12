@extends('frontend.master')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        line-height: 1.8;
        color: #333;
    }

    .help-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .help-container h1 {
        font-size: 28px;
        margin-bottom: 20px;
        text-align: center;
    }

    .help-container h2 {
        font-size: 20px;
        margin-top: 20px;
        color: #007BFF;
    }

    .help-container p {
        margin-bottom: 15px;
    }

    .help-item {
        margin-bottom: 30px;
    }

    .contact-section {
        background: #f8f9fa;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-top: 20px;
    }

    .contact-section h2 {
        font-size: 22px;
        margin-bottom: 15px;
        color: #333;
    }

    .contact-section p {
        font-size: 16px;
    }

    .contact-section strong {
        color: #007BFF;
    }
</style>

<div class="help-container">
    <h1><b>Help</b></h1>

    <div class="help-item">
        <h2>1. How can I contact S-Mart for help?</h2>
        <p>You can reach our customer support team by phone or email. We’re here to assist you with any questions or concerns:</p>
        <ul>
            <li><strong>Helpline:</strong> +8801627736636</li>
            <li><strong>Email:</strong> <a href="mailto:s-mart@help.com">s-mart@help.com</a></li>
        </ul>
    </div>

    <div class="help-item">
        <h2>2. What are your customer support hours?</h2>
        <p>Our customer support team is available Monday to Friday, 9 AM to 6 PM. We aim to respond to all queries within 24 hours.</p>
    </div>

    <div class="help-item">
        <h2>3. How can I track my order?</h2>
        <p>After placing an order, you will receive a confirmation email with a tracking number. Use this number to track your order status on our website’s <a href="/track-order">Order Tracking Page</a>.</p>
    </div>

    <div class="help-item">
        <h2>4. What should I do if I receive a damaged or incorrect item?</h2>
        <p>If you receive a damaged or incorrect item, please contact us immediately via email at <a href="mailto:s-mart@help.com">s-mart@help.com</a> or call our helpline at +8801627736636. Provide your order number and a brief description of the issue, along with any photos if possible. We’ll resolve the issue promptly.</p>
    </div>

    <div class="help-item">
        <h2>5. Can I cancel or modify my order?</h2>
        <p>Orders can be canceled or modified within 24 hours of placement. Contact our customer support team for assistance.</p>
    </div>

    <div class="help-item">
        <h2>6. Do you provide assistance for returns and refunds?</h2>
        <p>Yes, we provide assistance for returns and refunds. Visit our <a href="/returns-policy">Returns Policy</a> page for more details or contact our support team for guidance.</p>
    </div>

    <div class="contact-section">
        <h2>Contact Us</h2>
        <p><strong>Phone:</strong> +8801627736636</p>
        <p><strong>Email:</strong> <a href="mailto:s-mart@help.com">s-mart@help.com</a></p>
        <p>We’re here to help with any inquiries related to orders, payments, returns, or general questions. Feel free to reach out during our support hours!</p>
    </div>
</div>
@endsection
