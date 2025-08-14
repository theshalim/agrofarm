<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Farm Fresh Experience</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      color: #333;
    }

    .container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(2, auto);
      gap: 20px;
      padding: 40px;
      max-width: 1200px;
      margin: auto;
    }

    .block {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      overflow: hidden;
      position: relative;
    }

    .block img {
      width: 100%;
      border-radius: 10px;
      animation: slideLeft 10s linear infinite;
    }

    @keyframes slideLeft {
      0% { transform: translateX(100%); }
      100% { transform: translateX(-100%); }
    }

    h2 {
      margin-top: 0;
      color: #2e7d32;
    }

    .button {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      background: #2e7d32;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }

    .testimonial {
      font-style: italic;
      margin-top: 10px;
    }

    .product-list {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
    }

    .product {
      background: #e8f5e9;
      padding: 10px;
      border-radius: 5px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="block">
      <h2>Ready to Experience the Best of Farming?</h2>
      <p>Visit Us & See the Farm in Action</p>
      <a href="#" class="button">Visit Our Farms</a>
      <img src="farm1.jpg" alt="Farm Scene">
    </div>

    <div class="block">
      <h2>Latest Updates</h2>
      <ul>
        <li>The Benefits of Cover Crops for Soil Health</li>
        <li>Harvest Season: What’s in Your CSA Box This Year?</li>
        <li>How You Reduce Waste & Support Sustainability</li>
      </ul>
      <a href="#" class="button">Read More Posts</a>
      <img src="update.jpg" alt="Updates">
    </div>

    <div class="block">
      <h2>Eat Fresh. Eat Local. Eat with Us.</h2>
      <p>Shop Now from Farm to Table. Get the highest quality organic produce delivered to your doorstep.</p>
      <a href="#" class="button">Start Shopping</a>
      <img src="produce.jpg" alt="Produce">
    </div>

    <div class="block">
      <h2>Your Organic Essentials, Delivered</h2>
      <ul>
        <li>Wide variety of organic items</li>
        <li>Support sustainable farming</li>
        <li>Save time and money</li>
      </ul>
      <a href="#" class="button">See the Full Details</a>
      <a href="#" class="button">Subscribe Now</a>
      <img src="delivery.jpg" alt="Delivery">
    </div>

    <div class="block">
      <h2>Customer Testimonials</h2>
      <p class="testimonial">“I can’t imagine going back to grocery store produce. The quality is unmatched!”</p>
      <p class="testimonial">“The variety and quality are top-notch. I love supporting local farmers.”</p>
      <img src="testimonial.jpg" alt="Happy Customer">
    </div>

    <div class="block">
      <h2>Featured Products</h2>
      <div class="product-list">
        <div class="product">Heirloom Tomato</div>
        <div class="product">Organic Eggplant</div>
        <div class="product">Soft Whole Wheat</div>
        <div class="product">Free Range Eggs</div>
        <div class="product">Organic Zucchini</div>
        <div class="product">Yellow Chili Pepper</div>
        <div class="product">Organic Peach</div>
        <div class="product">Bell Pepper</div>
      </div>
      <img src="products.jpg" alt="Products">
    </div>
  </div>
</body>
</html>