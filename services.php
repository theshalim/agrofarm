<?php include 'header.php'; ?>

<!-- AOS CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<style>
body {
  font-family: 'Noto Sans Bengali', sans-serif;
  margin: 0;
  background: #f0fdfa;
}

.container {
  width: 90%;
  max-width: 1100px;
  margin: auto;
  padding: 40px 0;
}

.section-title {
  text-align: center;
  font-size: 2.2rem;
  color: #319795;
  font-weight: bold;
  margin-bottom: 30px;
  position: relative;
}
.section-title::after {
  content: '';
  width: 80px;
  height: 4px;
  background-color: #4fd1c5;
  display: block;
  margin: 10px auto 0;
  border-radius: 2px;
}

.service {
  background: white;
  padding: 25px;
  margin-bottom: 25px;
  border-left: 6px solid #4fd1c5;
  border-radius: 8px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.service:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}
.service h3 {
  margin-top: 0;
  color: #2c7a7b;
}
.service p {
  color: #333;
  line-height: 1.6;
}
.service i {
  color: #4fd1c5;
  margin-right: 8px;
}

/* Counter Section */
.counter-section {
  display: flex;
  justify-content: space-around;
  background: #e6fffa;
  padding: 30px 0;
  margin-top: 40px;
  text-align: center;
  border-radius: 10px;
}
.counter-item {
  font-size: 18px;
  color: #2c7a7b;
}
.counter-number {
  font-size: 36px;
  color: #285e61;
  font-weight: bold;
}

/* CTA */
.cta {
  background-color: #319795;
  color: white;
  padding: 40px 20px;
  text-align: center;
  margin-top: 40px;
  border-radius: 10px;
}
.cta h2 {
  font-size: 2em;
  margin-bottom: 10px;
}
.cta p {
  font-size: 1.1em;
  margin-bottom: 20px;
}
.btn-custom {
  padding: 12px 24px;
  background-color: #ffeb3b;
  color: #285e61;
  border: none;
  border-radius: 5px;
  font-weight: bold;
  cursor: pointer;
}
.btn-custom:hover {
  background-color: #fdd835;
}
</style>

<div class="container">
  <h2 class="section-title" data-aos="fade-down">🌱 আমাদের সেবা সমূহ</h2>

  <div class="service" data-aos="fade-up" data-aos-delay="100">
    <h3><i class="bi bi-cow"></i> গরু ও ছাগল পালন</h3>
    <p>উন্নত জাতের গরু ও ছাগল পালন করে আমরা স্বাস্থ্যসম্মত দুধ ও মাংস সরবরাহ করি। সর্বাধুনিক প্রযুক্তি ব্যবহার করে খাদ্য ও পরিচর্যা প্রদান করা হয়।</p>
  </div>

  <div class="service" data-aos="fade-up" data-aos-delay="200">
    <h3><i class="bi bi-droplet-half"></i> মাছ চাষ</h3>
    <p>বড় পুকুরে দেশীয় ও বিদেশী প্রজাতির মাছ চাষ করি। পানির গুণমান, খাদ্য, ও বাজার ব্যবস্থাপনায় উন্নত কৌশল প্রয়োগ করা হয়।</p>
  </div>

  <div class="service" data-aos="fade-up" data-aos-delay="300">
    <h3><i class="bi bi-seedling"></i> জৈব চাষাবাদ</h3>
    <p>কীটনাশকমুক্ত সবজি ও শস্য উৎপাদনে আমাদের খামার বিশেষভাবে দক্ষ। মাটির গুণমান বৃদ্ধি ও পরিবেশ রক্ষায় আমরা প্রতিশ্রুতিবদ্ধ।</p>
  </div>

  <div class="service" data-aos="fade-up" data-aos-delay="400">
    <h3><i class="bi bi-people"></i> পরামর্শ ও প্রশিক্ষণ</h3>
    <p>নতুন কৃষক ও উদ্যোক্তাদের জন্য আধুনিক কৃষি প্রযুক্তি, ব্যবসা পরিচালনা ও বাজারজাতকরণ বিষয়ে প্রশিক্ষণ প্রদান করা হয়।</p>
  </div>

  <div class="service" data-aos="fade-up" data-aos-delay="500">
    <h3><i class="bi bi-sun"></i> সোলার সেচ প্রযুক্তি</h3>
    <p>সাশ্রয়ী খরচে বিদ্যুৎ ছাড়াই সেচ ব্যবস্থাপনা করতে সোলার পাম্প সেবা প্রদান করি।</p>
  </div>
</div>

<!-- Counter Section -->
<div class="counter-section" data-aos="zoom-in">
  <div class="counter-item">
    <div class="counter-number" data-count="150">0</div>
    সন্তুষ্ট গ্রাহক
  </div>
  <div class="counter-item">
    <div class="counter-number" data-count="25">0</div>
    সেবা প্রদান
  </div>
  <div class="counter-item">
    <div class="counter-number" data-count="10">0</div>
    বছরের অভিজ্ঞতা
  </div>
</div>

<!-- Call to Action -->
<div class="cta" data-aos="fade-up">
  <h2>আমাদের সাথে আপনার কৃষি যাত্রা শুরু করুন</h2>
  <p>আমাদের টিম প্রস্তুত আপনার সাফল্যের পথে সহযোগিতা করতে। এখনই যোগাযোগ করুন।</p>
  <button class="btn-custom">যোগাযোগ করুন</button>
</div>

<!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
AOS.init({
  duration: 800,
  offset: 100,
  once: true
});

// Counter Animation
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".counter-number");
  counters.forEach(counter => {
    const updateCount = () => {
      const target = +counter.getAttribute("data-count");
      const count = +counter.innerText;
      const speed = 20;
      if(count < target) {
        counter.innerText = count + 1;
        setTimeout(updateCount, speed);
      } else {
        counter.innerText = target;
      }
    };
    updateCount();
  });
});
</script>

<?php include 'footer.php'; ?>
