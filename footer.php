<style>
  footer {
    background-color: teal; /* Full teal background */
    color: white;
    padding: 40px 0 20px;
    width: 100%;
  }

  .footer-container {
    max-width: 1200px;
    width: 80%;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
  }

  .footer-section {
    flex: 1;
    min-width: 250px;
  }

  .footer-links {
    text-align: left;
  }

  .footer-links h4,
  .footer-info h4,
  .footer-description h4 {
    margin-bottom: 10px;
    font-size: 1.1em;
    border-bottom: 1px solid #a5d6a7;
    padding-bottom: 5px;
  }

  .footer-links a {
    display: block;
    color: #ffd600;
    text-decoration: none;
    margin: 6px 0;
    font-size: 0.95em;
  }

  .footer-links a:hover {
    text-decoration: underline;
  }

  .footer-info {
    text-align: right;
  }

  .footer-info p {
    font-size: 0.9em;
    line-height: 1.6;
    margin: 6px 0;
  }

  .footer-description {
    text-align: center;
    flex: 2;
  }

  .footer-description p {
    font-size: 0.95em;
    line-height: 1.6;
    max-width: 500px;
    margin: 0 auto;
  }

  .footer-bottom {
    text-align: center;
    font-size: 0.85em;
    color: #c8e6c9;
    margin-top: 30px;
  }

  @media (max-width: 768px) {
    .footer-container {
      flex-direction: column;
      text-align: center;
    }

    .footer-links,
    .footer-info {
      text-align: center;
    }

    .footer-description {
      order: -1;
    }
  }
</style>

<footer>
  <div class="footer-container">
    <!-- Footer Links -->
    <div class="footer-section footer-links">
      <h4>দ্রুত লিংক</h4>
      <a href="index.php">হোম</a>
      <a href="about.php">আমাদের সম্পর্কে</a>
      <a href="services.php">সেবা</a>
      <a href="ponnosomuho.php">পণ্যসমূহ</a>
      <a href="events.php">ইভেন্ট</a>
      <a href="blog.php">ব্লগ</a>
      <a href="contact.php">যোগাযোগ</a>
    </div>

    <!-- Footer Description -->
    <div class="footer-section footer-description">
      <h4>আমাদের অ্যাগ্রো ফার্ম</h4>
      <p>
        আমরা একটি আধুনিক ও পরিবেশবান্ধব কৃষি প্রতিষ্ঠান, যা গবাদিপশু পালন, মাছ চাষ ও অর্গানিক কৃষিপণ্যের উৎপাদনে বিশ্বস্ততা ও মান বজায় রেখে কাজ করে চলেছি।
      </p>
    </div>

    <!-- Footer Info -->
    <div class="footer-section footer-info">
      <h4>যোগাযোগ</h4>
      <p>📍 ঠিকানা: গ্রিনভ্যালি, মিরপুর, ঢাকা</p>
      <p>📞 ফোন: ০১২৩৪৫৬৭৮৯০</p>
      <p>✉️ ইমেইল: info@amaderagrofarm.com</p>
    </div>
  </div>

  <div class="footer-bottom">
    &copy; <?php echo date('Y'); ?> আমাদের অ্যাগ্রো ফার্ম — সর্বস্বত্ব সংরক্ষিত
  </div>
</footer>
