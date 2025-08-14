<!-- header.php -->
<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>আমাদের অ্যাগ্রো ফার্ম</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    :root {
      --primary-color: #008080;
      --secondary-color: #a1fa08ff;
      --accent-color: #ffffffff;
      --background-color: #f1f8f4;
      --text-color: #222;
      --shadow-color: rgba(0, 0, 0, 0.15);
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Noto Sans Bengali', sans-serif;
      background-color: var(--background-color);
      color: var(--text-color);
      overflow-x: hidden;
    }

    /* HEADER */
    header {
      background-color: var(--primary-color);
      color: white;
      padding: 15px 0;
      position: relative; /* fixed/absolute বাদ */
      width: 100%;
      box-shadow: 0 2px 6px var(--shadow-color);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header-left {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      margin-left: 20px;
    }

    .farm-name {
      font-size: 2rem;
      font-weight: bold;
      margin: 0;
      animation: farmNameAnimation 1.2s ease-out;
    }

    .tagline {
      font-size: 1.1rem;
      font-weight: 400;
      color: #dcedc8;
      margin-top: 5px;
      animation: fadeIn 1s ease-out;
    }

    .header-middle {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    nav a {
      display: inline-block;
      padding: 8px 16px;
      margin: 0 6px;
      border-radius: 20px;
      background-color: rgba(255, 255, 255, 0.15);
      color: white;
      text-decoration: none;
      font-size: 1rem;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    nav a::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: var(--accent-color);
      z-index: -1;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.3s ease-in-out;
    }

    nav a:hover::before {
      transform: scaleX(1);
    }

    nav a:hover {
      color: var(--primary-color);
    }

    .header-right {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-right: 20px;
    }

    .header-right a {
        color: white;
        text-decoration: none;
        font-size: 1rem;
        transition: color 0.3s ease;
    }

    .header-right a:hover {
        color: var(--accent-color);
    }

    .profile-icon {
      width: 40px;
      height: 40px;
      background-color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      color: var(--primary-color);
      border: 2px solid white;
      cursor: pointer;
      transition: all 0.3s ease;
      animation: profileIconAnimation 1s ease-out;
    }

    .profile-icon:hover {
      background-color: var(--secondary-color);
      transform: scale(1.05);
    }

    .menu-toggle {
      display: none;
      position: absolute;
      top: 15px;
      left: 10px;
      color: white;
      font-size: 1.8rem;
      cursor: pointer;
      z-index: 1001;
      transition: color 0.3s ease;
    }

    .menu-toggle:hover {
      color: var(--accent-color);
    }

    .mobile-nav {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
      background-color: var(--primary-color);
      z-index: 999;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease-in-out;
    }

    .mobile-nav.show {
      display: block;
      transform: translateY(0);
    }

    .mobile-nav a {
      display: block;
      padding: 15px;
      text-align: center;
      text-decoration: none;
      color: white;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      transition: background-color 0.3s ease;
    }

    .mobile-nav a:hover {
      background-color: var(--secondary-color);
    }

    @media (max-width: 768px) {
      header {
        padding: 12px 0;
        flex-direction: column;
        align-items: flex-start;
      }
      .header-left {
        margin-bottom: 8px;
        margin-left: 15px;
      }
      .header-middle {
        width: 100%;
        justify-content: flex-start;
        margin-bottom: 8px;
        padding-left: 15px;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }
      .header-middle nav {
        display: flex;
      }
      nav a {
        margin: 0 6px 0 0;
        padding: 8px 12px;
      }
      .header-right {
        margin: 0 15px;
        justify-content: space-between;
        width: 100%;
      }
      .menu-toggle {
          display: block;
      }
      nav {
          display: none;
      }
    }

    @media (max-width: 600px) {
      .farm-name {
        font-size: 1.5rem;
      }
      .tagline {
        font-size: 0.9rem;
      }
    }

    /* Back to Top Button */
    #backToTop {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: var(--primary-color);
      color: white;
      font-size: 20px;
      padding: 10px 14px;
      border-radius: 50%;
      cursor: pointer;
      box-shadow: 0 2px 6px var(--shadow-color);
      transition: background-color 0.3s ease;
      z-index: 999;
    }
    #backToTop:hover {
      background-color: var(--secondary-color);
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    @keyframes profileIconAnimation {
      0% { transform: scale(0); opacity: 0; }
      70% { transform: scale(1.1); opacity: 0.7; }
      100% { transform: scale(1); opacity: 1; }
    }
    @keyframes farmNameAnimation {
      0% { transform: translateY(-20px); opacity: 0; }
      50% { transform: translateY(5px); opacity: 0.7; }
      100% { transform: translateY(0); opacity: 1; }
    }
  </style>
</head>
<body>

<header id="mainHeader">
  <div class="menu-toggle" onclick="toggleMobileMenu()">
      <i class="bi bi-list"></i>
  </div>
  <div class="header-left">
    <h1 class="farm-name">আমাদের অ্যাগ্রো ফার্ম🌾</h1>
    <p class="tagline">স্বাস্থ্যকর খাদ্য, সবুজ বাংলাদেশ</p>
  </div>
  <div class="header-middle">
      <nav>
          <a href="index.php">হোম</a>
          <a href="about.php">আমাদের সম্পর্কে</a>
          <a href="services.php">সেবা</a>
          <a href="virtual-tour.php">ভার্চুয়াল ট্যুর</a>
          <a href="events.php">ইভেন্ট</a>
          <a href="contact.php">যোগাযোগ</a>
      </nav>
  </div>
  <div class="header-right">
      <a href="login.php">লগইন | রেজিস্টার</a>
      <div class="profile-icon"><i class="bi bi-person-fill"></i></div>
  </div>
</header>

<nav class="mobile-nav" id="mobileNav">
  <a href="index.php">হোম</a>
  <a href="about.php">আমাদের সম্পর্কে</a>
  <a href="services.php">সেবা</a>
  <a href="virtual-tour.php">ভার্চুয়াল ট্যুর</a>
  <a href="events.php">ইভেন্ট</a>
  <a href="contact.php">যোগাযোগ</a>
</nav>

<!-- Back to Top Button -->
<div id="backToTop" onclick="scrollToTop()">
  <i class="bi bi-arrow-up"></i>
</div>

<script>
  function toggleMobileMenu() {
      var mobileNav = document.getElementById('mobileNav');
      mobileNav.classList.toggle('show');
  }

  // Scroll হলে বাটন দেখানো/লুকানো
  window.onscroll = function () {
    let btn = document.getElementById("backToTop");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      btn.style.display = "block";
    } else {
      btn.style.display = "none";
    }
  };

  // উপরে স্ক্রল করানোর ফাংশন
  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  }
</script>
</body>
</html>
