<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>আমাদের সম্পর্কে - এগ্রো ফার্ম</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    body { font-family: 'Segoe UI', sans-serif; background-color: #f9f9f9; }
    .hero-section { background: url('images/farm-banner.jpg') center/cover no-repeat; color: white; padding: 150px 0; text-align: center; position: relative; }
    .hero-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); }
    .hero-content { position: relative; z-index: 1; }
    .hero-content h1 { font-size: 3.5rem; font-weight: bold; }
    .hero-content p { font-size: 1.2rem; }
    .section-title { color: #2e7d32; font-weight: bold; margin-bottom: 20px; }
    .timeline { border-left: 3px solid #2e7d32; padding-left: 20px; }
    .timeline div { margin-bottom: 20px; }
    .card-flip { perspective: 1000px; cursor: pointer; }
    .card-inner { position: relative; width: 100%; transition: transform 0.6s; transform-style: preserve-3d; }
    .card-flip:hover .card-inner { transform: rotateY(180deg); }
    .card-front, .card-back {
      position: absolute; width: 100%; backface-visibility: hidden; padding: 20px;
      border-radius: 8px; box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .card-back { background-color: #e8f5e9; transform: rotateY(180deg); }
    .owner-quote { font-style: italic; background-color: rgba(255,255,255,0.8); padding: 30px; border-radius: 8px; max-width: 600px; margin: auto; }
    .owner-section { background: url('images/owner-bg.jpg') center/cover fixed; padding: 100px 0; }
    .roadmap-step { background: #fff3e0; padding: 20px; border-radius: 8px; text-align: center; }
    .cta { background-color: #2e7d32; color: white; padding: 50px 20px; }
    .cta a { background-color: #f0ad4e; color: white; padding: 12px 30px; border-radius: 5px; text-decoration: none; animation: pulse 2s infinite; }
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
  </style>
</head>
<body>

<?php include('header.php'); ?>

<!-- Hero Section -->
<section class="hero-section">
  <div class="hero-overlay"></div>
  <div class="hero-content" data-aos="zoom-in">
    <h1>প্রকৃতির সাথে আমাদের যাত্রা</h1>
    <p>টেকসই কৃষি, নিরাপদ খাদ্য ও সুখী গ্রামীণ অর্থনীতি</p>
    <a href="amaderSheba.php" class="btn btn-warning btn-lg mt-3">আমাদের সেবা দেখুন</a>
  </div>
</section>

<!-- Journey -->
<section class="py-5">
  <div class="container">
    <h2 class="section-title text-center" data-aos="fade-up">আমাদের যাত্রা</h2>
    <div class="timeline">
      <div data-aos="fade-right"><strong>2015:</strong> ছোট একটি গরুর খামার দিয়ে শুরু</div>
      <div data-aos="fade-left"><strong>2017:</strong> মাছ চাষ যুক্ত</div>
      <div data-aos="fade-right"><strong>2020:</strong> অর্গানিক ফসল উৎপাদন</div>
      <div data-aos="fade-left"><strong>2023:</strong> অনলাইন অর্ডার সিস্টেম চালু</div>
      <div data-aos="fade-right"><strong>2025:</strong> কৃষি প্রশিক্ষণ সেন্টার প্রতিষ্ঠা</div>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title text-center" data-aos="fade-up">কেন আমাদের বেছে নেবেন?</h2>
    <div class="row g-4">
      <?php
      $features = [
        ["💚", "শতভাগ অর্গানিক", "নিরাপদ ও প্রাকৃতিক খাদ্য উৎপাদন।"],
        ["🐄", "উন্নত জাতের গবাদিপশু", "উচ্চমানের পশুপালন ব্যবস্থা।"],
        ["🌱", "পরিবেশ বান্ধব কৃষি", "প্রাকৃতিক ও টেকসই চাষাবাদ।"],
        ["📦", "হোম ডেলিভারি", "ঘরে বসে কৃষিপণ্য সরবরাহ।"],
        ["🎓", "কৃষি প্রশিক্ষণ", "কৃষকদের জন্য প্রশিক্ষণ ও ওয়ার্কশপ।"],
        ["🚜", "আধুনিক যন্ত্রপাতি", "উৎপাদনে স্মার্ট টেকনোলজি ব্যবহার।"]
      ];
      foreach ($features as $f) {
        echo "
        <div class='col-md-4' data-aos='zoom-in'>
          <div class='card-flip'>
            <div class='card-inner'>
              <div class='card-front bg-white text-center'>
                <h1>{$f[0]}</h1>
                <h5>{$f[1]}</h5>
              </div>
              <div class='card-back text-center'>
                <p>{$f[2]}</p>
              </div>
            </div>
          </div>
        </div>";
      }
      ?>
    </div>
  </div>
</section>

<!-- Owner's Thoughts with Parallax -->
<section class="owner-section text-center text-dark">
  <div class="owner-quote" data-aos="fade-up">
    "প্রকৃতি আমাদের মা, আমরা যদি তাকে যত্ন করি, সে আমাদের সুখ ও সমৃদ্ধি ফিরিয়ে দেবে। আমাদের ফার্মের প্রতিটি উদ্যোগের মূল লক্ষ্য মানুষ ও প্রকৃতির মাঝে এক সেতুবন্ধন তৈরি করা।"
    <br><strong>— জনাব করিম উদ্দিন</strong>
  </div>
</section>

<!-- Team -->
<section class="py-5">
  <div class="container">
    <h2 class="section-title text-center" data-aos="fade-up">আমাদের টিম</h2>
    <div class="row g-4">
      <?php
      $team = [
        ["farmer1.jpg", "মোঃ সাইফুল ইসলাম", "প্রধান কৃষি কর্মকর্তা", "প্রতিদিনের ছোট কাজই বড় পরিবর্তন আনে"],
        ["farmer2.jpg", "রিনা আক্তার", "পশু পরিচর্যা ইনচার্জ", "ভালোবাসা ও যত্নই পশুপালনের মূল রহস্য"],
        ["farmer3.jpg", "আব্দুল করিম", "মাছ চাষ বিশেষজ্ঞ", "পানি মানেই জীবন, তাই মাছ চাষও দায়িত্ব"]
      ];
      foreach ($team as $m) {
        echo "
        <div class='col-md-4 text-center' data-aos='fade-up'>
          <img src='images/{$m[0]}' class='rounded img-fluid mb-3 shadow'>
          <h5>{$m[1]}</h5>
          <p class='text-muted'>{$m[2]}</p>
          <em>\"{$m[3]}\"</em>
        </div>";
      }
      ?>
    </div>
  </div>
</section>

<!-- Roadmap -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title text-center" data-aos="fade-up">ভবিষ্যৎ রোডম্যাপ</h2>
    <div class="row g-4 text-center">
      <div class="col-md-4" data-aos="zoom-in"><div class="roadmap-step"><h4>2026</h4><p>এক্সপোর্ট শুরু</p></div></div>
      <div class="col-md-4" data-aos="zoom-in"><div class="roadmap-step"><h4>2027</h4><p>100% Renewable Energy Farm</p></div></div>
      <div class="col-md-4" data-aos="zoom-in"><div class="roadmap-step"><h4>2028</h4><p>দেশের সেরা অর্গানিক ফার্ম</p></div></div>
    </div>
  </div>
</section>



<?php include('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({ duration: 1000, once: true });
</script>
</body>
</html>
