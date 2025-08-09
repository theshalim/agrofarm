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
        <svg width="28" height="28" fill="none" style="vertical-align:middle;margin-right:6px;">
          <path d="M14 25v-7M14 18s1.5-4 6-4 6 4 6 4M14 18s-1.5-4-6-4-6 4-6 4M14 25s0 4-4 4-4-4-4-4M14 25s0 4 4 4 4-4 4-4" stroke="#2d572c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <circle cx="14" cy="9" r="5" stroke="#2d572c" stroke-width="2"/>
        </svg>
        ফার্ম সম্পর্কে
      </div>
      <h1 class="hero-title">আমাদের এগ্রো ফার্ম — অঞ্চলের বৃহত্তম খামার <br> ২০২৩ সাল থেকে বিশ্বস্ত উৎপাদন</h1>
      <div class="hero-desc">
        অর্গানিক কৃষি সুস্থ মাটিকে লালন করে, যেখানে কৃষকরা ক্ষতিকর রাসায়নিক ছাড়াই ফসল উৎপাদন করেন — যা নিরাপদ খাদ্য ও পরিবেশের ভারসাম্য নিশ্চিত করে। প্রাকৃতিক পদ্ধতি মাটির উর্বরতা বৃদ্ধি করে, দূষণ কমায় এবং এমন সতেজ ফলন সরবরাহ করে যা মানুষ ও প্রকৃতি—দু’টোকেই সহায়তা করে।
      </div>
      <div class="hero-features">
        <div><span class="hero-check">&#10003;</span> রিয়েল-টাইম ট্র্যাকিং</div>
        <div><span class="hero-check">&#10003;</span> কাস্টমাইজেবল ফল সমাধান</div>
        <div><span class="hero-check">&#10003;</span> সময়মত ডেলিভারি</div>
        <div><span class="hero-check">&#10003;</span> গ্রাহক সহায়তা</div>
      </div>
      <div class="hero-actions">
        <a href="about.php" class="hero-btn">
          আমাদের সম্পর্কে আরও জানুন
          <svg width="22" height="22" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
        </a>
        <span class="hero-phone-group">
          <span class="hero-phone-icon">
            <svg width="28" height="28" fill="none"><circle cx="14" cy="14" r="14" fill="#f6e37a"/><path d="M10.5 10.5c.5 2 2 4 4 4.5l1.5-1.5c.2-.2.5-.2.7 0l2 2c.2.2.2.5 0 .7l-1 1c-.3.3-.8.4-1.2.3-2.5-.7-4.5-2.7-5.2-5.2-.1-.4 0-.9.3-1.2l1-1c.2-.2.5-.2.7 0l2 2c.2.2.2.5 0 .7l-1.5 1.5z" stroke="#2d572c" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </span>
          <span class="hero-phone-label">ফোন:</span>
          <span class="hero-phone-number">+880 1734898751</span>
        </span>
      </div>
    </div>
    <div class="hero-col hero-image-col">
      <div class="hero-stats-card">
        <div class="hero-stats-label">আস্থা অর্জনে প্রতিশ্রুতিবদ্ধ</div>
        <div class="hero-stats-number">1000+</div>
        <div class="hero-stats-desc">
          প্রাকৃতিক পদ্ধতিতে উৎপাদন, মাটি ও পানির সুরক্ষায় অঙ্গীকারবদ্ধ।
        </div>
      </div>
      <img src="Gallery/farm2.jpg" alt="Organic Farm" class="hero-main-image">
    </div>
  </div>
</section>
<!-- Hero Section End -->





<!-- Agriculture Products -->
   <section class="main-section">
  <div class="product-tabs">
    <button class="product-tab active">কৃষিপণ্য</button>
    <div class="tab-divider"></div>
    <button class="product-tab">শুদ্ধ গরুর দুধ</button>
    <div class="tab-divider"></div>
    <button class="product-tab">কন্দ ও ফল</button>

  </div>
  <div class="product-content-row">
    <div class="product-info">
      <div class="product-icon-bg">
        <!-- Plant SVG Icon -->
        <svg viewBox="0 0 48 48" fill="none">
          <path d="M24 36V28M24 28C24 28 25.5 24 30 24C34.5 24 36 28 36 28M24 28C24 28 22.5 24 18 24C13.5 24 12 28 12 28M24 36C24 36 24 40 20 40C16 40 16 36 16 36M24 36C24 36 24 40 28 40C32 40 32 36 32 36" stroke="#2d572c" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
          <circle cx="24" cy="16" r="6" stroke="#2d572c" stroke-width="2.5"/>
        </svg>
      </div>
      <div>
        <div class="product-title">কৃষিপণ্য!</div>
        <div class="product-desc">
          উইন্ডেল বেরি একবার বলেছিলেন, “খাওয়াটা নিজেই একটি কৃষিকর্ম।” <br>আমাদের লক্ষ্য হলো—শিল্পভিত্তিক খাবারের বিকল্প হিসেবে স্বাস্থ্যকর, সতেজ ও প্রাকৃতিক খাদ্য সরবরাহ করে খাদ্যব্যবস্থায় পরিবর্তন আনা।
        </div>
        <a href="virtual-tour.php" class="details-btn">
          ডিটেইলস দেখুন
          <svg viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
        </a>
      </div>
    </div>
    <div class="product-image">
      <img src="Gallery/hero2.jpg" alt="Agriculture Products">
    </div>
  </div>
</section>
<!-- Success Story -->
<style>
    .success-section {
        background: linear-gradient(135deg, #e0f7f4, #f3fff0);
        padding: 50px 20px;
        text-align: center;
        font-family: 'Noto Sans Bengali', sans-serif;
        animation: fadeIn 0.8s ease;
    }

    .success-section h2 {
        font-size: 2rem;
        color: #00796b;
        margin-bottom: 15px;
    }

    .success-section p {
        font-size: 1.1rem;
        color: #444;
        max-width: 800px;
        margin: 0 auto 40px;
        line-height: 1.6;
    }

    .success-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
        max-width: 900px;
        margin: 0 auto;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: slideUp 0.6s ease forwards;
        opacity: 0;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: bold;
        color: #00796b;
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 1rem;
        color: #555;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
</style>

<div class="success-section" id="success">
    <h2>সাফল্যের গল্প</h2>
    <p>মাত্র ২০টি গরু নিয়ে ২০২৩ সালে আমাদের যাত্রা শুরু। সেই ছোট্ট শুরু থেকেই নিরলস পরিশ্রম, সততা ও গুণগত মানকে অগ্রাধিকার দিয়ে আজ আমরা গড়ে তুলেছি বাংলাদেশের অন্যতম বৃহৎ কৃষি প্রতিষ্ঠান — আমাদের এগ্রো ফার্ম। আমরা শুধু গরুই নয়, সফলভাবে দুধ উৎপাদন, মাছ চাষ, ফল ও সবজি উৎপাদনেও নিজেদের শক্ত অবস্থান তৈরি করেছি।</p>

    <?php
    require 'php/config.php';
    $stmt = $conn->query("SELECT * FROM dashboard_counts WHERE id=1");
    $counts = $stmt->fetch();
    ?>

    <div class="success-stats">
        <div class="stat-card" style="animation-delay: 0.2s;">
            <div class="stat-number" data-count="<?php echo $counts['cows']; ?>">0</div>
            <div class="stat-label">গরুর সংখ্যা</div>
        </div>
        <div class="stat-card" style="animation-delay: 0.4s;">
            <div class="stat-number" data-count="<?php echo $counts['milk_production']; ?>">0</div>
            <div class="stat-label">দুধ উৎপাদন (লিটার)</div>
        </div>
        <div class="stat-card" style="animation-delay: 0.6s;">
            <div class="stat-number" data-count="<?php echo $counts['fish']; ?>">0</div>
            <div class="stat-label">মাছ উৎপাদন (কেজি)</div>
        </div>
        <div class="stat-card" style="animation-delay: 0.8s;">
            <div class="stat-number" data-count="<?php echo $counts['fruits']; ?>">0</div>
            <div class="stat-label">ফল উৎপাদন (কেজি)</div>
        </div>
    </div>
</div>

<script>
    // Animated counter
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.stat-number');
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
                    counter.innerText = target;
                }
            }
            updateCounter();
        });

        // Reveal animation for cards
        document.querySelectorAll('.stat-card').forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = 1;
            }, index * 200);
        });
    });
</script>


<!-- Movement Counter Section -->
<?php
$stmt = $conn->query("SELECT * FROM dashboard_counts ORDER BY id DESC LIMIT 1");
$data = $stmt->fetch();
?>

<div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 20px;">
    <h3 style="text-align:center; color: teal; font-weight: bold; margin-bottom: 20px; cursor: move;" draggable="true" id="movable-counter-title">
        বর্তমানে আমাদের ফার্মে রয়েছে
    </h3>
</div>
    <div class="counter" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 30px;">
    <div class="counter-item" style="text-align: center;">
        <div class="counter-number" style="font-size: 2em; font-weight: bold;">
            <?= is_numeric($data['cow_count']) ? number_format($data['cow_count']) : '0' ?>
        </div>
        <div>গরু</div>
    </div>
    
    <div class="counter-item" style="text-align: center;">
        <div class="counter-number" style="font-size: 2em; font-weight: bold;">
            <?= is_numeric($data['goat_count']) ? number_format($data['goat_count']) : '0' ?>
        </div>
        <div>ছাগল</div>
    </div>
    
    <div class="counter-item" style="text-align: center;">
        <div class="counter-number" style="font-size: 2em; font-weight: bold;">
            <?= is_numeric($data['fish_count']) ? number_format($data['fish_count']) : '0' ?>
        </div>
        <div>মাছ</div>
    </div>
    
    <div class="counter-item" style="text-align: center;">
        <div class="counter-number" style="font-size: 2em; font-weight: bold;">
            <?= is_numeric($data['fruit_count']) ? number_format($data['fruit_count']) . ' কেজি' : htmlspecialchars($data['fruit_count']) ?>
        </div>
        <div>ফল</div>
    </div>
</div>





<!-- Courses Section -->
<div class="main-section" id="courses">
    <h2>কোর্সসমূহ</h2>
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

<!-- Modal Section -->
<style>
/* Modal overlay - hidden by default */
.modal {
    display: none; /* kept hidden until we open it via JS */
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 150, 136, 0.25);
    animation: fadeIn 0.28s ease;
    align-items: center;
    justify-content: center;
    padding: 10px;
}

/* Modal box */
.modal-content {
    background-color: #ffffff;
    border-radius: 14px;
    width: 90%;
    max-width: 520px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.25);
    animation: zoomIn 0.32s ease;
    overflow: hidden;
}

/* Header / body / footer */
.modal-header {
    background: linear-gradient(135deg, #80cbc4, #4db6ac);
    color: white;
    padding: 12px 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.modal-header h3 { margin: 0; font-size: 1.15rem; }

.modal-body { padding: 16px; font-size: 1rem; color: #444; line-height: 1.6; }
.modal-footer { padding: 12px 16px; text-align: right; background: #f7fdfc; border-top: 1px solid #ddd; }

.btn { display:inline-block; padding:8px 14px; border-radius:8px; text-decoration:none; margin-left:8px; font-weight:700; }
.contact-btn { background:#4db6ac; color:white; }
.close-btn { background:#ccc; color:#333; }

@keyframes fadeIn { from { opacity:0 } to { opacity:1 } }
@keyframes zoomIn { from { transform: scale(0.96); opacity:0 } to { transform: scale(1); opacity:1 } }

/* Slider minimal styles (in case you removed them earlier) */
.slider { width:100%; height:400px; position:relative; overflow:hidden; }
.slides { display:flex; transition: transform 0.45s ease; width:100%; }
.slide { min-width:100%; box-sizing:border-box; }
.slide img { width:100%; height:400px; object-fit:cover; display:block; }

/* slider buttons */
.slider-btn { position:absolute; top:50%; transform:translateY(-50%); background: rgba(0,0,0,0.35); color:#fff; border:none; padding:8px 10px; border-radius:6px; cursor:pointer; z-index:3; }
.slider-btn.left { left:12px } .slider-btn.right { right:12px }
</style>

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

<!-- ====== Script: slider + modal (Replace old script blocks) ====== -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ===== Slider setup ===== */
    const slider = document.querySelector('.slider');
    if (slider) {
        // If inline style hid it, make visible
        slider.style.display = 'block';
    }
    const slidesContainer = document.querySelector('.slides');
    const totalSlides = slidesContainer ? slidesContainer.querySelectorAll('.slide').length : 0;
    let currentSlide = 0;

    function updateSlidePosition() {
        if (!slidesContainer) return;
        slidesContainer.style.transform = 'translateX(' + (-currentSlide * 100) + '%)';
    }

    // expose global function so existing onclick="moveSlide(-1)" works
    window.moveSlide = function(dir) {
        if (!slidesContainer || totalSlides === 0) return;
        currentSlide = (currentSlide + dir + totalSlides) % totalSlides;
        updateSlidePosition();
    };

    // auto advance every 6s
    let slideInterval = null;
    if (totalSlides > 1) {
        slideInterval = setInterval(() => { window.moveSlide(1); }, 6000);
        // pause on hover
        slider.addEventListener('mouseenter', () => { clearInterval(slideInterval); });
        slider.addEventListener('mouseleave', () => {
            slideInterval = setInterval(() => { window.moveSlide(1); }, 6000);
        });
    }

    /* ===== Course data =====
       (matches your modal's HTML: #modalTitle and #modalDescription) */
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

    /* ===== Modal functions (match your HTML ids) ===== */
    window.showModal = function(index) {
        const modal = document.getElementById('courseModal');
        const titleEl = document.getElementById('modalTitle');
        const descEl = document.getElementById('modalDescription');
        if (!modal || !titleEl || !descEl) return;
        const course = window.courseDetails[index];
        if (!course) return;
        titleEl.innerText = course.title;
        descEl.innerText = course.description;
        modal.style.display = 'flex';
    };

    window.closeModal = function() {
        const modal = document.getElementById('courseModal');
        if (modal) modal.style.display = 'none';
    };

    // // close if user clicks on overlay (outside content)
    // window.addEventListener('click', function(e) {
    //     const modal = document.getElementById('courseModal');
    //     if (modal && e.target === modal) modal.style.display = 'none';
    // });

});
</script>


<!-- Map & Contact -->
<div class="main-section" id="contact">
    <h2>ফার্মের অবস্থান ও যোগাযোগ</h2>
    <div id="map" style="width: 100%; height: 400px;">
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

    <p>ঠিকানা: গ্রাম-নবীনগর, উপজেলা-শিবপুর, জেলা-নরসিংদী</p>
    <p>ফোন: +880 173489751 | ইমেইল: info@agrofarm.com</p>
</div>

<!-- Slider Script -->
<script>
    let currentSlide = 0;
    const slides = document.querySelector('.slides');
    const totalSlides = slides ? slides.querySelectorAll('.slide').length : 0;

    function moveSlide(dir) {
        if (!slides || totalSlides === 0) return;
        currentSlide = (currentSlide + dir + totalSlides) % totalSlides;
        slides.style.transform = 'translateX(' + (-currentSlide * 100) + '%)';
    }

    window.addEventListener('DOMContentLoaded', () => {
        if (slides) {
            slides.style.transform = 'translateX(0%)';
        }
    });
</script>
<?php include 'footer.php'; ?>