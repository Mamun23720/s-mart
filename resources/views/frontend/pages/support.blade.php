@extends('frontend.master')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        line-height: 1.8;
        color: #333;
    }

    .support-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .support-container h1 {
        font-size: 28px;
        margin-bottom: 20px;
        text-align: center;
    }

    .support-container h2 {
        font-size: 20px;
        margin-top: 20px;
        color: #007BFF;
    }

    .support-container p {
        margin-bottom: 15px;
    }

    .support-item {
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

<div class="support-container">
    <h1><b>Support</b></h1>

    <div class="support-item">
        <h2>1. How can I contact S-Mart for support?</h2>
        <p>You can reach our support team for any assistance by phone or email:</p>
        <ul>
            <li><strong>Support Number:</strong> +8801627736636</li>
            <li><strong>Email:</strong> <a href="mailto:s-mart@support.com">s-mart@support.com</a></li>
        </ul>
    </div>

    <div class="support-item">
        <h2>2. What are your support hours?</h2>
        <p>Our support team is available Monday to Friday, 9 AM to 6 PM. For urgent matters, please call us directly during these hours.</p>
    </div>

    <div class="support-item">
        <h2>3. How can I get help with an order issue?</h2>
        <p>If you encounter any issues with your order, such as delays or incorrect items, please contact us immediately. Provide your order number and a description of the problem for faster assistance.</p>
    </div>

    <div class="support-item">
        <h2>4. Can I get technical support for using your website?</h2>
        <p>Yes, if you are facing technical difficulties while browsing or placing an order on our website, contact our support team. We’ll guide you through resolving the issue.</p>
    </div>

    <div class="support-item">
        <h2>5. How can I request a return or refund?</h2>
        <p>You can request a return or refund by contacting our support team via email or phone. Be sure to include your order number and the reason for the request. Visit our <a href="/returns-policy">Returns Policy</a> page for more details.</p>
    </div>

    <div class="support-item">
        <h2>6. Do you offer support for international customers?</h2>
        <p>Yes, we provide support to all customers, including international shoppers. However, response times may vary depending on your time zone. Feel free to reach out via email at <a href="mailto:s-mart@support.com">s-mart@support.com</a>.</p>
    </div>

    <div class="contact-section">
        <h2>Contact Support</h2>
        <p><strong>Support Number:</strong> +8801627736636</p>
        <p><strong>Email:</strong> <a href="mailto:s-mart@support.com">s-mart@support.com</a></p>
        <p>For immediate assistance, call us during our support hours. We’re here to help with any inquiries related to orders, technical issues, or general questions.</p>
    </div>
</div>
@endsection
