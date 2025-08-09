<?php include 'header.php'; ?>

<style>
  .container {
    width: 90%;
    max-width: 1000px;
    margin: auto;
    padding: 30px 0;
  }

  .event {
    background: white;
    padding: 20px;
    margin-bottom: 20px;
    border-left: 5px solid #009688;
  }

  .event h3 {
    margin-top: 0;
  }

  .event-date {
    font-size: 14px;
    color: #888;
  }
</style>
<!-- AOS Animation CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<style>
body {
  background-color: #f0fdfa; /* light teal background */
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

.event {
  background: white;
  padding: 25px;
  margin-bottom: 25px;
  border-left: 6px solid #4fd1c5;
  border-radius: 8px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.event:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

.event h3 {
  margin-top: 0;
  color: #2c7a7b;
}

.event-date {
  font-size: 0.9rem;
  color: #666;
  margin-bottom: 10px;
}

.event p {
  margin-bottom: 0;
  line-height: 1.6;
  color: #333;
}

.event i {
  color: #4fd1c5;
  margin-right: 8px;
}
</style>

<div class="container">
  <h2 class="section-title" data-aos="fade-down">📅 আমাদের আসন্ন ইভেন্টসমূহ</h2>

  <div class="event" data-aos="fade-up" data-aos-delay="100">
    <h3><i class="bi bi-flower3"></i> জৈব সার ব্যবহার কর্মশালা</h3>
    <div class="event-date">তারিখ: ১৫ সেপ্টেম্বর ২০২৫</div>
    <p>এই কর্মশালায় আপনি জৈব সার প্রস্তুত ও ব্যবহার সম্পর্কে বিস্তারিত জানতে পারবেন। প্রশিক্ষণে প্র্যাকটিক্যাল ডেমো অন্তর্ভুক্ত থাকবে।</p>
  </div>

  <div class="event" data-aos="fade-up" data-aos-delay="200">
    <h3><i class="bi bi-cow"></i> ছাগল পালন প্রশিক্ষণ</h3>
    <div class="event-date">তারিখ: ২৮ সেপ্টেম্বর ২০২৫</div>
    <p>ছাগল পালনের আধুনিক কৌশল, রোগ প্রতিরোধ, ও বাজারজাতকরণ নিয়ে বিশেষ প্রশিক্ষণ আয়োজন করা হয়েছে।</p>
  </div>

  <div class="event" data-aos="fade-up" data-aos-delay="300">
    <h3><i class="bi bi-droplet-half"></i> সেচ প্রযুক্তি ও জল সংরক্ষণ</h3>
    <div class="event-date">তারিখ: ৫ অক্টোবর ২০২৫</div>
    <p>ক্ষেতের জন্য আধুনিক সেচ প্রযুক্তি, ড্রিপ সিস্টেম, ও পানি সংরক্ষণ পদ্ধতি নিয়ে আলোচনা করা হবে।</p>
  </div>

  <div class="event" data-aos="fade-up" data-aos-delay="400">
    <h3><i class="bi bi-flower1"></i> সবজি চাষে নতুন উদ্ভাবন</h3>
    <div class="event-date">তারিখ: ১৫ অক্টোবর ২০২৫</div>
    <p>জীবনধারার সাথে খাপ খাওয়ানো সবজি চাষের নতুন প্রযুক্তি ও উৎপাদন বৃদ্ধির উপায় শিখবেন।</p>
  </div>

  <div class="event" data-aos="fade-up" data-aos-delay="500">
    <h3><i class="bi bi-seedling"></i> ফল গাছের নার্সারি প্রশিক্ষণ</h3>
    <div class="event-date">তারিখ: ২২ অক্টোবর ২০২৫</div>
    <p>ফল গাছের চারা উৎপাদন, গ্রাফটিং ও নার্সারি ব্যবস্থাপনা সম্পর্কে হাতে-কলমে প্রশিক্ষণ।</p>
  </div>
</div>

<!-- AOS Animation JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
AOS.init({
  duration: 800,
  offset: 100,
  once: true
});
</script>



<div class="container">
  <div class="event">
    <h3>জৈব সার ব্যবহার কর্মশালা</h3>
    <div class="event-date">তারিখ: ১৫ সেপ্টেম্বর ২০২৫</div>
    <p>এই কর্মশালায় আপনি জৈব সার প্রস্তুত ও ব্যবহার সম্পর্কে বিস্তারিত জানতে পারবেন।</p>
  </div>

  <div class="event">
    <h3>ছাগল পালন প্রশিক্ষণ</h3>
    <div class="event-date">তারিখ: ২৮ সেপ্টেম্বর ২০২৫</div>
    <p>ছাগল পালনের আধুনিক কৌশল নিয়ে বিশেষ প্রশিক্ষণ আয়োজন করা হয়েছে।</p>
  </div>
</div>

<?php include 'footer.php'; ?>
