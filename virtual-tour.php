<?php include 'header.php'; ?>

<!-- AOS Animation CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
  body {
    font-family: 'Noto Sans Bengali', sans-serif;
    margin: 0;
    background: #e6f7f4; /* Light teal background */
  }

  .container {
    width: 90%;
    max-width: 1000px;
    margin: auto;
    padding: 40px 0;
  }

  /* Video Container */
  .video-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 128, 128, 0.3);
    transition: transform 0.3s ease;
  }

  .video-container:hover {
    transform: scale(1.02);
  }

  .video-container iframe {
    position: absolute;
    top: 0; 
    left: 0;
    width: 100%;
    height: 100%;
  }

  /* Info Box */
  .info {
    background: white;
    padding: 25px;
    border-left: 6px solid #2e8b57;
    border-radius: 8px;
    margin-top: 20px;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
  }

  .info h3 {
    color: #00695c;
    margin-bottom: 10px;
  }

  .info p {
    font-size: 1.05em;
    color: #333;
  }

  /* Extra Content Section */
  .extra-section {
    margin-top: 50px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
  }

  .extra-card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 3px 8px rgba(0, 128, 128, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .extra-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 128, 128, 0.4);
  }

  .extra-card h4 {
    color: #00897b;
    margin-bottom: 10px;
  }

  .extra-card p {
    color: #444;
    font-size: 0.95em;
  }
</style>

<div class="container">
  <!-- Video Section -->
  <div class="video-container" data-aos="zoom-in" data-aos-duration="1000">
    <iframe src="https://www.youtube.com/embed/VID_ID" frameborder="0" allowfullscreen></iframe>
  </div>

  <!-- Info Section -->
  <div class="info" data-aos="fade-up" data-aos-duration="1200">
    <h3>খামারের একটি সার্বিক দৃশ্য</h3>
    <p>এই ভিডিওতে আমাদের খামারের প্রতিটি বিভাগ ঘুরে দেখানো হয়েছে — গরুর শেড, মাছের পুকুর, ছাগলের খামার এবং চাষের জমি। আধুনিক প্রযুক্তি ও অভিজ্ঞ ব্যবস্থাপনার মাধ্যমে আমরা একটি সবুজ ও টেকসই কৃষি পরিবেশ তৈরি করেছি।</p>
  </div>

  <!-- Extra Info Cards -->
  <div class="extra-section">
    <div class="extra-card" data-aos="fade-right" data-aos-duration="1000">
      <h4>🐄 পশুপালন</h4>
      <p>উন্নত জাতের গরু ও ছাগল পালন, দুধ ও মাংস সরবরাহ।</p>
    </div>
    <div class="extra-card" data-aos="fade-up" data-aos-duration="1000">
      <h4>🐟 মাছ চাষ</h4>
      <p>দেশীয় ও বিদেশী প্রজাতির মাছ উৎপাদন ও বাজারজাতকরণ।</p>
    </div>
    <div class="extra-card" data-aos="fade-left" data-aos-duration="1000">
      <h4>🌱 জৈব চাষাবাদ</h4>
      <p>কীটনাশকমুক্ত সবজি ও শস্য উৎপাদন।</p>
    </div>
  </div>
</div>

<!-- AOS Animation JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<?php include 'footer.php'; ?>
