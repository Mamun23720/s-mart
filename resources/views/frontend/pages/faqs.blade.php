@extends('frontend.master')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        line-height: 1.8;
        color: #333;
    }

    .faq-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .faq-container h1 {
        font-size: 28px;
        margin-bottom: 20px;
        text-align: center;
    }

    .faq-container h2 {
        font-size: 20px;
        margin-top: 20px;
        color: #007BFF;
    }

    .faq-container p {
        margin-bottom: 15px;
    }

    .faq-item {
        margin-bottom: 30px;
    }
</style>

<div class="faq-container">
    <h1><b>FAQs</b></h1>

    <div class="faq-item">
        <h2>1. What is S-Mart?</h2>
        <p>S-Mart is an online store offering a wide range of fashion items for men, women, and kids, as well as accessories. We aim to provide stylish, high-quality products at affordable prices.</p>
    </div>

    <div class="faq-item">
        <h2>2. How do I place an order?</h2>
        <p>To place an order, simply browse our categories, add items to your cart, and proceed to checkout. You can create an account for faster checkouts and order tracking or continue as a guest.</p>
    </div>

    <div class="faq-item">
        <h2>3. What payment methods do you accept?</h2>
        <p>We accept major credit cards, debit cards, digital wallets (like PayPal), and other secure payment methods depending on your location.</p>
    </div>

    <div class="faq-item">
        <h2>4. Do you offer free shipping?</h2>
        <p>We offer free shipping on orders above a certain amount. Please check our Shipping Policy for more details.</p>
    </div>

    <div class="faq-item">
        <h2>5. How long will it take to receive my order?</h2>
        <p>Delivery times vary based on your location and the shipping option chosen. Typically, orders are delivered within 5-7 business days. You will receive a tracking number once your order ships.</p>
    </div>

    <div class="faq-item">
        <h2>6. Can I return or exchange an item?</h2>
        <p>Yes, we have a hassle-free return and exchange policy. Items can be returned or exchanged within 30 days of purchase, provided they are unused and in their original packaging. Visit our Return Policy page for more details.</p>
    </div>

    <div class="faq-item">
        <h2>7. How do I contact customer support?</h2>
        <p>You can reach us via email at support@s-mart.com or call our customer service line at [insert phone number]. Our team is available Monday to Friday, 9 AM to 6 PM.</p>
    </div>

    <div class="faq-item">
        <h2>8. Are your products true to size?</h2>
        <p>We provide a detailed size guide for each product to help you find the perfect fit. Please refer to it before making a purchase.</p>
    </div>

    <div class="faq-item">
        <h2>9. Do you offer discounts or promotions?</h2>
        <p>Yes, we regularly offer discounts and promotions. Subscribe to our newsletter or follow us on social media to stay updated.</p>
    </div>

    <div class="faq-item">
        <h2>10. Can I track my order?</h2>
        <p>Absolutely! Once your order is shipped, we’ll send you a tracking number. You can use it to track your order on our website.</p>
    </div>

    <div class="faq-item">
        <h2>11. Do you ship internationally?</h2>
        <p>Yes, we ship to select international destinations. Please check our Shipping Policy for more information.</p>
    </div>

    <div class="faq-item">
        <h2>12. How do I cancel or modify my order?</h2>
        <p>You can cancel or modify your order within 24 hours of placing it by contacting our customer support team.</p>
    </div>

    <div class="faq-item">
        <h2>13. Are my personal details secure?</h2>
        <p>Your privacy and security are our priority. We use advanced encryption to protect your information. For more details, visit our Privacy Policy page.</p>
    </div>

    <div class="faq-item">
        <h2>14. Do you have a loyalty program?</h2>
        <p>Yes, we reward our loyal customers with exclusive discounts, early access to sales, and more. Check out our Loyalty Program page for details.</p>
    </div>
</div>
@endsection
