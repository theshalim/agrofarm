<!DOCTYPE html>
<html lang="bn">
<head>
    <?php include 'header.php'; ?>
    <meta charset="UTF-8">
    <title>আমাদের সেবা</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fff5;
            font-family: 'Noto Sans Bengali', sans-serif;
        }
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            font-weight: bold;
            color: #2e7d32;
        }
        .service-card {
            border: none;
            border-radius: 15px;
            padding: 20px;
            background: white;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.2s ease-in-out;
            cursor: pointer;
            height: 100%;
        }
        .service-card:hover {
            transform: translateY(-5px);
        }
        .icon-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: #e8f5e9;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 32px;
            color: #2e7d32;
        }
        .card-text {
            min-height: 80px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h1 class="text-center mb-3 fw-bold" style="color:#1b5e20;">🌿 আমাদের সেবা</h1>
    <p class="text-center text-muted mb-5">
        আমরা শুধু মানুষকে নয়, প্রকৃতিকেও যত্ন করি — যেন আগামী প্রজন্মের জন্য একটি সবুজ, সুস্থ পৃথিবী থাকে।
    </p>

    <!-- People Services -->
    <h2 class="section-title">👨‍👩‍👧‍👦 মানুষের জন্য আমাদের সেবা</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="service-card text-center" data-bs-toggle="modal" data-bs-target="#service1">
                <div class="icon-circle">🥦</div>
                <h5>তাজা ও নিরাপদ খাদ্য</h5>
                <p class="card-text">রাসায়নিকমুক্ত, তাজা ও পুষ্টিকর খাবার আপনার টেবিলে পৌঁছে দিই।</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-card text-center" data-bs-toggle="modal" data-bs-target="#service2">
                <div class="icon-circle">📦</div>
                <h5>দ্রুত হোম ডেলিভারি</h5>
                <p class="card-text">সময়মতো, সতেজ অবস্থায় সরাসরি বাসায় পৌঁছে দিই।</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-card text-center" data-bs-toggle="modal" data-bs-target="#service3">
                <div class="icon-circle">📚</div>
                <h5>কৃষি সচেতনতা</h5>
                <p class="card-text">স্বাস্থ্যকর খাদ্যের গুরুত্ব ও কৃষি জ্ঞান ছড়িয়ে দিই।</p>
            </div>
        </div>
    </div>

    <!-- Nature Services -->
    <h2 class="section-title mt-5">🌱 প্রকৃতির জন্য আমাদের অবদান</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="service-card text-center" data-bs-toggle="modal" data-bs-target="#service4">
                <div class="icon-circle">🌳</div>
                <h5>গাছ রোপণ কর্মসূচি</h5>
                <p class="card-text">পরিবেশ রক্ষায় আমরা প্রতি বছর শত শত গাছ লাগাই।</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-card text-center" data-bs-toggle="modal" data-bs-target="#service5">
                <div class="icon-circle">♻️</div>
                <h5>পুনর্ব্যবহারযোগ্য প্যাকেজিং</h5>
                <p class="card-text">পরিবেশবান্ধব প্যাকেট দিয়ে প্লাস্টিক কমাই।</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-card text-center" data-bs-toggle="modal" data-bs-target="#service6">
                <div class="icon-circle">💧</div>
                <h5>পানি সংরক্ষণ</h5>
                <p class="card-text">আধুনিক প্রযুক্তি দিয়ে পানির অপচয় রোধ করি।</p>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="service1" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">তাজা ও নিরাপদ খাদ্য</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        আমাদের প্রতিটি শাকসবজি, ফল ও খাদ্যপণ্য সরাসরি ফার্ম থেকে সংগ্রহ করা হয়। কোনো প্রকার ক্ষতিকর রাসায়নিক, কীটনাশক বা সংরক্ষণকারীর ব্যবহার নেই। আমরা চাই আপনার পরিবারের প্রতিটি খাবার হোক নিরাপদ, সুস্বাদু ও স্বাস্থ্যকর।
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="service2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">দ্রুত হোম ডেলিভারি</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        আমরা জানি সময় কত মূল্যবান। তাই অর্ডার কনফার্ম হওয়ার পর অল্প সময়ের মধ্যেই আপনার কাছে পণ্য পৌঁছে দিই। সতেজতা বজায় রাখতে বিশেষ প্যাকেজিং ব্যবহার করা হয়।
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="service3" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">কৃষি সচেতনতা</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        আমরা শুধু পণ্য বিক্রি করি না, বরং স্বাস্থ্যকর খাদ্যাভ্যাস, জৈব চাষাবাদ, এবং কৃষির আধুনিক প্রযুক্তি সম্পর্কে গ্রাহক ও কৃষকদের শিক্ষা দিয়ে থাকি।
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="service4" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">গাছ রোপণ কর্মসূচি</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        আমাদের প্রতিটি বিক্রির একটি অংশ ব্যবহার করা হয় গাছ লাগানোর কাজে। আমরা চাই পরিবেশের ভারসাম্য বজায় রাখতে এবং জলবায়ু পরিবর্তনের ক্ষতি কমাতে সক্রিয় ভূমিকা রাখতে।
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="service5" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">পুনর্ব্যবহারযোগ্য প্যাকেজিং</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        পরিবেশ সুরক্ষায় আমরা সর্বদা সচেষ্ট। এজন্য আমরা প্লাস্টিকের ব্যবহার কমিয়ে পুনর্ব্যবহারযোগ্য এবং বায়োডিগ্রেডেবল প্যাকেট ব্যবহার করি।
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="service6" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">পানি সংরক্ষণ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        আধুনিক সেচ প্রযুক্তি (ড্রিপ ও স্প্রিংকলার) ব্যবহার করে আমরা কৃষিতে পানির অপচয় রোধ করি, যা দীর্ঘমেয়াদে পরিবেশ ও কৃষকের জন্য উপকারী।
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include 'footer.php'; ?>
