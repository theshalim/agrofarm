<?php include 'header.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;700&display=swap" rel="stylesheet">
</head>
<!-- Slider 
<div class="slider" style="display:none;">
    <div class="slides">
        <div class="slide"><img src="Gallery/farm1.jpg" alt="ফার্ম দৃশ্য ১"></div>
        <div class="slide"><img src="Gallery/farm2.jpg" alt="ফার্ম দৃশ্য ২"></div>
        <div class="slide"><img src="Gallery/farm3.jpg" alt="ফার্ম দৃশ্য ৩"></div>
    </div>
    <button class="slider-btn left" onclick="moveSlide(-1)">&#8592;</button>
    <button class="slider-btn right" onclick="moveSlide(1)">&#8594;</button>
</div> -->
<!-- Hero Fullscreen Slide Start -->
<section class="hero-fullscreen-slide" style="background-image: url('Gallery/hero4.png');">
  <div class="hero-fullscreen-overlay"></div>
  <div class="hero-fullscreen-content">
    <div class="hero-fullscreen-label">
     
      <span>টেকসই কৃষিতে অভিজ্ঞ বিশেষজ্ঞ দল!</span>
    </div>
    <h1 class="hero-fullscreen-title">গড়ে তুলছি</h1>
    <div class="hero-fullscreen-subtitle">প্রকৃতি থেকে তাজা উপহার</div>
    <div class="hero-fullscreen-btn-row">
      <a href="ponnosomuho.php" class="hero-fullscreen-btn hero-fullscreen-btn-primary">
        আমাদের পণ্যসমূহ দেখুন
        <svg width="22" height="22" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
      </a>
    <a href="amaderSheba.php" class="hero-fullscreen-btn hero-fullscreen-btn-outline d-inline-flex align-items-center gap-2 text-decoration-none">
    <span>আমাদের সেবাসমূহ</span>
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
        <path d="M5 12h14M13 6l6 6-6 6" 
              stroke="currentColor" 
              stroke-width="2.2" stroke-linecap="round"  stroke-linejoin="round"/>
    </svg>
        </a>

    </div>
    <button class="hero-fullscreen-arrow left" onclick="moveSlide(-1)">&#8592;</button>
    <button class="hero-fullscreen-arrow right" onclick="moveSlide(1)">&#8594;</button>
  </div>
</section>
<!-- Hero Fullscreen Slide End -->
<style>
    .about-section {
        width: 78%;
        margin: 80px auto;
        background: linear-gradient(135deg, #f8fff4, #f0fdf4);
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        overflow: hidden;
        font-family: 'Segoe UI', sans-serif;
    }

    .about-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 40px;
    }

    /* Left text section */
    .about-text {
        flex: 1 1 45%;
        animation: fadeLeft 1s ease-out forwards;
        opacity: 0;
    }

    .about-tag {
        font-size: 14px;
        color: #16a34a;
        background: #dcfce7;
        padding: 4px 10px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 10px;
    }

    .about-text h2 {
        font-size: 28px;
        color: #064e3b;
        margin-bottom: 15px;
    }

    .about-text p {
        font-size: 16px;
        line-height: 1.6;
        color: #444;
        margin-bottom: 20px;
    }

    .about-stats {
        display: flex;
        gap: 20px;
    }

    .stat-box {
        background: white;
        padding: 15px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stat-box:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.12);
    }

    .stat-box img {
        width: 50px;
        height: 50px;
        object-fit: contain;
        margin-bottom: 8px;
    }

    .stat-icon {
        font-size: 32px;
        color: #10b981;
        margin-bottom: 8px;
    }

    /* Right images section */
    .about-images {
        flex: 1 1 50%;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 20px;
        animation: fadeRight 1s ease-out forwards;
        opacity: 0;
    }

    .img-card {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        background: white;
    }

    .img-card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        transition: transform 5s ease;
    }

    .img-card:hover img {
        transform: scale(1.1);
    }

    .img-card p {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: rgba(0,0,0,0.6);
        color: white;
        text-align: center;
        padding: 5px;
        font-size: 14px;
    }

    .img-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }

    /* Animations */
    @keyframes fadeLeft {
        from { transform: translateX(-40px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @keyframes fadeRight {
        from { transform: translateX(40px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    /* Responsive */
    @media(max-width: 768px) {
        .about-container {
            flex-direction: column;
        }
    }
</style>

<section class="about-section">
    <div class="about-container">
        <!-- Left Content -->
        <div class="about-text">
            <p class="about-tag">🌿 আমাদের প্রতিষ্ঠান সম্পর্কে</p>
            <h2>আমাদের এগ্রো ফার্ম বাংলাদেশের সর্ববৃহৎ অর্গানিক খামার</h2>
            <p>স্থায়ী কৃষি পদ্ধতিতে রাসায়নিক মুক্ত চাষ এবং প্রাকৃতিক যত্নে ভূমি সংরক্ষণ করা হয়। 
            অর্গানিক উৎপাদকরা স্বাস্থ্যকর মাটি তৈরি করে, নিরাপদ খাদ্য উৎপাদন করে এবং জীববৈচিত্র্য সংরক্ষণে ভূমিকা রাখে।</p>

            <div class="about-stats">
                <div class="stat-box">
                    <img src="Gallery/organic-certified.png" alt="Organic Certified" />
                    <p>সার্টিফায়েড অর্গানিক</p>
                </div>
                <div class="stat-box">
                    <div class="stat-icon">👍</div>
                    <p>সন্তুষ্ট ক্লায়েন্ট</p>
                </div>
            </div>
        </div>

        <!-- Right Images -->
        <div class="about-images">
            <div class="img-card">
                <img src="Gallery/farm-produce.jpg" alt="Farm Produce">
                <p>ফার্ম ফসল</p>
            </div>
            <div class="img-card">
                <img src="Gallery/natural-carrots.jpg" alt="Natural Carrots">
                <p>প্রাকৃতিক গাজর</p>
            </div>
            <div class="img-card">
                <img src="Gallery/milk-cow.jpg" alt="Milk Cow">
                <p>দুধ ও আরও অনেক কিছু</p>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector(".about-text").style.opacity = "1";
        document.querySelector(".about-images").style.opacity = "1";
    });
</script>



<!-- Gallery 
<div class="gallery">
    <img src="Gallery/cow.jpg" alt="গরু">
    <img src="Gallery/goat.jpg" alt="ছাগল">
    <img src="Gallery/fish.jpg" alt="মাছ">
    <img src="Gallery/fruit.jpg" alt="ফল">
</div> -->


<!-- Hero Section1 -->
 <!-- Hero Section Start -->
<section class="hero-section">
  <div class="hero-row">
    <div class="hero-col hero-content">
      <div class="hero-label">
        <svg width="28" height="28" fill="none" class="icon">
          <path d="M14 25v-7M14 18s1.5-4 6-4 6 4 6 4M14 18s-1.5-4-6-4-6 4-6 4M14 25s0 4-4 4-4-4-4-4M14 25s0 4 4 4 4-4 4-4" stroke="#2d572c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <circle cx="14" cy="9" r="5" stroke="#2d572c" stroke-width="2"/>
        </svg>
        <span>ফার্ম সম্পর্কে</span>
      </div>
      <h1 class="hero-title">আমাদের এগ্রো ফার্ম — অঞ্চলের বৃহত্তম খামার ২০২৩ সাল থেকে বিশ্বস্ত উৎপাদন</h1>
      <p class="hero-desc">
        অর্গানিক কৃষি সুস্থ মাটিকে লালন করে, যেখানে কৃষকরা ক্ষতিকর রাসায়নিক ছাড়াই ফসল উৎপাদন করেন — যা নিরাপদ খাদ্য ও পরিবেশের ভারসাম্য নিশ্চিত করে।
      </p>
      <ul class="hero-features">
        <li>✅ রিয়েল-টাইম ট্র্যাকিং</li>
        <li>✅ কাস্টমাইজেবল ফল সমাধান</li>
        <li>✅ সময়মত ডেলিভারি</li>
        <li>✅ গ্রাহক সহায়তা</li>
      </ul>
      <div class="hero-actions">
        <a href="about.php" class="hero-btn">আমাদের সম্পর্কে আরও জানুন</a>
        <div class="hero-phone-group">
          <svg width="28" height="28" fill="none" class="phone-icon">
            <circle cx="14" cy="14" r="14" fill="#f6e37a"/>
            <path d="M10.5 10.5c.5 2 2 4 4 4.5l1.5-1.5c.2-.2.5-.2.7 0l2 2c.2.2.2.5 0 .7l-1 1c-.3.3-.8.4-1.2.3-2.5-.7-4.5-2.7-5.2-5.2-.1-.4 0-.9.3-1.2l1-1c.2-.2.5-.2.7 0l2 2c.2.2.2.5 0 .7l-1.5 1.5z" stroke="#2d572c" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="hero-phone-label">ফোন:</span>
          <span class="hero-phone-number">+880 1734898751</span>
        </div>
      </div>
    </div>
    <div class="hero-col hero-image-col">
      <div class="hero-stats-card">
        <h3 class="hero-stats-label">আস্থা অর্জনে প্রতিশ্রুতিবদ্ধ</h3>
        <div class="hero-stats-number">150+</div>
        <p class="hero-stats-desc">প্রাকৃতিক পদ্ধতিতে উৎপাদন, মাটি ও পানির সুরক্ষায় অঙ্গীকারবদ্ধ।</p>
      </div>
      <img src="Gallery/farm2.jpg" alt="Organic Farm" class="hero-main-image">
    </div>
  </div>
</section>
<style>
/* CSS */
.hero-section {
  padding: 60px 20px;
  background: linear-gradient(to right, #f0fdf4, #e6ffe6);
  font-family: 'Segoe UI', sans-serif;
  animation: fadeIn 1.2s ease-in;
}

.hero-row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

.hero-col {
  flex: 1 1 45%;
  margin: 20px;
}

.hero-label {
  display: flex;
  align-items: center;
  font-size: 18px;
  color: #2d572c;
  margin-bottom: 10px;
}

.icon {
  margin-right: 8px;
}

.hero-title {
  font-size: 32px;
  color: #1b3b1b;
  margin-bottom: 20px;
  animation: slideUp 1s ease-out;
}

.hero-desc {
  font-size: 16px;
  color: #444;
  margin-bottom: 20px;
  line-height: 1.6;
}

.hero-features {
  list-style: none;
  padding: 0;
  margin-bottom: 20px;
}

.hero-features li {
  margin-bottom: 8px;
  font-weight: 500;
  color: #2d572c;
  animation: fadeInUp 0.5s ease forwards;
}

.hero-btn {
  display: inline-block;
  padding: 12px 20px;
  background-color: #2d572c;
  color: #fff;
  border-radius: 6px;
  text-decoration: none;
  transition: background 0.3s ease;
}

.hero-btn:hover {
  background-color: #1f3f1f;
}

.hero-phone-group {
  display: flex;
  align-items: center;
  margin-top: 15px;
  font-size: 16px;
  color: #2d572c;
}

.phone-icon {
  margin-right: 8px;
}

.hero-stats-card {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  text-align: center;
  animation: zoomIn 0.8s ease;
}

.hero-stats-label {
  font-size: 18px;
  color: #2d572c;
  margin-bottom: 10px;
}

.hero-stats-number {
  font-size: 36px;
  font-weight: bold;
  color: #1b3b1b;
}

.hero-stats-desc {
  font-size: 14px;
  color: #555;
}

.hero-main-image {
  width: 100%;
  border-radius: 12px;
  margin-top: 20px;
  animation: fadeIn 1.5s ease;
}

/* Animations */
@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes slideUp {
  from {transform: translateY(30px); opacity: 0;}
  to {transform: translateY(0); opacity: 1;}
}

@keyframes fadeInUp {
  from {opacity: 0; transform: translateY(10px);}
  to {opacity: 1; transform: translateY(0);}
}

@keyframes zoomIn {
  from {transform: scale(0.8); opacity: 0;}
  to {transform: scale(1); opacity: 1;}
}
</style>

<!-- Hero Section End -->





<!-- Agriculture Products -->
  <!-- HTML -->
<section class="main-sectionanimation">
  <div class="product-tabs">
    <button class="product-tab active" onclick="switchTab(0)">কৃষিপণ্য</button>
    <div class="tab-divider"></div>
    <button class="product-tab" onclick="switchTab(1)">শুদ্ধ গরুর দুধ</button>
    <div class="tab-divider"></div>
    <button class="product-tab" onclick="switchTab(2)">কন্দ ও ফল</button>
  </div>

  <div class="product-content-row fade-in">
    <div class="product-info">
      <div class="product-icon-bg">
        <!-- SVG Icon -->
        <svg viewBox="0 0 48 48" fill="none">
          <path d="M24 36V28M24 28C24 28 25.5 24 30 24C34.5 24 36 28 36 28M24 28C24 28 22.5 24 18 24C13.5 24 12 28 12 28M24 36C24 36 24 40 20 40C16 40 16 36 16 36M24 36C24 36 24 40 28 40C32 40 32 36 32 36" stroke="#2d572c" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
          <circle cx="24" cy="16" r="6" stroke="#2d572c" stroke-width="2.5"/>
        </svg>
      </div>
      <div>
        <div class="product-title">কৃষিপণ্য!</div>
        <div class="product-desc">
          উইন্ডেল বেরি একবার বলেছিলেন, “খাওয়াটা নিজেই একটি কৃষিকর্ম।” <br>
          আমাদের লক্ষ্য হলো—শিল্পভিত্তিক খাবারের বিকল্প হিসেবে স্বাস্থ্যকর, <br>সতেজ ও প্রাকৃতিক খাদ্য সরবরাহ করে খাদ্যব্যবস্থায় পরিবর্তন আনা।
        </div>
        <a href="virtual-tour.php" class="details-btn">
          ডিটেইলস দেখুন
          <svg viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
        </a>
      </div>
    </div>
    <div class="product-image">
      <img src="Gallery/hero2.jpg" alt="Agriculture Products" class="animated-img">
    </div>
  </div>
</section>
<style>
/* CSS */
.main-sectionanimation {
  width:78%;
  margin: 0 auto;
  padding: 40px;
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(to right, #f0fdf4, #e6ffe6);
  animation: fadeIn 1s ease-in;
}

.product-tabs {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 30px;
}

.product-tab {
  background: #2d572c;
  color: #fff;
  border: none;
  padding: 12px 24px;
  margin: 0 5px;
  font-size: 18px;
  border-radius: 6px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.product-tab:hover {
  background: #3e7c45;
}

.product-tab.active {
  background: #1b3f1a;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

.tab-divider {
  width: 2px;
  height: 24px;
  background: #ccc;
}

.product-content-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 40px;
  flex-wrap: wrap;
}

.product-info {
  flex: 1;
  animation: slideInLeft 1s ease;
}

.product-icon-bg svg {
  width: 60px;
  height: 60px;
  margin-bottom: 20px;
  animation: pulse 2s infinite;
}

.product-title {
  font-size: 28px;
  font-weight: bold;
  color: #2d572c;
  margin-bottom: 10px;
}

.product-desc {
  font-size: 18px;
  line-height: 1.6;
  color: #444;
  margin-bottom: 20px;
}

.details-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #2d572c;
  color: white;
  padding: 10px 20px;
  border-radius: 6px;
  text-decoration: none;
  transition: background 0.3s ease;
}

.details-btn:hover {
  background: #3e7c45;
}

.product-image img {
  width: 100%;
  max-width: 600px;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  animation: slideInRight 1s ease;
}

/* Animations */
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideInLeft {
  from { transform: translateX(-50px); opacity: 0; }
  to { transform: translateX(0); opacity: 1; }
}

@keyframes slideInRight {
  from { transform: translateX(50px); opacity: 0; }
  to { transform: translateX(0); opacity: 1; }
}

@keyframes pulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.1); }
}</style>
<!--=======================================-->
<?php
require 'php/config.php';
$stmt = $conn->query("SELECT * FROM dashboard_counts ORDER BY id DESC LIMIT 1");
$data = $stmt->fetch();
?>

<style>
    .farm-success-section {
        background: linear-gradient(135deg, #e8f5e9, #f0f4f3);
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        max-width: calc(1200px + 100px); /* 100px wider */
        margin: 80px auto; /* top-bottom gap between sections */
        font-family: 'Segoe UI', sans-serif;
    }

    .farm-success-section h2 {
        text-align: center;
        font-size: 32px;
        font-weight: bold;
        color: #2d572c;
        margin-bottom: 20px;
    }

    .farm-success-section p {
        text-align: center;
        font-size: 18px;
        color: #555;
        max-width: 800px;
        margin: 0 auto 40px;
    }

    .success-stats {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px;
    }

    .stat-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        width: 200px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    .stat-number {
        font-size: 2em;
        font-weight: bold;
        color: teal;
    }

    .stat-label {
        font-size: 16px;
        color: #444;
        margin-top: 8px;
    }

    @keyframes fadeUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
</style>


<div class="farm-success-section" id="success">
    <h2>সাফল্যের গল্প</h2>
    <p>
        মাত্র ২০টি গরু নিয়ে ২০২৩ সালে আমাদের যাত্রা শুরু।  
        আজ আমরা গড়ে তুলেছি বাংলাদেশের অন্যতম বৃহৎ কৃষি প্রতিষ্ঠান —  
        যেখানে গরু, ছাগল, মাছ, ফল ও সবজি উৎপাদনে রয়েছে আমাদের সাফল্য।
    </p>

    <div class="success-stats">
        <div class="stat-card" style="animation-delay: 0.2s;">
            <div class="stat-number" data-count="<?= is_numeric($data['cow_count']) ? $data['cow_count'] : 0 ?>">0</div>
            <div class="stat-label">গরুর সংখ্যা</div>
        </div>
        <div class="stat-card" style="animation-delay: 0.4s;">
            <div class="stat-number" data-count="<?= is_numeric($data['goat_count']) ? $data['goat_count'] : 0 ?>">0</div>
            <div class="stat-label">ছাগলের সংখ্যা</div>
        </div>
        <div class="stat-card" style="animation-delay: 0.6s;">
            <div class="stat-number" data-count="<?= is_numeric($data['fish_count']) ? $data['fish_count'] : 0 ?>">0</div>
            <div class="stat-label">মাছের পুকুর</div>
        </div>
        <div class="stat-card" style="animation-delay: 0.8s;">
            <div class="stat-number" data-count="<?= is_numeric($data['fruit_count']) ? $data['fruit_count'] : 0 ?>">0</div>
            <div class="stat-label">সবজি ও ফলফলাদি</div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll('.stat-number');
    const cards = document.querySelectorAll('.stat-card');

    // Animate cards on load
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = 1;
            card.style.animation = "fadeUp 0.6s ease forwards";
        }, index * 200);
    });

    // Counter animation
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-count');
        const duration = 2000;
        let start = 0;
        const increment = target / (duration / 16);

        function updateCounter() {
            start += increment;
            if (start < target) {
                counter.innerText = Math.floor(start);
                requestAnimationFrame(updateCounter);
            } else {
                counter.innerText = target.toLocaleString();
            }
        }
        updateCounter();
    });
});
</script>


<!-- ===== Courses Section ===== -->
<div class="main-sectionCourses" id="courses">
    <h1>কোর্সসমূহ</h1>
    <div class="courses">
        <div class="course-card" onclick="showModal(0)">
            <h3>গরু পালন প্রশিক্ষণ</h3>
            <p>গরু পালন ও দুধ উৎপাদনের আধুনিক কৌশল।</p>
        </div>

        <div class="course-card" onclick="showModal(1)">
            <h3>ছাগল পালন কোর্স</h3>
            <p>ছাগল পালন ও স্বাস্থ্য ব্যবস্থাপনা।</p>
        </div>

        <div class="course-card" onclick="showModal(2)">
            <h3>মাছ চাষ কর্মশালা</h3>
            <p>উন্নত মাছ চাষ ও বাজারজাতকরণ।</p>
        </div>

        <div class="course-card" onclick="showModal(3)">
            <h3>ফল চাষ প্রশিক্ষণ</h3>
            <p>ফল চাষ ও সংরক্ষণের প্রযুক্তি।</p>
        </div>
    </div>
</div>

<!-- ===== Modal ===== -->
<div id="courseModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">কোর্সের শিরোনাম</h3>
            <button onclick="closeModal()" class="close-btn btn">Close</button>
        </div>
        <div class="modal-body" id="modalDescription">
            কোর্সের বিস্তারিত তথ্য এখানে থাকবে।
        </div>
        <div class="modal-footer">
            <a href="#" class="contact-btn btn">যোগাযোগ করুন</a>
        </div>
    </div>
</div>

<!-- ===== Styles ===== -->
<style>
.main-sectionCourses {
    width: 78%;
    margin: 60px auto;
    text-align: center;
    padding: 40px 0;
}

.main-sectionCourses h2 {
    font-size: 2rem;
    margin-bottom: 30px;
    color: #2c3e50;
}

/* Courses grid */
.courses {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 32px;
}

/* Cute & animated cards */
.course-card {  
    background: linear-gradient(135deg, #fdfbfb, #ebedee);
    padding: 10px 10px;
    margin: 10px;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.course-card h3 {
    font-size: 1.3rem;
    margin-bottom: 10px;
    color: #34495e;
}

.course-card p {
    font-size: 0.95rem;
    color: #555;
}

.course-card:hover {
    transform: translateY(-8px) scale(1.03);
    background: linear-gradient(135deg, #e0f7fa, #e1f5fe);
    border-color: #4db6ac;
    box-shadow: 0 8px 18px rgba(0,0,0,0.12);
}

/* ===== Modal Styles ===== */
.modal {
    display: none;
    position: fixed;
    z-index: 999;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0, 150, 136, 0.25);
    animation: fadeIn 0.28s ease;
    align-items: center;
    justify-content: center;
    padding: 10px;
}

.modal-content {
    background-color: #ffffff;
    border-radius: 14px;
    width: 90%;
    max-width: 520px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.25);
    animation: zoomIn 0.32s ease;
    overflow: hidden;
}

.modal-header {
    background: linear-gradient(135deg, #80cbc4, #4db6ac);
    color: white;
    padding: 12px 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    margin: 0;
    font-size: 1.15rem;
}

.modal-body {
    padding: 16px;
    font-size: 1rem;
    color: #444;
    line-height: 1.6;
}

.modal-footer {
    padding: 12px 16px;
    text-align: right;
    background: #f7fdfc;
    border-top: 1px solid #ddd;
}

.btn {
    display: inline-block;
    padding: 8px 14px;
    border-radius: 8px;
    text-decoration: none;
    margin-left: 8px;
    font-weight: 700;
}

.contact-btn { background: #4db6ac; color: white; }
.close-btn { background: #ccc; color: #333; }

@keyframes fadeIn { from { opacity: 0 } to { opacity: 1 } }
@keyframes zoomIn { from { transform: scale(0.96); opacity: 0 } to { transform: scale(1); opacity: 1 } }
</style>

<!-- ===== Script ===== -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    // Course data
    window.courseDetails = [
        {
            title: "গরু পালন প্রশিক্ষণ",
            description: "এই কোর্সে শিখবেন গরু লালনের আধুনিক পদ্ধতি, খাদ্য পরিকল্পনা, গাভী থেকে দুধ উৎপাদন ও রোগ প্রতিরোধ ব্যবস্থা।"
        },
        {
            title: "ছাগল পালন কোর্স",
            description: "ছাগল পালন, প্রজনন, চিকিৎসা ও বাজারজাতকরণ নিয়ে সম্পূর্ণ গাইডলাইন এই কোর্সে অন্তর্ভুক্ত।"
        },
        {
            title: "মাছ চাষ কর্মশালা",
            description: "উন্নত হ্যাচারি ব্যবস্থাপনা, পুকুর প্রস্তুতি, পোনা নির্বাচন ও বাজার ব্যবস্থাপনা শেখানো হবে।"
        },
        {
            title: "ফল চাষ প্রশিক্ষণ",
            description: "ফল চাষে সার ব্যবস্থাপনা, কীটনাশক ব্যবহার, সংরক্ষণ ও পরিবহন কৌশল শেখানো হবে।"
        }
    ];

    // Modal functions
    window.showModal = function(index) {
        const modal = document.getElementById('courseModal');
        const titleEl = document.getElementById('modalTitle');
        const descEl = document.getElementById('modalDescription');
        const course = window.courseDetails[index];
        if (course) {
            titleEl.innerText = course.title;
            descEl.innerText = course.description;
            modal.style.display = 'flex';
        }
    };

    window.closeModal = function() {
        document.getElementById('courseModal').style.display = 'none';
    };

    // Close modal if click outside content
    window.addEventListener('click', function(e) {
        const modal = document.getElementById('courseModal');
        if (modal && e.target === modal) modal.style.display = 'none';
    });

});
</script>




<!-- Map & Contact --><!-- Map & Contact -->
<!-- Map & Contact -->
<div class="main-section-contact-section" id="contact">
    <h2>ফার্মের অবস্থান ও যোগাযোগ</h2>

    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.902269873556!2d90.39181211536327!3d23.750903794590975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b92f2470ab1f%3A0x9bbf32d7f1e7f3e0!2sDhaka!5e0!3m2!1sen!2sbd!4v1693210112345" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <div class="contact-info">
        <p><strong>ঠিকানা:</strong> গ্রাম-নবীনগর, উপজেলা-শিবপুর, জেলা-নরসিংদী</p>
        <p><strong>ফোন:</strong> +880 173489751</p>
        <p><strong>ইমেইল:</strong> info@agrofarm.com</p>
    </div>
</div>

<!-- Styles -->
<style>
.main-section-contact-section {
    width: 78%;
    margin: 50px auto;
    padding: 30px;
    background: linear-gradient(135deg, #f0fdfa, #e0f2f1);
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

.main-section-contact-section h2 {
    text-align: center;
    font-size: 1.8rem;
    margin-bottom: 25px;
    color: #2c3e50;
}

.map-container {
    width: 100%;
    height: 400px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.12);
    margin-bottom: 20px;
}

.contact-info {
    text-align: center;
    font-size: 1rem;
    color: #333;
    line-height: 1.6;
}

.contact-info p {
    margin: 6px 0;
}

.contact-info strong {
    color: #00796b;
}
</style>

<?php include 'footer.php'; ?>